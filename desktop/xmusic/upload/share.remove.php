<?
include("../../xoslogin/include/session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Un-Share</title>
</head>

<body>
<form action="removeshared.php" method="post">
<?

// include getID3() library (can be in a different directory if full path is specified)
require_once('../getid3/getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;

$fileName = "/var/www/xos/files/uploads/$session->username/music/shared.txt";
$i = 1;

if(file_exists($fileName)) {
	$song = fopen($fileName,'r');
	while(!feof($song)) { 
		$name = fgets($song);
		set_time_limit(30);
		
		$name = str_replace("\n",'',$name);
		$FullFileName = str_replace("http://xos.xproduct.net/","/var/www/xos/",$name);

		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		$artist = (!empty($ThisFileInfo['comments_html']['artist']) ? implode($ThisFileInfo['comments_html']['artist']) : 'unknown');
		$title = (!empty($ThisFileInfo['comments_html']['title'])  ? implode($ThisFileInfo['comments_html']['title'])  : 'unknown');
		//$albumws = (!empty($ThisFileInfo['comments_html']['album']) ? implode($ThisFileInfo['comments_html']['album']) : 'unknown');
		
		//Escapes Slashes
		//$album = addslashes($albumws);
		
		//echo("$title by $artist on $album <br>"); //FOR TEST 
		
		if($name == "") {
			; //Nothing Happens
		}
		else if($title == "unknown"){
			echo "<input type=\"checkbox\" name=\"removeShared\" value=\"" . $i . "\">$file<br>";
		}
		else {
			echo "<input type=\"checkbox\" name=\"removeShared\" value=\"" . $i . "\">$title by $artist<br>"; 
		}
		$i++;
	}
}
?>
<input type="submit" value="Remove">
</form>
</body>
</html>