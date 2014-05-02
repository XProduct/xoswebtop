<?

////////////////////////////////////////////////////////////////////
//// Downloads files instead of viewing them. CONTEXT(FUNCTION) ////
////////////////////////////////////////////////////////////////////

$downloadfile = $_GET['file']; //GET PAREMATERS FROM FILE IN URL
$downloadname = $_GET['name']; //GET PAREMATERS FROM FILE IN URL

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$downloadname"); //Output as name of the file
//header("Content-Type: image/png"); //Defines MIME type if you can't get it automatically.
header("Content-Transfer-Encoding: binary");
readfile($downloadfile); //Download it.
?>