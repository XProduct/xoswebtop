<?
include("../../xoslogin/include/session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Image Gallery</title>

<style type="text/css">
body {
	user-select: none;
	-webkit-user-select: none;
	-moz-user-select: none;
	background-color: #575757;
}
#slideshow {
	max-width:100%; 
	max-height:100%;
}
#slideToolbar {
	position: fixed;
	bottom: 0px; 
	height: 60px; 
	width: 100%; 
	left: 0px; 
	background-image: url(toolbar.png);
	background-repeat: repeat-x; 
	padding-top: 20px;
	padding-left: 10px;
	-webkit-transition: bottom 300ms ease-in 300ms;
	-moz-transition: bottom 300ms ease-in 300ms;
	-o-transition: bottom 300ms ease-in 300ms;
	transition: bottom 300ms ease-in 300ms;
}
#playPause {
	position: absolute;
	left: 150px;
	bottom: 7px;
}
#prevon {
	position: absolute;
	left: 200px;
	bottom: 7px;
}
#nexton {
	position: absolute;
	left: 240px;
	bottom: 7px;
}
#rangeTime {
	position: absolute;
	bottom: 38px;
	left: 10px;
	-webkit-appearance: none;
	background-color: #000000;
	width: auto;
	height: 4px;
}
#rangeTime::-webkit-slider-thumb {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #575757;
	border: #000 3px solid;
}
#rangeTime::-webkit-slider-thumb:active {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #60a6b3;
}

</style>

<script src="getimages.php"></script>
<script type="text/javascript">
var currentImg = 0;
var rootDir = "/files/uploads/<? echo $session->username ?>/";
var nextImageAuto;
var check = document.getElementById('playSlides');
var suto = "Automatic";


function autoPlay(force) {
	if(force != "") {
		if(force == "b") {
			
		}
		else if(force == "f") {
			
		}
		else {
			console.error("A non-valid value was inputed.", "Parameter is a \"b\" (Backwards), \"f\" (Forwards), or \"\" (Auto-Detect)");
		}
	}
	else {
		console.log("PaSSed");
	}
}
function showNextImageAuto() {
	
	if (playStopSlides() == true)
	{	
		document.getElementById("slideshow").setAttribute("src", rootDir + galleryarray[currentImg]);
		currentImg = (currentImg < galleryarray.length - 1) ? currentImg + 1 : 0;
		suto = "Automatic";
	}
	else if (playStopSlides() == false) {
		///////////////////////////////////////////////////////////
		// Not changing image // Make sure checkbox is unchecked //
		///////////////////////////////////////////////////////////
		suto = "Manual";
		check.checked = false;
	}
	else {
		console.error("Error in playStopSlides(). Error Code: 310");
	}
}

function showPrevImageAuto() {
	
	if (playStopSlides() == true)
	{	
		document.getElementById("slideshow").setAttribute("src", rootDir + galleryarray[currentImg]);
		currentImg = (currentImg + galleryarray.length - 1) % galleryarray.length;
		suto = "Automatic";
	}
	else if (playStopSlides() == false) {
		///////////////////////////////////////////////////////////
		// Not changing image // Make sure checkbox is unchecked //
		///////////////////////////////////////////////////////////
		suto = "Manual";
		check.checked = false;
	}
	else {
		console.error("Error in playStopSlides(). Error Code: 310");
	}
}

function showNextImageMan() {
	document.getElementById("slideshow").setAttribute("src", rootDir + galleryarray[currentImg]);
	currentImg = (currentImg < galleryarray.length - 1) ? currentImg + 1 : 0;
}

function showPrevImageMan() {
	document.getElementById("slideshow").setAttribute("src", rootDir + galleryarray[currentImg]);
	currentImg = (currentImg + galleryarray.length - 1) % galleryarray.length;
}

function startInterval() {
	
	var range = document.getElementById('rangeTime').value;
	var time = (range * 100);
	nextImageAuto = setInterval("showNextImageAuto()", time);
	
	var hTime = (time / 1000);
	
	console.log("Image rotation restarted at an interval of " + hTime + " seconds");
}

function refreshInterval() {
	//First clear the old Interval
	clearInterval(nextImageAuto);
	
	//console.log("Image rotation cleared");
	
	var range = document.getElementById('rangeTime').value;
	var time = (range * 100);
	nextImageAuto = setInterval("showNextImageAuto()", time);
	
	var hTime = (time / 1000);
	
	console.log("Image rotation restarted at an interval of " + hTime + " seconds");
}

function stopInterval() {
	clearInterval(nextImageAuto);
	
	console.log("Image rotation stopped. Switched to full Manual.");
	suto = "Manual";
}

function playStopSlides() {
	check = document.getElementById('playSlides');
	
	if (check.checked == true) {
		suto = "Automatic";
		return true;
	}
	else if(check.checked == false) {
		suto = "Manual";
		return false;
	}
	else {
		console.warn("Continuing as if checked = true.");
		suto = "Automatic";
		return true;
	}
}

function checkStatus() {
	console.log(suto + " is the current status of the image rotator.");
}

function statusImage() {
	if(check.checked == true) {
		document.getElementById('playPause').src = "playon.png";
	}
	else if(check.checked == false) {
		document.getElementById('playPause').src = "pauseon.png";
	}
}

function hideShowToolbar() {
	var el = document.getElementById('slideToolbar');
	if(el.style.bottom == "-70px") {
		el.setAttribute("style","bottom: 0px;");
	}
	else if(el.style.bottom == "0px") {
		el.setAttribute("style","bottom: -70px;");
	}
	else {
		//Keep it where it UP//
		el.setAttribute("style","bottom: 0px;");	
	}
}

window.onload = function(){
	showNextImageMan();
	startInterval();
}
</script>

<link rel="stylesheet" href="radio.css">

</head>

<body>
<center><div style="width: 100%; height: 100%">
    <img id="slideshow">
</div></center>

<div id="toolbarBack" style="position: fixed; bottom: 0px; height: 40px; width: 100%; left: 0px;" onMouseOver="hideShowToolbar();"></div>

<div id="slideToolbar" onMouseOut="hideShowToolbar();" onMouseOver="setTimeout('hideShowToolbar()', 1000);">
<input id="rangeTime" type="range" min="10" value="25" max="200" onMouseUp="refreshInterval();">
<input type="checkbox" checked id="playSlides" onChange="" style="visibility: hidden;">
<label for="playSlides"><img id="playPause" src="pauseon.png" onClick="statusImage();" onMouseOver="hideShowToolbar();"></label>

<img id="prevon" src="prevon.png" onClick="showPrevImageMan();" onMouseOver="hideShowToolbar();">
<img id="nexton" src="nexton.png" onClick="showNextImageMan();" onMouseOver="hideShowToolbar();">


<div id="toggleDirectionSwitch" onMouseOver="hideShowToolbar();">
	<fieldset class="switch blue">
    	<legend></legend>
		<input id="prev" name="view" type="radio">		
		<label for="prev"><img src="reverseon.png" width="40" height="40"></label>

		<input id="next" name="view" type="radio" checked>	
		<label for="next"><img src="forwardon.png" width="40" height="40"></label>
		
		<span class="switch-button" onMouseOver="hideShowToolbar();"></span>
	</fieldset>
</div>

<!--<script src="../js/fixmobile.js"></script>-->
	

</div>

</body>
</html>