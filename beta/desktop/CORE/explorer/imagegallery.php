<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<? include("../../xoslogin/include/session.php"); ?>
<script src="getimages.php"></script>
<script type="text/javascript">
var curimg=0
time = 10000;

function rotateimages() {
	document.getElementById("slideshow").setAttribute("src", '/files/uploads/<? echo $session->username ?>/'+galleryarray[curimg])
	curimg=(curimg<galleryarray.length-1)? curimg+1 : 0
	
	setInterval("rotateimages()", time)
}

function updateTime() {
	time = document.getElementById('speed').value;
}
</script>
</head>

<body onLoad="rotateimages()">
<center><div style="width: 700px; height: 700px;">
<img id="slideshow">
</div></center>

<div style="position: absolute; bottom: 0px; left:0px;">

<input type="range" id="speed" min="1000" value="10000" max="25000" width="300px" onChange="updateTime()">

</div>
</body>
</html>