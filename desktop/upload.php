 <?php
 //Grab Input Data
 $dirName = isset($_POST['dirName'])?$_POST['dirName']:false;
 //Upload Handling
$uploaddir = $dirName; //Upload directory: needs write premissions
$log = "uploadlog.txt"; // Upload LOG file
// what file types do you want to disallow?
$blacklist = array(".php", ".phtml", ".php3", ".php4", ".php5", ".exe", ".js",".html", ".htm", ".inc");
 // allowed filetypes       
$allowed_filetypes = array('.jpg','.gif','.bmp','.png','.doc','.docx','.xls','.txt','.zip'); 
 
if (!is_dir($uploaddir)) {
    die ("Upload directory does not exists.");
}
if (!is_writable($uploaddir)) {
    die ("Upload directory is not writable.");
}
 
if ($_POST['cmdupload'])
{
 
$ip = trim($_SERVER['REMOTE_ADDR']); 
 
    if (isset($_FILES['file']))
    {
        if ($_FILES['file']['error'] != 0)
        {
            switch ($_FILES['file']['error'])
            {
                case 1:
                    print 'The file is to big.'; // php installation max file size error
					exit;
                    break;
                case 2:
                    print 'The file is to big.'; // form max file size error
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
                        echo "Upload successful !";
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
                            print 'The file is to big.'; // php installation max file size error
                            break;
                        case 2:
                            print 'The file is to big.'; // form max file size error
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
    header("Location: xOSwebtop.php");
}
?>