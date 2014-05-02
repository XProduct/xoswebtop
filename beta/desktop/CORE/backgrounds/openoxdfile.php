<?
	
	include("../../xoslogin/include/session.php");
	
	// Define the full path to your folder from root 
	$path = "/var/www/xos/files/uploads/$session->username"; 
	$i = 1;
	
	// Open the folder 
	$dir_handle = @opendir($path); 
	
	// Loop through the files 
	while ($file = readdir($dir_handle)) { 
	
	if($file == "." || $file == ".." || $file == "index.php" || $file == "music") 
	
		continue; 
		//echo "<a href=\"#\" onClick=\"openFileContents($i)\">$file</a><br>"; 
		$name = "/var/www/xos/files/uploads/$session->username/$file";
		$ext = substr($file, -4, 4);
		if($ext == ".txt") {
			$fh = fopen($name, 'r');
			$data = fread($fh, filesize($name));
			fclose($fh);
			$data = htmlentities($data);
			//$dataCon = addslashes($data);
			echo("<input id=\"openFileContent" . $i . "\" type=\"hidden\" value=\"" . $data . "\">");
			echo("<input id=\"openFileTitle" . $i . "\" type=\"hidden\" value=\"" . $file . "\">");
			echo("<a href=\"#\" onClick=\"openFileContents($i)\">$file</a><br>");
		}
		$i++;
		
	} 
	
	// Close 
	closedir($dir_handle); 

?>