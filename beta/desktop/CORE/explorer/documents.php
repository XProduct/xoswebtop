<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documents</title>
<?
include("../../xoslogin/include/session.php");
?>
</head>

<body>
<form name="upload-form" id="upload-form" method="post" enctype="multipart/form-data" action="/files/uploads/upload.php">
	<input type="hidden" value="<? echo $session->username ?>" name="dirName">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760"> 
    <input name="file" type="file" id="file">
    <input type="submit" name="cmdupload" value="Upload">
</form>
<hr>
    <iframe frameborder="0" id="list" src="list.php" style="height: 300px; width: 100%;">Frame Error: Unknown</iframe>
    </body>
</html>