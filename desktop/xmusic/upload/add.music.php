<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Add Music</title>
<script type="text/javascript">
function initUpload1() {
	document.getElementById('upload-form1').submit();
}
function initUpload2() {
	document.getElementById('upload-form2').submit();
}
function initUpload3() {
	document.getElementById('upload-form3').submit();
}
//document.getElementById("file").onchange = function() {
//    document.getElementById("upload-form1").submit();
//}
</script>
</head>

<body>
<h2>Add Files to your Music Library</h2>
<p>Up to 7MB per song. We suggest however you try and keep each song to 3MB and under so you can have more music.</p>
<p>Please note that we are currently only accepting the following formats: .ogg, .mp3, .m4a See chart below for browser supported formats.
<form name="upload-form" id="upload-form1" method="post" target="target1" enctype="multipart/form-data" action="upload.php">
  	<input type="hidden" name="MAX_FILE_SIZE" value="9437184"><!--IT IS IN BYTES-->
    <input type="hidden" name="verifo" value="yes">
    <input name="file" type="file" id="file" onChange="initUpload1()">
</form>
<iframe id="target1" width="450px" height="30px" frameborder="0" scrolling="no"></iframe>
<form name="upload-form" id="upload-form2" method="post" target="target2" enctype="multipart/form-data" action="upload.php">
  	<input type="hidden" name="MAX_FILE_SIZE" value="9437184"><!--IT IS IN BYTES-->
    <input type="hidden" name="verifo" value="yes">
    <input name="file" type="file" id="file" onChange="initUpload2()">
</form>
<iframe id="target2" width="450px" height="30px" frameborder="0" scrolling="no"></iframe>
<form name="upload-form" id="upload-form3" method="post" target="target3" enctype="multipart/form-data" action="upload.php">
  	<input type="hidden" name="MAX_FILE_SIZE" value="9437184"><!--IT IS IN BYTES-->
    <input type="hidden" name="verifo" value="yes">
    <input name="file" type="file" id="file" onChange="initUpload3()">
</form>
<iframe id="target3" width="450px" height="30px" frameborder="0" scrolling="no"></iframe>
<table width="100%" border="0">
  <tr>
    <th scope="col">Browser</th>
    <th scope="col">.mp3</th>
    <th scope="col">.ogg</th>
    <th scope="col">.m4a</th>
  </tr>
  <tr>
    <td>Internet Explorer</td>
    <td>YES</td>
    <td>NO</td>
    <td>NO</td>
  </tr>
  <tr>
    <td>Google Chrome</td>
    <td>YES</td>
    <td>YES</td>
    <td>YES</td>
  </tr>
  <tr>
    <td>Mozilla Firefox</td>
    <td>NO</td>
    <td>YES</td>
    <td>NO</td>
  </tr>
  <tr>
    <td>Apple Safari</td>
    <td>YES</td>
    <td>NO</td>
    <td>YES</td>
  </tr>
  <tr>
    <td>Opera</td>
    <td>NO</td>
    <td>YES</td>
    <td>NO</td>
  </tr>
</table>
<p>To convert files to the format that your browser uses we suggest <a href="http://www.freemake.com/free_audio_converter/">http://www.freemake.com/free_audio_converter/</a>. This is what we use and it works quite well in our opinion.</p>

</body>
</html>