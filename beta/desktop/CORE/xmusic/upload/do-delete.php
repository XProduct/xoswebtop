<?
$file = $_POST['filetodel'];
echo($file);
unlink($file);
echo("File deleted.")
?>