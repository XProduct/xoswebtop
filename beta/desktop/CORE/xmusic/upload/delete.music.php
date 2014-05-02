<?
include("../../xoslogin/include/session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Delete Songs</title>
</head>

<body>
<? 
    // Define the full path to your folder from root 
    $path = "/var/www/xos/files/uploads/$session->username/music"; 
	$i=1;

    // Open the folder 
    $dir_handle = @opendir($path) or die("You are not part of the xMusic Beta"); 

    // Loop through the files 
    while ($file = readdir($dir_handle)) { 

    if($file == "." || $file == ".." || $file == "index.php" ) 

        continue; 
        echo "$file";
		echo("<form method=\"post\" action=\"do-delete.php\"><input type=\"hidden\" name=\"filetodel\" value=\"/var/www/xos/files/uploads/$session->username/music/$file\"><input type=\"submit\" name=\"submit\" value=\"Delete\"></form>"); 
		$i++;
    } 
	
    // Close 
    closedir($dir_handle); 

?>
</body>
</html>