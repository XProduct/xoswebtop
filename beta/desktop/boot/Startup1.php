<!DOCTYPE HTML>
<html manifest="start.manifest">
<head>
<meta charset="utf-8">
<meta http-equiv="Refresh" content="30; URL=../xOSwebtop.php">
<title>xOS 3.2</title>
<style type="text/css">
body {
	background-image:url(../CORE/wallpapers/linen.png);
	background-size: cover;
}
</style>
<script type="text/javascript">
//Browser Fullscreen Mode Automatic Doings
function autoFullscreen() {
	var setting = "<? include("../CORE/getfullscreen.php"); ?>";
	alert('IT RAN: ' + setting)
	if(setting == "1") {
		var docElm = document.documentElement;
		if (docElm.requestFullscreen) {
			docElm.requestFullscreen();
			alert('I WENT R');
		}
		else if (docElm.mozRequestFullScreen) {
			docElm.mozRequestFullScreen();
			alert('I WENT M');
		}
		else if (docElm.webkitRequestFullScreen) {
			docElm.webkitRequestFullScreen();
			alert('I WENT W');
		}
		else {
			alert('NONE APPLICAABLE')
		}
		alert('DID IT');
	}
	else {
		alert('FAILED TESTING');
	}
}
function goFullscreen() {
	var docElm = document.documentElement;
	if (docElm.requestFullscreen) {
		docElm.requestFullscreen();
	}
	else if (docElm.mozRequestFullScreen) {
		docElm.mozRequestFullScreen();
	}
	else if (docElm.webkitRequestFullScreen) {
		docElm.webkitRequestFullScreen();
	}
}
</script>
</head>

<body onLoad="goFullscreen()">
<div id="holder" style="position: absolute; left: 50%; top: 50%; background-image:url(../CORE/tranparbox.png); background-size: cover; border: 4px; border-color: #333; border-radius: 10px; width: 280px; height: 370px; padding: 12px; margin-top: -185px; margin-left: -140px;">
<strong>
<font color="#FFFFFF"><p align="center">We are preparing xOS Webtop..</p>
<p>&nbsp;</p>
<p align="center"><img src="../CORE/loader.gif" width="16" height="16">&nbsp;Yes, just for you.</p><br>
<p align="center">Welcome</p>

</font>
</strong>
</div>
</body>
</html>
