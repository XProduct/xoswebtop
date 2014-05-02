<?
$file = $_POST['filetodel'];
echo($file);
unlink($file);
echo("File deleted.");
header('Location: list.php');
?>