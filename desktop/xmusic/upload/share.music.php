<?
include("../../xoslogin/include/session.php");
?>
<!DOCTYPE html>
<head>
<title>Share Songs</title>
<meta charset="utf-8">
<script type="text/javascript">
function userIN() {
	var user = document.getElementById('frnd').value;
	document.getElementById('userfrnd').value = user;
	document.getElementById('recipent').innerHTML = user;
}
function verify() {
	var user = document.getElementById('frnd').value;
	
	if(!user == "") {
	document.getElementById('list').style.visibility = 'visible';
	}
	else {
		alert("Enter Your Friends Username to Continue.");
	}
}
</script>
</head>

<body>
<h1>Share Songs</h1>
<?

$sharing = $_POST['shareFile'];
$username = $_POST['user'];

  if(empty($sharing))
  {
    ;
  }
  else
  {
    $N = count($sharing);
    echo("You selected $N file(s) to share with $username:<br> ");
    for($i=0; $i < $N; $i++)
    {
		$myFile = "/var/www/xos/files/uploads/$username/music/shared.txt";
		echo($myFile);
		$fh = fopen($myFile, 'a') or die("Unable to open shared files.");
		$writeSS = $sharing[$i] . "\n";
		fwrite($fh, $writeSS);
		fclose($fh);
      	echo($sharing[$i] . "<br>");
	}
}

?>

<form action="javascript:userIN()" method="post">
<input type="text" placeholder="Friends Username" width="400px" id="frnd" name="frnd">
<input type="submit" value="Submit" onClick="verify()">
</form>

<div id="list" style="visibility: hidden;">
<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
<input type="hidden" id="userfrnd" name="user"><br>
<? 
// include getID3() library (can be in a different directory if full path is specified)
require_once('../getid3/getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;

$path = "/var/www/xos/files/uploads/$session->username/music";
$dir = opendir($path) or die("You are not part of the xMusic Beta");

while (($file = readdir($dir)) !== false) {
	$FullFileName = realpath($path.'/'.$file);
	if ((substr($FullFileName, 0, 1) != '.') && is_file($FullFileName)) {
		set_time_limit(30);

		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		$artist = (!empty($ThisFileInfo['comments_html']['artist']) ? implode($ThisFileInfo['comments_html']['artist']) : 'unknown');
		$title = (!empty($ThisFileInfo['comments_html']['title'])  ? implode($ThisFileInfo['comments_html']['title'])  : 'unknown');
		//$albumws = (!empty($ThisFileInfo['comments_html']['album']) ? implode($ThisFileInfo['comments_html']['album']) : 'unknown');
		
		//Escapes ' and "
		//$album = addslashes($albumws);
		
		//echo("$title by $artist on $album <br>"); //FOR TEST 
		if($file == "." || $file == ".." || $file == "index.php" || $file == "shared.txt") 
		
		continue;
		
		if($title == "unknown") {
			echo "<input type=\"checkbox\" name=\"shareFile[]\" value=\"http://xos.xproduct.net/files/uploads/$session->username/music/$file\">$file<br>";
		}
		else {
			echo "<input type=\"checkbox\" name=\"shareFile[]\" value=\"http://xos.xproduct.net/files/uploads/$session->username/music/$file\">$title by $artist<br>"; 
		}
	}
}
?>
<br>
<input type="submit" name="fileSubmit" value="Share" />
</form>
</div>
</body>
</html>