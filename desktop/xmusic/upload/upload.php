<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="3; url=javascript:clear();">
<script type="text/javascript">
function clear() {
	document.write(" ");
}
</script>
<meta charset="utf-8">
<title>Upload Final Status</title>
</head>
<body>
<?php

include("../../xoslogin/include/session.php");

$con = mysql_connect("localhost","root","password_here");

if (!$con) { die('Could not connect: ' . mysql_error());
} mysql_select_db("xosdata", $con);
 $result = mysql_query("SELECT * FROM userdata WHERE user='$session->username'");
	while($row = mysql_fetch_array($result)) {
	$all = $row['store'];
} mysql_close($con);

// we need the full path to the folder we want to find the size of
$folder = $_SERVER['DOCUMENT_ROOT'].'/files/uploads/'.$session->username.'/music';
// prevent malicious attacks since we are executing a shell command
$folder = escapeshellcmd($folder);

// make sure this is a folder
if( ! is_dir($folder) )
{
        echo "Your Music Folder is not a real folder. Please Email rorange@xproduct.net for help.<br />";
}
// if we could find the pattern of our command du -s
else
{
        // we execute du (disk usage) to find out the folder size
        //      notice we use the execution operator (the key to the left of 1 on your keyboard)
        //      this is the same as the php function shell_exec()
        //      you can add the -h flaf to the below command to format the file size into MB, GB, etc.
        //              i.e. `du -sh $folder`;
        $output = `du -s $folder`;

        if( preg_match('/([0-9]+)(\t.*)/',$output,$match) )
        {
                $size = $match[1];
				$total = $size / 1024;
				//$total now hold the size of the folder in MBytes and $size holds the value in Bytes
        }
        else
        {
                // error
                // either we can't execute du -s command (such as windows users) or the folder doesn't exist
                echo "There was an error while retrieving the size of your music folder.<br />";
        }
}
if($total > $all) {
	echo "Sorry your music folder is full. Delete some unwanted music and come back and try again.";
} 
else { 
		 //Grab Input Data
		$dirName = $session->username;
		 //Upload Handling
		$uploaddir = "../../../files/uploads/".$dirName."/music/"; //Upload directory: needs write premissions
		$log = "uploadlog.txt"; // Upload LOG file
		// what file types do you want to disallow?
		$blacklist = array(".php", ".phtml", ".php3", ".php4", ".php5", ".exe", ".js",".html", ".htm", ".inc");
		 // allowed filetypes       
		$allowed_filetypes = array('.mp3','.m4a','.txt'); 
		 
		if (!is_dir($uploaddir)) {
			die ("Upload directory does not exists.");
		}
		if (!is_writable($uploaddir)) {
			die ("Upload directory is not writable.");
		}
		
		$verify = $_POST['verifo'];
 		 
		if ($verify == "yes")
		{
		 
		$ip = trim($_SERVER['REMOTE_ADDR']); 
		 
			if (isset($_FILES['file']))
			{
				if ($_FILES['file']['error'] != 0)
				{
					switch ($_FILES['file']['error'])
					{
						case 1:
							print 'Server Denied File Size'; // php installation max file size error
							exit;
							break;
						case 2:
							print 'You are only allowed to upload file 7MB and smaller.'; // form max file size error
							exit;
							break;
						case 3:
							print 'Only part of the file was uploaded';
							exit;
							break;
						case 4:
							print 'No file was uploaded</p>';
							exit;
							break;
						case 6:
							print "Missing a temporary folder.";
							exit;
							break;
						case 7:
							print "Failed to write file to disk";
							exit;
							break;
						case 8:
							print "File upload stopped by extension";
							exit;
							break;
		 
					}
				} else {
					foreach ($blacklist as $item)
					{
						if (preg_match("/$item\$/i", $_FILES['file']['name']))
						{
							echo "Invalid filetype !";
								$date = date("m/d/Y"); 
								$time = date("h:i:s A");                 
								$fp = fopen($log,"ab"); 
								fwrite($fp,"$ip | ".$_FILES['file']['name']." | $date | $time | INVALID TYPE"."\r\n"); 
								fclose($fp);
							unset($_FILES['file']['tmp_name']);
							exit;
						}
					}
					// Get the extension from the filename.
					$ext = substr($_FILES['file']['name'], strpos($_FILES['file']['name'],'.'), strlen($_FILES['file']['name'])-1); 
					// Check if the filetype is allowed, if not DIE and inform the user.
					if(!in_array($ext,$allowed_filetypes)){
								$date = date("m/d/Y"); 
								$time = date("h:i:s A");                     
								$fp = fopen($log,"ab"); 
								fwrite($fp,"$ip | ".$_FILES['file']['name']." | $date | $time | INVALID TYPE"."\r\n"); 
								fclose($fp);
								die('The file you attempted to upload is not allowed.');
					}
					if (!file_exists($uploaddir . $_FILES["file"]["name"]))
					{
						// Proceed with file upload
						if (is_uploaded_file($_FILES['file']['tmp_name']))
						{
							//File was uploaded to the temp dir, continue upload process
							if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . $_FILES['file']['name']))
							{
								// uploaded file was moved and renamed succesfuly. Display a message.
								echo "Your song got added to your library successfully!";
								// Now log the uploaders IP adress date and time
								$date = date("m/d/Y"); 
								$time = date("h:i:s A");                
								$fp = fopen($log,"ab"); 
								fwrite($fp,"$ip | ".$_FILES['file']['name']." | $date | $time | OK"."\r\n"); 
								fclose($fp); 
		
							} else {
								echo "Error while uploading the file, Please contact the webmaster.";
								unset($_FILES['file']['tmp_name']);
							}
						} else {
							//File was NOT uploaded to the temp dir
							switch ($_FILES['file']['error'])
							{
								case 1:
									print 'Server Denied Size. Please contact bdavis@xproduct.net to report the error.'; // php installation max file size error
									break;
								case 2:
									print 'You are only allowed to upload file 7MB and smaller.'; // form max file size error
									break;
								case 3:
									print 'Only part of the file was uploaded';
									break;
								case 4:
									print 'No file was uploaded</p>';
									break;
								case 6:
									print "Missing a temporary folder.";
									break;
								case 7:
									print "Failed to write file to disk";
									break;
								case 8:
									print "File upload stopped by extension";
									break;
		 
							}
		 
						}
					} else {
						echo "Filename already exists, Please rename the file and retry.";
						unset($_FILES['file']['tmp_name']);
					}
				}
			} else {
				// user did not select a file to upload
				echo "Please select a file to upload.";       
			}
		} else {
			// upload button was not pressed
			//header("Location: xOSwebtop.php");
		}
}
?>
</body>
</html>