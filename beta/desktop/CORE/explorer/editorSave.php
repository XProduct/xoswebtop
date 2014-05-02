<?

include("../../xoslogin/include/session.php");

$format = "." . $_GET['type'];
$title = $_GET['title'];
$imagepath = $_GET['image'];
$imageiner = file_get_contents($imagepath);

$imageFileNew = "/var/www/xos/files/uploads/$session->username/$title$format";
$fh = fopen($imageFileNew, 'w') or die("Failed to Save File, <a href=\"editor.php\">Back</a>");
fwrite($fh, $imageiner);
fclose($fh);

header('Location: editor.php');

?>