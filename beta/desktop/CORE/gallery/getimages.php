<?
include("../../xoslogin/include/session.php");

//PHP SCRIPT: getimages.php
Header("content-type: application/x-javascript");

//This function gets the file names of all images in the current directory
//and ouputs them as a JavaScript array

//echo($session->username);
//$dirname = "/var/www/xos/files/uploads/" . $session->username;
//echo $dirname;

function returnimages($dirname) {
	$pattern="(\.jpg$)|(\.png$)|(\.jpeg$)|(\.gif$)"; //valid image extensions
	$files = array();
	$curimage=0;
	if($handle = opendir($dirname)) {
		while(false !== ($file = readdir($handle))){
			if(eregi($pattern, $file)){ //if this file is a valid image
				//Output it as a JavaScript array element
				echo("galleryarray[" . $curimage . "] = \"" . $file . "\"; ");
				$curimage++;
			}
		}
		closedir($handle);
	}
	return($files);
}
	
echo 'var galleryarray = new Array();'; //Define array in JavaScript
returnimages("/var/www/xos/files/uploads/" . $session->username) //Output the array elements containing the image file names
?> 