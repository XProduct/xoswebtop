<?

include("../../xoslogin/include/session.php");

$fileName = $_POST['name'];
$content = $_POST['saveContent'];
$extension = substr($fileName, -4, 4);
if($extension == ".txt") {
	$fullFile = "/var/www/xos/files/uploads/$session->username/" . $fileName;
	$fh = fopen($fullFile, 'w') or die("Failed to Save File.");
	//echo($content . " " . $fileName);
	fwrite($fh, $content);
	fclose($fh);
	echo('Successful. ' . $extension);
}
else if($extension != ".txt") {
	$fullFile = "/var/www/xos/files/uploads/$session->username/" . $fileName . ".txt";
	$fh = fopen($fullFile, 'w') or die("Failed to Save File.");
	//echo($content . " " . $fileName);
	fwrite($fh, $content);
	fclose($fh);
	echo('Successful. ' . $extension);
}
else {
	echo('Error.');
}
?>