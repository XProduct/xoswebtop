<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?
include("../../xoslogin/include/session.php");
?>
</head>

<body>
<table width="100%" height="260px" border="0">
  <tr>
    <td width="200px" ><p style="position: absolute; top: 0px; left: 0px;">
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
    $dir_handle = @opendir($path) or die("Unable to open $session->username's Upload Folder.<br>Error Code 17: 404 Not Found; To create Upload Directory contact the adminisrator."); 

    // Loop through the files 
    while ($file = readdir($dir_handle)) { 

    if($file == "." || $file == ".." || $file == "index.php" || $file == "music") 

        continue; 
        echo "<a href=\"http://xos.xproduct.net/files/uploads/$session->username/$file\" target=\"viewer\">$file</a><br />"; 

    } 

    // Close 
    closedir($dir_handle); 

?></p>
</td>
<td>
<iframe width="100%" height="100%" id="viewer" allowtransparency src="notice.html" frameborder="0"> </iframe>
</td>
  </tr>
</table>


</body>
</html>