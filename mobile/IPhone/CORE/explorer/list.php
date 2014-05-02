<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta id="viewport" name="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>Your Personal Documents</title>
<?
include("../../xoslogin/include/session.php");
?>
<script type="text/javascript">
    function BlockMove(event) {
        // Tell Safari not to move the window.
        event.preventDefault() ;
    }
</script>
<style type="text/css">
body,td,th {
	color: #999;
}
a:link {
	color: #CCC;
}
a:visited {
	color: #CCC;
}
a:hover {
	color: #CCC;
}
a:active {
	color: #CCC;
}
</style>
</head>

<body onTouchMove="BlockMove(event);">
Your Uploaded Documents:<hr>
<? 
// Handle User *Input Uncomment to use*
// $dirName = isset($_POST['dirName'])?$_POST['dirName']:false;
/** 
 * Change the path to your folder. 
 * 
 * This must be the full path from the root of your 
 * web space. If you're not sure what it is, ask your host. 
 * 
 * Name this file index.php and place in the directory. 
 */ 

    // Define the full path to your folder from root 
    $path = "/var/www/xos/files/uploads/$session->username"; 

    // Open the folder 
    $dir_handle = @opendir($path) or die("Unable to open $session->username's Upload Folder Folder.<br>Error Code 17: 404 Not Found; Create Upload Directory."); 

    // Loop through the files 
    while ($file = readdir($dir_handle)) { 

    if($file == "." || $file == ".." || $file == "index.php" ) 

        continue; 
        echo "<a href=\"javascript:window.location.href = 'http://xos.xproduct.net/files/uploads/$session->username/$file';\">$file</a><br />"; 

    } 

    // Close 
    closedir($dir_handle); 

?> 
<p>
<br>
Make sure you are online before viewing your files.
</p>

</body>
</html>