<?
include("xoslogin/include/session.php");

if(!$session->logged_in){
	header('Location: xoslogin/main.php');
}
else {
?>
<!--
       ___    __
\  /  /   \  /		
 \/  |     | \__
 /\  |     |    \
/  \  \___/   __/ 3.2 Alpha 'B' Complete Revision 'R'

---------------------------------------XProduct Team------------

> Brandon Davis
> bdavis@xproduct.net
> XProduct Project Administrator

-->

<!DOCTYPE HTML>
<html manifest="offline.manifest">
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="3; url=javascript:fade('startup3')">
<title>xOS 3.2</title>
<script type="text/javascript">
var moz = "firefox";
var ie = "msie"

//Initialize our user agent string to lower case.
var uagent = navigator.userAgent.toLowerCase();

function DetectIE()
{
   if (uagent.search(ie) > -1)
      return true;
   else
      return false;
}

function DetectMOZ()
{
   if (uagent.search(moz) > -1)
      return true;
   else
      return false;
}

//Does Action: Redirects Device Page
    if (DetectMOZ())
	{
	   setTimeout('hideDiv(\'startup3\')', 4000);
	}
    else if (DetectIE())
	{
	   setTimeout('hideDiv(\'startup3\')', 4000);
	}
</script>

<!--Scripts-->
<script src="CORE/scripts/windows/dragwindow.js" type="text/javascript"> </script>
<script src="CORE/scripts/windows/genresize.js" type="text/javascript"> </script>
<script src="CORE/scripts/windows/hideshowwindows.js" type="text/javascript"> </script>
<script src="CORE/scripts/windows/ieemu.js" type="text/javascript"> </script>
<script src="CORE/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 
<script src="CORE/webrowser/jquery.url.min.js" type="text/javascript"></script> 
<script src="CORE/webrowser/script.js" type="text/javascript"></script>

<!--CSS-->
<link href="CORE/css/windowdiv.css" rel="stylesheet" type="text/css">
<link href="CORE/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<link href="CORE/css/stickies.css" rel="stylesheet" type="text/css">

<!--Internal Scripts-->
<script type="text/javascript">
if (moz) {
	extendElementModel(window);
	extendEventObject(window);
	emulateEventHandlers(["mousemove", "mousedown", "mouseup"]);
}

</script>
<script type="text/javascript">
function fullScreen(full) {
	var div = document.getElementById(full);

	if(div.style.width=="100.8%") { //Get Out of Fullscreen Window
			div.style.left = '64px';
			div.style.top = '139px';
			div.style.width = '737px';
			div.style.height = '467px';
			div.style.zIndex = '12';
			document.getElementById('exitfull').innerHTML = "<a class=\"accessMenuDisabled\" href=\"#\"><img src=\"CORE/images/desktop/fullappdisabled.png\" width=\"42\" height=\"42\"></a>";
	}
	else { //Go into fullscreen window
		div.style.left = '-4px';
		div.style.top = '-36px';
		div.style.width = '100.8%';
		div.style.height = '110%';
		div.style.zIndex = '9999';
		document.getElementById('exitfull').innerHTML = "<a href=\"javascript:fullScreen('" + full + "')\"><img src=\"CORE/images/desktop/fullappenabled.png\" width=\"42\" height=\"42\"></a>"; 
	}
}
</script>
<script type="text/javascript">
<!--
function toggleDiv(id,flagit) {
if (flagit=="1"){
if (document.layers) document.layers[''+id+''].visibility = "show"
else if (document.all) document.all[''+id+''].style.visibility = "visible"
else if (document.getElementById) document.getElementById(''+id+'').style.visibility = "visible"
}
else
if (flagit=="0"){
if (document.layers) document.layers[''+id+''].visibility = "hide"
else if (document.all) document.all[''+id+''].style.visibility = "hidden"
else if (document.getElementById) document.getElementById(''+id+'').style.visibility = "hidden"
}
}
//-->
</script>
<script type="text/javascript">
function disClock(v) {
	if(v=='1') {
		showDiv('Tick');
	}
	if(v=='2') {
		showDiv('Clock');
	}
	else {
		showDiv('Tick');
	}
}
</script>
<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>
<script type="text/javascript">
<!--
function gotoURL() {
var newURL = document.url2go.go.value
document.location.href=newURL
}
//-->
</script>
<script type="text/javascript">
//Browser Fullscreen Mode Automatic Doings
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
function canFullscreen() {
	if (document.exitFullscreen) {
    document.exitFullscreen();
	}
	else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	}
	else if (document.webkitCancelFullScreen) {
		document.webkitCancelFullScreen();
	}
}
function autoFullscreen(set) {
	var setting = set;
	alert('IT RAN: ' + setting)
	if(setting = "1") {
		goFullscreen()
		alert('DID IT');
	}
	else {
		alert('FAILED TESTING');
	}
}
</script>
<!-- EC Correcting Always On -->
<script type="text/javascript">
    function xosmove() {
        window.scroll(0,0)//This is the window position
    }
	function resizefx() {
    	document.getElementById('startbar').style.height = '69px';
	}
	function runEC() {
		setInterval('xosmove()', 0000 );
		setInterval('resizefx()', 0000 );
	}
</script>
<script type="text/javascript">
function handlePreStart() {
	runEC(); openNotes(); getHeightWindow(); changeBGImage('<? include("CORE/getbackground.php") ?>'); disClock('<?  include("CORE/getclock.php"); ?>');
}
window.addEventListener("load", handlePreStart, true);
</script>
<script type="text/javascript">
function checkUpdated() {
	document.getElementById('upgrade').innerHTML = "<p>Your xOS has been updated. <a href=\"#\" onClick=\"showDiv('restart')\">Restart</a> to recieve the upgrade.</p>";
	document.getElementById('softVer').innerHTML = "a out of date";
	document.getElementById('notis').innerHTML += "<div style=\"border-bottom: #333 solid thin; border-top: #333 solid thin;\"><table width=\"232px\" border=\"0\"><tr><td width=\"24px\">&nbsp;<img src=\"CORE/images/desktop/notdone.png\" width=\"14\" height=\"14\"></td><td><strong>Software Update</strong><br>Your xOS has been updated. <a href=\"#\" onClick=\"showDiv('restart')\">Restart</a> to recieve the upgrade.</td><tr><table></div>";
	document.getElementById('concerned').innerHTML = "<strong>Software Upgrade:</strong> A new Alpha Version is here. Visit the <a href=\"#\" onClick=\"TabbedPanels1.showPanel(4);\">Software Upgrade</a> tab to recieve the upgrade and get new information.";
	setTimeout("showDiv('upgrade')",8000);
	setTimeout("fade('upgrade')", 28000)
	
}

window.applicationCache.addEventListener('updateready', checkUpdated, false);
</script>
<script type="text/javascript">
var lastContext;
function Browser() {

  var ua, s, i;

  this.isIE    = false;
  this.isNS    = false;
  this.version = null;

  ua = navigator.userAgent;

  s = "MSIE";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isIE = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  s = "Netscape6/";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  // Treat any other "Gecko" browser as NS 6.1.

  s = "Gecko";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = 6.1;
    return;
  }
}

var browser = new Browser();

function contextMenu(event, id) {

var x, y; //x is left, y is top, like a grid
lastContext = id;

	if (browser.isIE) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}

	var curLpost = document.getElementById(id).style.left = x + 'px';
	var curTpost = document.getElementById(id).style.top = y + 'px';
	
	//alert(x + 'px, ' + y + 'px')
	
	showDiv(id);

}
function dismissMenu() {
	
 	hideDiv('menudesktop');
	hideDiv('contextDismiss');
}
function reContext() {
	hideDiv('menudesktop');
	hideDiv('contextDismiss');
	contextMenu(event, lastContext);
}

////Background Selector/////

//Detect If mouse is Down
mouseIsDown = false;
window.onload = function()
{
  var e = document.getElementById('d1');
//  e.onmouseover = report;
  document.onmouseover = report;
  document.onmouseout = report;
  document.onmousedown = function (e) {
    mouseIsDown = true;
    report(e);
  };
  document.onmouseup = function (e) {
    mouseIsDown = false;
    report(e);
  };
  document.onclick = function (e) {
    report(e);
  };
};
function report(evt)
{
  var ele, msg, ev = evt || window.event;
  //ele = document.getElementById('dir');
  //ele.firstChild.nodeValue = mouseIsDown;
  //ele = document.getElementById('coord');
  //ele.firstChild.nodeValue = ev.clientX + ' : ' + ev.clientY;
}
//FollowUp Drag Functions
function initBDrag(event) {

var x, y; //x is left, y is top, like a grid

	if (browser.isIE) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}
	
	orginx = x;
	orginy = y;

	//alert(orginx + ' ' + orginy);

	document.getElementById('desktopSelector').style.left = x + 'px';
	document.getElementById('desktopSelector').style.top = y + 'px';
	//Catch/Reset Selector Size Error
	document.getElementById('desktopSelector').style.width = '0px';
	document.getElementById('desktopSelector').style.height = '0px';
	
	//alert(x + 'px, ' + y + 'px')
	
	//showDiv('test');
	//showDiv('contextDismiss');

}
function doBDrag(event) {

var x, y;

if(mouseIsDown == true) {
	if (browser.isIE) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}
	
	document.getElementById('desktopSelector').style.visibility = 'visible';
	
	var calcW = Number(x) - Number(orginx);
	var calcH = Number(y) - Number(orginy);

	document.getElementById('desktopSelector').style.width = calcW + 'px';
	document.getElementById('desktopSelector').style.height = calcH + 'px';
	
	//alert(x + 'px, ' + y + 'px')
	
	//showDiv('test');
	//showDiv('contextDismiss');
}
}
function endBDrag() {
	document.getElementById('desktopSelector').style.visibility = 'hidden';
}
</script>
	

<!--Internal CSS-->
<style type="text/css">
body {
	margin: 0px 0px 0px 0px;
	background-repeat: no-repeat;
	background-size: cover;
	-moz-background-size: cover;
	-webkit-background-size: cover;
	overflow:hidden;
	font: Arial;
}
/*Context Menu*/ 
.fullmenu {
	position: absolute;
	top: 77px;
	left: 120px;
	visibility: hidden;
	background-color: #EEE;
	border: thin solid #111;
	width: 130px;
	z-index: 9999;
	padding-top: 10px;
	padding-bottom: 10px;
}
.contextEntry {
	width: 100%;
	cursor: default;
}
.contextEntry:hover {
	background-color: #4ba0bd;
	box-shadow: #666 0px 2px 4px;
	color: #EEE;
}
.contextEntryDisabled {
	width: 100%;
	color: #444;
	cursor: default;
}

/*Context Menu*/
a:link {
	color: #00C;
}
a:visited {
	color: #00C;
}
a:hover {
	color: #00C;
}
a:active {
	color: #00C;
}
@-webkit-keyframes rotate {
  from {
    -webkit-transform: rotate(0deg);
  }
  to { 
    -webkit-transform: rotate(360deg);
  }
}
#spinning img
{
    -webkit-animation-name:             rotate; 
    -webkit-animation-duration:         240s; 
    -webkit-animation-iteration-count:  infinite;
    -webkit-animation-timing-function:  linear;
}
.menuItem {
	padding: 3px;
}
.menuItem:hover {
	background: #555;
	color: #EEE;
	cursor: default;
}
</style>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28358901-1']);
  _gaq.push(['_setDomainName', 'xproduct.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<!--CORE VERSION -_-1.3.4-_- CORE VERSION-->
<body>

<!--FIRST LOAD-->
<div id="startup3" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; background-image:url(CORE/underback.png); background-size:cover; z-index: 9999;">
<div id="holder" style="position: absolute; left: 50%; top: 50%; background-image:url(CORE/tranparbox.png); background-size: cover; border: 4px; border-color: #333; border-radius: 10px; width: 280px; height: 370px; padding: 12px; margin-top: -185px; margin-left: -140px;">
<p align="center" style="color: #FFFFFF;"><strong>Welcome to xOS Webtop <? echo $session->username ?>.</strong></p>
<p>&nbsp;</p>
<p align="center" style="color: #FFFFFF;"><strong><img src="CORE/loader.gif" width="16" height="16">&nbsp;Now Loading Your Settings.</strong></p>
</div> 
</div>


<!--Backgrounds including Live Backgrounds-->

<div id="spinning" style="z-index: -100; visibility: hidden;">
<img id="milkyway" src="CORE/livebackgrounds/milkywaytop.jpg" style="position: absolute; top: 50%; left: 50%; margin-left: -1000px; margin-top: -1000px; width: 2000px; height: 2000px; z-index: -100;">
</div>

<!--Background Change-->
<script type="text/javascript">

var backImage = new Array();

backImage[0] = "CORE/wallpapers/defaultspace.jpg";
backImage[1] = "CORE/wallpapers/freshback.png";
backImage[2] = "CORE/wallpapers/linen.png";
backImage[3] = "CORE/wallpapers/startunnel.jpg";
backImage[4] = "CORE/wallpapers/waterfall.jpg";
backImage[5] = "CORE/wallpapers/greyback.jpg";
backImage[6] = "CORE/wallpapers/bluemoon.jpg";
backImage[7] = "CORE/wallpapers/winter.jpg";
backImage[8] = "";

// Do not edit below this line.
//-----------------------------

function changeBGImage(whichImage){
if (document.body){
document.body.style.backgroundImage = "url(" + backImage[whichImage] + ")";
document.body.style.backgroundSize = "cover";
}
}
</script>
<!--Background Change-->


<!--Menubar-->


<div id="top" style="height:36px; background-color: #AAA; -webkit-user-select:none; box-shadow: #666 0px 4px 8px; border-bottom: thin solid #111;" class="none">

<div style="position: absolute; top: 0px; left: 0px; background-color: #AAA; width: 60px; height: 20px; padding: 8px;" id="xos" onMouseOver="showDiv('subxos')" onMouseOut="hideDiv('subxos')"><strong><center>xOS</center></strong></div>
	<div id="subxos" style="position: absolute; top: 35px; left: 0px; visibility: hidden; width: 120px; background-color: #AAA; z-index: 9999;" onMouseOver="showDiv('subxos')" onMouseOut="hideDiv('subxos')">
        <div class="menuItem" onClick="showDiv('about')"><img src="CORE/images/small/info.png" width="16" height="16">&nbsp;About</div>
        <div class="menuItem" onClick="showDiv('softwareinfo')"><img src="CORE/images/small/softinfo.png" width="16" height="16">&nbsp;Software</div>
        <div class="none" style="background-color: #AAA;"><hr></div>
        <div class="menuItem" onClick="showDiv('shutdown')">&nbsp;&nbsp;&nbsp;&nbsp;Shut Down</div>
        <div class="menuItem" onClick="showDiv('restart')">&nbsp;&nbsp;&nbsp;&nbsp;Restart</div>
        <div class="menuItem" onClick="showDiv('logoff')">&nbsp;&nbsp;&nbsp;&nbsp;Log Out</div>
    </div>
<div style="position: absolute; top: 0px; left: 60px; background-color: #AAA; width: 60px; height: 20px; padding: 8px;" id="run" onMouseOver="showDiv('subrun')" onMouseOut="hideDiv('subrun')"><center>Run</center></div>
	<div id="subrun" style="position: absolute; top: 35px; left: 60px; visibility: hidden; background-color: #AAA; z-index: 9999;" onMouseOver="showDiv('subrun')" onMouseOut="hideDiv('subrun')">
        <div class="menuItem" onClick="showDiv('cmd')"><img src="CORE/images/small/terminal.png" width="16" height="16">&nbsp;Command</div>
        <div class="menuItem" onClick="showDiv('launchpad')"><img src="CORE/images/small/up.png"  width="16" height="16">&nbsp;SlingShot</div>
        <div class="menuItem" onClick="showDiv('explorer')"><img src="CORE/images/small/explorer.png"  width="16" height="16">&nbsp;xOS Explorer</div>
    </div>

<div id="ActionBar" align="right" style="position:absolute; right:123px; top: 9px; width: 158px; height: 24px; -webkit-user-select:none;">
</div>

<div id="userdis" class="name" style="position: absolute; top: 6px; right: 90px; height: 28px; -webkit-user-select:none; cursor: pointer;" onMouseOver="toggleDiv('div2',1)" onMouseOut="toggleDiv('div2',0)">
<? echo $session->username ?>
</div>

<div id="Clock" style="position:absolute; right:55px; top: 6px; height: 30px; width: 30px; -webkit-user-select:none; visibility: hidden;" onMouseOver="toggleDiv('div1',1)" onMouseOut="toggleDiv('div1',0)" class="none">
<form name="Tick">
<a onClick="showDiv('calendar')" class="chili"><input name="Clock" type="text" size="8" readonly style="background-color:#AAA; border-width:0; cursor: pointer;" class="chili"></a>
</form>
</div>
<div id="Tick" style="position:absolute; right:55px; top: 6px; height: 30px; width: 30px; -webkit-user-select:none; visibility:hidden;" onMouseOver="toggleDiv('div1',1)" onMouseOut="toggleDiv('div1',0)" class="none">
<form name="Clock">
<a onClick="showDiv('calendar')" class="chili"><input name="Tick" type="text" size="8" readonly style="background-color:#AAA; border-width:0; cursor: pointer;" class="chili"></a>
</form>
</div>
<script>
function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM" 
if (hours>12){
dn="PM"
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.Tick.Clock.value=hours+":"+minutes+":"+seconds+" "+dn
document.Clock.Tick.value=hours+":"+minutes+" "+dn
setTimeout("show()",1000)
}
show()
</script>
</div>




<!--Icons-->

<div id="desktop" onMouseDown="initBDrag(event)" onMouseMove="doBDrag(event)" onMouseUp="endBDrag()" style="-webkit-user-select:none; cursor: default;" onContextMenu="showDiv('contextDismiss'); contextMenu(event, 'menudesktop'); return false;">
<div id="desktopSelector" style="position: absolute; background-color: #CCC; opacity: 0.5; border: thin solid #999; visibility: hidden;"></div>
<script type="text/javascript">
function getHeightWindow() {
	var realHeight;
	if (window.innerWidth) {
		realHeight = window.innerHeight;
	}
	else if (document.documentElement && document.documentElement.clientHeight) {
		realHeight = document.documentElement.clientHeight;
	}
	else if (document.body) {
		realHeight = document.body.clientHeight;
	}
	document.getElementById('desktop').style.height = realHeight + "px";
}
</script>
<br>
<a href="CORE/explorer/computer.html" target="explorer" onClick="showDiv('explorer')"><img src="CORE/images/desktop/Computer.png" height="80px" width="80px" alt="COMPUTER"></a><p>
<a href="CORE/explorer/documents.php" target="explorer" onClick="showDiv('explorer')"><img src="CORE/images/desktop/Documents.png"
height="80px" width="80px" alt="DOCUMENTS"></a><p>
<a href="CORE/explorer/network.html" target="explorer" onClick="showDiv('explorer')"><img src="CORE/images/desktop/Satellite-128.png" height="80px" width="80px" alt="NETWORK"></a><br>

<div id="menudesktop" class="fullmenu" onClick="hideDiv('menudesktop'); hideDiv('contextDismiss');">
	<div class="contextEntryDisabled">&nbsp;&nbsp;&nbsp;Cut</div>
	<div class="contextEntryDisabled">&nbsp;&nbsp;&nbsp;Copy</div>
	<div class="contextEntryDisabled">&nbsp;&nbsp;&nbsp;Paste</div>
	<div><hr></div>
	<div class="contextEntry" onClick="TabbedPanels1.showPanel(1); showDiv('settings')">&nbsp;&nbsp;&nbsp;Personalize</div>
</div>

</div>

<!--Start Bar-->
<div id="dock" align="center" style="position: absolute; bottom: -24px; width: 100%; z-index: 11; -webkit-user-select:none;" class="dock">
<img src="CORE/dock.png" width="848" height="30" style="border-radius: 5px;">
</div>

<span onClick="showDiv('calendar'); front('calendar'); showDiv('ri01');" onMouseOver="showDiv('nd01')" onMouseOut="hideDiv('nd01')" style="cursor: pointer; position: absolute; margin-left: -413px; left: 50%; bottom: -12px; z-index: 15;"><h1><script>var today = new Date(); var dd = today.getDate(); if(dd<10){dd='0'+dd} var today = dd; document.write(today);</script></h1></span>

<div align="center" style="position:absolute; bottom:0px; width:100%; z-index: 12; -webkit-user-select:none;" id="startbar" class="startbar">
  <a onClick="showDiv('calendar'); front('calendar'); showDiv('ri01');" style="cursor: pointer;"><img src="CORE/images/start-bar/date.png" width="64" height="64" onMouseOver="showDiv('nd01')" onMouseOut="hideDiv('nd01')"></a>&nbsp;
  <a onClick="showDiv('writer'); front('writer'); showDiv('ri02');" style="cursor: pointer;"><img src="CORE/images/start-bar/textedit.png" width="64" height="64" onMouseOver="showDiv('nd02')" onMouseOut="hideDiv('nd02')"></a>&nbsp;
  <a onClick="showDiv('paint'); front('paint'); showDiv('ri03');" style="cursor: pointer;"><img src="CORE/images/start-bar/paint.png" width="64" height="64" onMouseOver="showDiv('nd03')" onMouseOut="hideDiv('nd03')"></a>&nbsp;
  <a onClick="showDiv('stickies'); front('stickies'); showDiv('ri04');" style="cursor: pointer;"><img src="CORE/images/start-bar/stickies.png" width="64" height="64" onMouseOver="showDiv('nd04')" onMouseOut="hideDiv('nd04')"></a>&nbsp;
  <a onClick="showDiv('gallery'); front('gallery'); showDiv('ri05');" style="cursor: pointer;"><img src="CORE/images/start-bar/gallery.png" width="64" height="64" onMouseOver="showDiv('nd05')" onMouseOut="hideDiv('nd05')"></a>&nbsp;
  <a onClick="showDiv('calc'); front('calc'); showDiv('ri06');" style="cursor: pointer;"><img src="CORE/images/start-bar/calculator.png" width="64" height="64" onMouseOver="showDiv('nd06')" onMouseOut="hideDiv('nd06')"></a>&nbsp;
  <a onClick="showDiv('email'); front('email'); showDiv('ri07');" style="cursor: pointer;"><img src="CORE/images/start-bar/email.png" width="64" height="64" onMouseOver="showDiv('nd07')" onMouseOut="hideDiv('nd07')"></a>&nbsp;
  <a onClick="showDiv('xmusic'); front('xmusic'); showDiv('ri08');" style="cursor: pointer;"><img src="CORE/images/start-bar/music.png" width="64" height="64" onMouseOver="showDiv('nd08')" onMouseOut="hideDiv('nd08')"></a>&nbsp;
  <a href="http://www.yahoo.com" target="frame" onClick="showDiv('webrowser'); front('webrowser'); showDiv('ri09');" style="cursor: pointer;"><img src="CORE/images/start-bar/webbrowser.png" width="64" height="64" onMouseOver="showDiv('nd09')" onMouseOut="hideDiv('nd09')"></a>&nbsp;
  <a onClick="showDiv('launchpad');" style="cursor: pointer;"><img src="CORE/images/start-bar/slingshot.png" width="64" height="64" onMouseOver="showDiv('nd10')" onMouseOut="hideDiv('nd10')"></a>&nbsp;
  <a onClick="showDiv('settings'); front('settings'); showDiv('ri10');" style="cursor: pointer;"><img src="CORE/images/start-bar/settings.png" width="64" height="64" onMouseOver="showDiv('nd11')" onMouseOut="hideDiv('nd11')"></a>&nbsp;
  <a href="CORE/explorer/desktop.html" target="explorer" onClick="showDiv('explorer'); front('explorer'); showDiv('ri11');" style="cursor: pointer;"><img src="CORE/images/start-bar/explorer.png" width="64" height="64" onMouseOver="showDiv('nd12')" onMouseOut="hideDiv('nd12')"></a>&nbsp;
  
 </div>
 <div style="position:absolute; bottom:0px; margin-left: -433px; left: 50%; width:100%; z-index: 12; color: #CCCCCC;">
    <div style="position: absolute; bottom: 79px; left: 0px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd01">Calendar</div>
    <div style="position: absolute; bottom: 79px; left: 71px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd02">TextEdit</div>
    <div style="position: absolute; bottom: 79px; left: 142px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd03">Paint</div>
    <div style="position: absolute; bottom: 79px; left: 213px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd04">Stickies</div>
    <div style="position: absolute; bottom: 79px; left: 284px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd05">Gallery</div>
    <div style="position: absolute; bottom: 79px; left: 355px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd06">Calculator</div>
    <div style="position: absolute; bottom: 79px; left: 428px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd07">Email</div>
    <div style="position: absolute; bottom: 79px; left: 497px; width: 72px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd08">Music</div>
    <div style="position: absolute; bottom: 79px; left: 572px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd09">weBrowser</div>
    <div style="position: absolute; bottom: 79px; left: 644px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd10">Slingshot</div>
    <div style="position: absolute; bottom: 79px; left: 716px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd11">Settings</div>
    <div style="position: absolute; bottom: 79px; left: 788px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd12">Explorer</div>
 </div></font>
 <div style="position: absolute; bottom: 0px; margin-left: -433px; left: 50%; width:100%; z-index: 12;">
    <div id="ri01" style="position: absolute; bottom: -10px; visibility: hidden; left: 24px;"><img src="CORE/running.png" width="24" height="14"></div><!--Calendar-->
    <div id="ri02" style="position: absolute; bottom: -10px; visibility: hidden; left: 95px;"><img src="CORE/running.png" width="24" height="14"></div><!--TextEdit-->
    <div id="ri03" style="position: absolute; bottom: -10px; visibility: hidden; left: 166px;"><img src="CORE/running.png" width="24" height="14"></div><!--Paint-->
    <div id="ri04" style="position: absolute; bottom: -10px; visibility: hidden; left: 237px;"><img src="CORE/running.png" width="24" height="14"></div><!--Stickies-->
    <div id="ri05" style="position: absolute; bottom: -10px; visibility: hidden; left: 308px;"><img src="CORE/running.png" width="24" height="14"></div> <!--Gallery-->
    <div id="ri06" style="position: absolute; bottom: -10px; visibility: hidden; left: 382px;"><img src="CORE/running.png" width="24" height="14"></div><!--Calculator-->
    <div id="ri07" style="position: absolute; bottom: -10px; visibility: hidden; left: 454px;"><img src="CORE/running.png" width="24" height="14"></div><!--Email-->
    <div id="ri08" style="position: absolute; bottom: -10px; visibility: hidden; left: 526px;"><img src="CORE/running.png" width="24" height="14"></div><!--Music-->
    <div id="ri09" style="position: absolute; bottom: -10px; visibility: hidden; left: 599px;"><img src="CORE/running.png" width="24" height="14"></div><!--weBrowser-->
    <div id="ri10" style="position: absolute; bottom: -10px; visibility: hidden; left: 743px;"><img src="CORE/running.png" width="24" height="14"></div><!--Settings-->
    <div id="ri11" style="position: absolute; bottom: -10px; visibility: hidden; left: 814px;"><img src="CORE/running.png" width="24" height="14"></div><!--Explorer-->
    <div id="ri12" style="position: absolute; bottom: -10px; visibility: hidden; left: 885px;"><img src="CORE/running.png" width="24" height="14"></div><!--NULL - EMPTY-->
 </div>
<!--END Start Bar-->

<!--OVERLAY NOTIFICATIONS-->

<div id="div1" style="position:absolute; top: 36px; right: 1px; visibility:hidden; background-color:#999999;" onMouseOver="toggleDiv('div1',1)" onMouseOut="toggleDiv('div1',0)"><script src="CORE/scripts/calendar.js"></script></div>

<div id="div2" style="position:absolute; top: 36px; right: 1px; visibility: hidden; background-color:#999999; border-style: solid; border-width: 2px; border-color: #CCC; padding: 10px; -webkit-user-select: none;" onMouseOver="toggleDiv('div2',1)" onMouseOut="toggleDiv('div2',0)">Welcome to xOS Webtop<br>You are logged in as <? echo $session->username ?>.<p align="center"><a href="xoslogin/manage.php" onClick="showDiv('manlogin')" target="mlogn" title="Manage Account">Manage Your Account</a></p></div>

<!--END OVERLAY-->

<!--Windows-->

<!--DEVELOPMENT MODE <PROFILE>MODE DEV=?1.2</PROFILE>_MATCH=CONTINUE okay_<MODE>SHOW=true.deve.xos.black</MODE> - - 12 - - -->

<!--EXIT PROFILE=MODE DEV=?1.2 <MODE>SHOW=false.deve.xos.black</MODE> - - 0 - - -->

<!--Note to the xOS Dev

The window format:

<div id="[windowname]" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, '[windowname]')">
<a onClick="hideDiv('[windowname]')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> [windowname]</div>
	  <div class="content">
    <p>The content of your window goes here.</p>
  </div>
</div>

[WINDOWNAME]* = Your Applications Name

*4 total of this field

<!--End Dev Note-->

<!--CORE APPLICATIONS-->

<div id="about" style="overflow: hidden;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'about')">
About xOS 3 <a onClick="hideDiv('about')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></div>
	  <div class="content" style="height: 89%; overflow: auto;">
        <p>Welcome to the xOS <? $session->username ?>. Check out the new things you can do in xOS Webtop 3.2.</p>
        <p><strong><u>CORE 2</u></strong></p>
        <p>CORE 2 is what sits at the pedestal of xOS and controls, ties, and optimizes it so you can have the best expience possible. Now with a boot of just 4 seconds, it will be the only thing you want. 
        <p><strong><u>Access Menu</u></strong></p>
        <p>Access Menu is a shortcut to all the general functions you use in xOS. Applcation Fullscreen Toggle, Notifications, Music Panel, and Short List Menu all in one easy to reach place.</p>
        <p><b><u>Real Fullscreen Apps</u></b></p>
        <p>&nbsp;&nbsp;&nbsp;xOS Webtop is best viewed in fullscreen and so should your apps. Open an app and click the fullscreen button in the upper right hand corner of the window and it will introduce it self.</p>
        <p><b><u>Music</u></b></p>
        <p>It is here and it is exclusivly avaialbe to xOS users. You, your music, and all your other stuff, intagrated seamlessly for a wonderful and buetiful expierence.</p>
        <p><b><u>weBrowser</u></b></p>
        <p>Yeah, lets change the browser once again. How about it? While where a it how about we proxy it to you so you always have your websites where ever you go. No blocking. No worry.</p>
        <p>We hope you all love the new xOS and enjoy.</p>
        <p>Thanks,</p>
        <p>~The XProduct Team~</p>
  </div>
</div>

<div id="softwareinfo" style="overflow:auto; width: 400px; height: 680px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'softwareinfo')">
<a onClick="hideDiv('softwareinfo')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> About Software</div>
	  <div class="content">
    <img align="middle" src="CORE/logo.png">
    <p align="center">Software Version: 3.2.0 Alpha</p>
    <p align="center">CORE Version: 2.00.00</p>
    <p>&nbsp;</p>
    <hr>
    <p>xOS is over-up-to-date, you are running a alpha version of xOS Webtop. Thank You for beta testing xOS Webtop</p>
    <hr>
    <p>&nbsp;</p>
    <p align="center">Enjoy xOS Webtop plus all its amazing features.</p>
    <hr>
    <p align="center">Your donations and feedback are deeply appreciated.</p>
    <p align="center">
    <a href="don/submit.html" onClick="showDiv('donfeed')" target="contributefrm"><img src="CORE/about/soft.donate.png" width="120" height="40" title="Give Donation" style="border-radius: 5px;"></a>&nbsp;&nbsp;&nbsp;
	<a href="../feedback/submit.html" onClick="showDiv('donfeed')" target="contributefrm"><img src="CORE/about/soft.feedback.png" width="150" height="40" title="Give Feedback" style="border-radius: 5px;"></a>
</p>
    <p style="position:absolute; bottom:0px;">XProduct 2012</p>
  </div>
</div>

<div id="cmd" style="overflow:auto; background-color:#000000;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'cmd')">
<a onClick="hideDiv('cmd')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Command</div>
	  <div class="content">
    <form action="javaScript:gotoURL()" method="get" name="url2go">
	  <label for="textarea"></label>
	  <textarea name="go" id="textarea" cols="85" rows="22" onclick="this.value='';" style="background-color:#000; border:#000000; color: #FFF;">Enter Your Commands Here - XProduct 2012</textarea>
	  <input value="Execute" type="submit">
	</form> 
</div>
</div>

<div id="explorer" style="overflow:auto" class="window">
	<div class="menubar" 
    	onmousedown="dragStart(event, 'explorer')">
<a onClick="hideDiv('explorer'); hideDiv('ri11')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="hideDiv('explorer')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Explorer</div>
	  <div class="content">
      <table id=epl width="100%" height="100%" border="0">
        <tr>
          <td width="150px"><a href="CORE/explorer/desktop.html" target="explorer">Desktop</a>
          				<p><a href="CORE/explorer/computer.html" target="explorer">Computer</a>
                        <p><a href="CORE/explorer/applications.html" target="explorer">Applications</a>
                        <p><a href="CORE/explorer/documents.php" target="explorer">Documents</a>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p><a href="CORE/explorer/network.html" target="explorer">Network</a>
          </td>
          <td><iframe frameborder="0" style="width:100%; height:390px; vertical-align:top" name="explorer" src="CORE/explorer/desktop.html"></iframe></td>
        </tr>
      </table>
</div>
</div>

<div id="gallery" style="overflow:auto" class="window">
	<div class="menubar" 
    	onmousedown="dragStart(event, 'gallery')">
<a onClick="hideDiv('gallery'); hideDiv('ri05')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="hideDiv('gallery')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Gallery</div>
	<div class="content">
    	<p>Welcome to the new Gallery App. A picture gallery will soon ocupy this space with close integration with Paint and xOS CORE functions. SPEx:</p>
        <p>WILL SUPPORT CONTEXT MENU: Y</p>
        <p>WILL HAVE CORE INTEGRATION: Y</p>
        <p>FULLSCREEN SUPPORT: Y</p>
        <p>CORE 2 SUPPORT: NATIVE</p>
	</div>
</div>

<div id="manlogin" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'manlogin')">
<a onClick="hideDiv('manlogin')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Manage Your Account</div>
	  <div class="content">
    <iframe id="mlogn" width="100%" height="85%" frameborder="0">Please Upgrade to Google Chrome or Apple Safari</iframe>
    </div>
</div>

<div id="settings" style="overflow:auto; height:487px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'settings')">
<a onClick="hideDiv('settings'); hideDiv('ri10')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="hideDiv('settings')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Settings</div>
	  <div class="content">
<div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
      	<li class="TabbedPanelsTab" tabindex="0">Front Desk</li>
        <li class="TabbedPanelsTab" tabindex="1">Background</li>
        <li class="TabbedPanelsTab" tabindex="2">Network</li>
        <li class="TabbedPanelsTab" tabindex="3">Display</li>
        <li class="TabbedPanelsTab" tabindex="4">Software Upgrade</li>
        <li class="TabbedPanelsTab" tabindex="5">Credits</li>
      </ul>
      <div class="TabbedPanelsContentGroup">
      
      	<div class="TabbedPanelsContent">
        	<h2>Front Desk</h2>
            <p id="concerned">It appears you currently have nothing you should be concerned with.</p>
            
        </div>
        <div class="TabbedPanelsContent">
        	<p><strong>Change Display Settings</strong></p>
            <strong>Background</strong>
            <br>Choose a background that best suits you.
            <div style="height: 288px; overflow: auto;">
            <table width="100%" border="0" cellspacing="6">
  <tr>
    <td><a href="CORE/backgrounds/updateback0.php" target="runcmd" onClick="changeBGImage(0); hideDiv('spinning')"><img src="CORE/wallpapers/defaultspace.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback1.php" target="runcmd" onClick="changeBGImage(1); hideDiv('spinning')"><img src="CORE/wallpapers/freshback.png" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback2.php" target="runcmd" onClick="changeBGImage(2); hideDiv('spinning')"><img src="CORE/wallpapers/linen.png" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback3.php" target="runcmd" onClick="changeBGImage(3); hideDiv('spinning')"><img src="CORE/wallpapers/startunnel.jpg" width="160" height="128"></a></td>
  </tr>
  <tr>
    <td><a href="CORE/backgrounds/updateback4.php" target="runcmd" onClick="changeBGImage(4); hideDiv('spinning')"><img src="CORE/wallpapers/waterfall.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback5.php" target="runcmd" onClick="changeBGImage(5); hideDiv('spinning')"><img src="CORE/wallpapers/greyback.jpg" width="160" height="128"></a></td>
    <td><a href="javascript:showDiv('spinning')"><img src="CORE/livebackgrounds/milkywaytop.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback7.php" target="runcmd" onClick="changeBGImage(7); hideDiv('spinning')"><img src="CORE/wallpapers/winter.jpg" width="160" height="128"></a></td>
  </tr>
  <tr>
    <td><a href="CORE/backgrounds/updateback6.php" target="runcmd" onClick="changeBGImage(6); hideDiv('spinning')"><img src="CORE/wallpapers/bluemoon.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback8.php" target="runcmd" onClick="changeBGImage(8); hideDiv('spinning')"><img src="CORE/wallpapers/blank.png" width="160" height="128"></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>           
</div>
</div>

<div class="TabbedPanelsContent">
        <p>Your Network information.</p>
        <p>NO NETWORK INFORMATION</p>
</div>
<div class="TabbedPanelsContent"><br>
		<p><b><u>Fullscreen</u></b></p>
		<p>The best way to veiw xOS is in fullscreen.</p>
        <p><button onClick="goFullscreen()">Go Fullscreen</button>&nbsp;&nbsp;<button onClick="canFullscreen()">Quit Fullscreen</button></p>
        <p><a href="CORE/backgrounds/updatefull1.php" target="runcmd" onClick="goFullscreen();">Remind</a> or <a href="CORE/backgrounds/updatefull0.php" target="runcmd" onClick="canFullscreen();">Don't Remind</a> me to go fullscreen.</p>
        <p><b><u>Clock</u></b></p>
        <p>Which do you prefer?</p>
        <p>&nbsp;&nbsp;<a href="CORE/backgrounds/updateclock1.php" target="runcmd2" onClick="showDiv('noseck'); hideDiv('hideDiv('seck')">3:30 PM</a>&nbsp;&nbsp;or&nbsp;&nbsp;<a href="CORE/backgrounds/updateclock2.php" target="runcmd2" onClick="showDiv('seck'); hideDiv('hideDiv('noseck')">3:30:21 PM</a>&nbsp;&nbsp;
</div>
<div class="TabbedPanelsContent">
        <p>xOS is <span id="softVer">of a current</span> version. </p>
        <p>NO VERSION INFORMATION</p>
</div>
<div class="TabbedPanelsContent">
        <p>Credits</p>
        <p>The XProduct Team &copy; 2010-2012. XProduct is the sole owner and developer of xOS Webtop and the xOS. </p>
</div>
    </div>
</div>
</div>
</div>

<div id="launchpad" onClick="hideDiv('launchpad')" style="position: absolute; top: 0px; left: 0px; background-image: url(CORE/wallpapers/linen.blur.png); visibility: hidden; width: 100%; height: 100%; z-index: 99999; padding: 100px;">
	<h1 style="position: absolute; top: 30px; left: 30px; color: #CCC;">Slingshot</h1>
    
	<div id="slingContent" style=" margin: 105px 10% 80px 10%; position: absolute; top: 0px; left: 0px; width: 67%;">
          <span><a onClick="showDiv('calendar'); front('calendar')" style="cursor: pointer;"><img src="CORE/images/start-bar/date.png" width="100" height="100"></a>&nbsp;
          	<span onclick="showDiv('calendar'); front('calendar'); showDiv('ri01');" onmouseover="showDiv('nd01')" onmouseout="hideDiv('nd01')" style="cursor: pointer; position: absolute; top: 5px; left: 5px; z-index: 15; font-size: 60px;"><script>var today = new Date(); var dd = today.getDate(); if(dd<10){dd='0'+dd} var today = dd; document.write(today);</script></span>
          </span>
          <a onClick="showDiv('writer'); front('writer')" style="cursor: pointer;"><img src="CORE/images/start-bar/textedit.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('paint'); front('paint')" style="cursor: pointer;"><img src="CORE/images/start-bar/paint.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('stickies'); front('stickies')" style="cursor: pointer;"><img src="CORE/images/start-bar/stickies.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('calc'); front('calc')" style="cursor: pointer;""><img src="CORE/images/start-bar/calculator.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('email'); front('email')" style="cursor: pointer;"><img src="CORE/images/start-bar/email.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('gameportal'); front('gameportal')" style="cursor: pointer;"><img src="CORE/images/start-bar/gpicon.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('xmusic'); front('xmusic')" style="cursor: pointer;"><img src="CORE/images/start-bar/music.png" width="100" height="100"></a>&nbsp;
          <a href="http://www.yahoo.com" target="frame" onClick="showDiv('webrowser'); front('webrowser')"><img src="CORE/images/start-bar/webbrowser.png" width="100" height="100"></a>&nbsp;
          <a onClick="showDiv('settings'); front('settings')" style="cursor: pointer;"><img src="CORE/images/start-bar/settings.png" width="100" height="100"></a>&nbsp;
          <a href="CORE/explorer/desktop.html" target="explorer" onClick="showDiv('explorer'); front('explorer')"><img src="CORE/images/start-bar/explorer.png" width="100" height="100"></a>&nbsp;
    </div>
</div>


<!--Other Programs-->

<div id="webrowser" style="overflow:auto; width:900px; height: 620px;" class="window">
	<div class="menubar" style="background-color: #5fa8b6; box-shadow: none;"
    	onmousedown="dragStart(event, 'webrowser')">
<a onClick="hideDiv('webrowser'); hideDiv('ri09')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('webrowser')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right"  onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a><a onClick="hideDiv('webrowser')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a></div>
	  <div class="content">
    <div id="browser">
    <div id="msn" style="position:absolute; left:511px; top:55px; width: 96px;"><a href="http://www.msn.com" target="frame"><img src="CORE/webrowser/msnlink.png" width="141" height="40"></a></div>
    <div style="position:absolute; left: 110px; top: 30px;" id="next"><a href="javascript:history.go(1)"><img src="CORE/webrowser/next.png" width="64" height="64"></a></div>
  <div style="position:absolute; top: 10px;" id="back"><a href="javascript:history.go(-1)"><img src="CORE/webrowser/back.png" width="108" height="108"></a></div>
  <div style="position:absolute; width: 17px; left: 680px; top: 30px;" id="reload"><img src="CORE/webrowser/reload.png" width="22" height="22"></div>
  <input id="url" name="url" style="position:absolute; left: 200px; width: 464px; top: 30px;" placeholder="http://" onclick="document.getElementById('url').focus();"></input>
  <input id="google" name="google" style="position:absolute; left: 200px; top: 55px; width: 258px;" placeholder="Search Bing" onClick="document.getElementById('google').focus();"></input>
  <iframe frameborder="0" id="frame" name="frame" class="frame" style="position:absolute; left: 11px; top: 110px; width: 97%; height: 80%; overflow:auto; background-color:#FFF;"></iframe>
</div>
  </div>
</div>

<div id="calendar" style="overflow:hidden; width:870px; height: 620px; background-color: #FFF;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'calendar')">
<a onClick="hideDiv('calendar'); hideDiv('ri01')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('calendar')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right"  onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a><a onClick="hideDiv('calendar')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Calendar</div>
	  <div class="content" style="padding: 0px;">
      <div style="position: absolute; background-color: #d4dde6; width: 170px; height: 100%; border-right: 1px solid #a5a5a5;"></div>
      <div id="calframe" style="position: relative; top: 10px;">
      <iframe src="CORE/calendar/index.html" width="100%" height="92%" frameborder="0" scrolling="no">Please Upgrade to Google Chrome or Apple Safari</iframe>
      </div>
   </div>
</div>

<div id="email" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'email')">
<a onClick="hideDiv('email'); hideDiv('ri07')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onMouseOver="this.src='CORE/CloseBack.png'"
onMouseOut="this.src='CORE/Close.png'"></a><a onClick="hideDiv('email')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> E-mail</div>
	  <div class="content">
    <img src="CORE/images/desktop/error.png" width="150" height="125" style="-webkit-user-select: none;"><h1 style="position: absolute; top: 70px; left: 140px;">Sorry,</h1>
    <p style="-webkit-user-select: none;">This feature has been disabled due to user security. We hope to do something useful here soon.
    <p style="-webkit-user-select: none;">Thank you for your understanding,
    <p style="-webkit-user-select: none;">~The XProduct Team~
  </div>
</div>

<div id="writer" style="overflow:hidden; background-color: #EEE; width: 860px; height: 630px;" class="window">
	<div id="containment">
    <div class="menubar"
    	onmousedown="dragStart(event, 'writer')">
<a onClick="hideDiv('writer'); hideDiv('ri02')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onMouseOver="this.src='CORE/CloseBack.png'"
onMouseOut="this.src='CORE/Close.png'"></a><a onClick="hideDiv('writer')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> TextEdit</div>
<div id="controls" style="position: relative; top: -5px; left: 0px; height: 108px; background-color: #999; box-shadow: #666 0px 4px 8px; padding: 10px;">
    <div id="clipboard" style="position: absolute; top: 5px; left: 5px; width: 145px; height: 115px; background: #CCC; opacity: 0.5; border: thin solid #333; border-radius: 5px;"></div>
        <div style="position: absolute; top: 5px; left: 5px;">
        	<img src="CORE/images/textedit/paste.gif" style="position: absolute; top: 5px; left: 5px;" width="70" height="70" onclick="fontEdit('insertHTML', selectedtext.value)"> 
            <p style="position: absolute; top: 58px; left: 25px;">Paste</p>
            <img src="CORE/images/textedit/cut.gif" style="position: absolute; top: 5px; left: 95px;" onClick="clipboardCopy(); fontEdit('insertHTML', '')">
            <p style="position: absolute; top: 10px; left: 95px;">Cut</p>
            <img src="CORE/images/textedit/copy.gif" style="position: absolute; top: 50px; left: 95px;" onClick="clipboardCopy()">
            <p style="position: absolute; top: 55px; left: 90px;">Copy</p>
			<input type="hidden" id="selectedtext" name="selectedtext">
            <p style="position: absolute; top: 80px; left: 40px;">Clipboard</p>
        </div>
    <div id="font" style="position: absolute; top: 5px; left: 155px; width: 298px; height: 115px; background: #CCC; opacity: 0.5; border: thin solid #333; border-radius: 5px;"></div>
    	<div style="position: absolute; top: 10px; left: 160px;">
            <select id="fonts" style="width: 160px;" onChange="fontEdit('fontname',this[this.selectedIndex].value)">
                <option value="Arial">Arial</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Courier New">Courier New</option>
                <option value="Monotype Corsiva">Monotype</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Times">Times New Roman</option>
            </select>
            <select id="size" onChange="fontEdit('fontsize',this[this.selectedIndex].value)">
                <option value="1">7px</option>
                <option value="2" selected>10px</option>
                <option value="3">12px</option>
                <option value="4">14px</option>
                <option value="5">18px</option>
                <option value="6">24px</option>
                <option value="7">36px</option>
            </select>
            <select id="color" onChange="fontEdit('ForeColor',this[this.selectedIndex].value)">
                <option value="black">Black</option>
                <option style="color:red;" value="red">Red</option>
                <option style="color:blue;" value="blue">Blue</option>
                <option style="color:green;" value="green">Green</option>
                <option style="color:pink;" value="pink">Pink</option>
            </select>
            <p style="position: absolute; top: 78px; left: 130px;">Fonts</p>
        </div>
        <div style="position: absolute; top: 35px; left: 160px;">
            <img src="CORE/images/textedit/bold.gif" onClick="fontEdit('bold')">
            <img src="CORE/images/textedit/italic.gif" onClick="fontEdit('italic')">
            <img src="CORE/images/textedit/underline.gif" onClick="fontEdit('underline')">
        </div>
        <div id="justify" style="position: absolute; top: 5px; left: 458px; width: 260px; height: 115px; background: #CCC; opacity: 0.5; border: thin solid #333; border-radius: 5px;"></div>
        <div style="position: absolute; top: 35px; left: 463px;">
            <img src="CORE/images/textedit/left.gif" onClick="fontEdit('justifyleft')">
            <img src="CORE/images/textedit/center.gif" onClick="fontEdit('justifycenter')">
            <img src="CORE/images/textedit/right.gif" onClick="fontEdit('justifyright')"> | 
            <input type="button" style="height:21px; width:21px;" value="1)" onClick="fontEdit('insertorderedlist')" title="Numbered List" />
            <input type="button" style="height:21px; width:21px;" value="&bull;" onClick="fontEdit('insertunorderedlist')" title="Bullets List" />
            <input type="button" style="height:21px; width:21px;" value="?" onClick="fontEdit('outdent')" title="Outdent" />
            <input type="button" style="height:21px; width:21px;" value="?" onClick="fontEdit('indent')" title="Indent" />
            <input type="button" style="height: 21px; width: 21px;" value="Pr" onClick="printOut()" title="Print">
            <input type="button" style="height: 21px; width: 21px;" value="Sv" onClick="saveFile()" title="Save">
            <input type="button" style="height: 21px; width: 21px;" value="Op" onClick="openFile()" title="Open">
        </div>
</div>
</div>
	  <div class="content" style="height: 70%; overflow: auto;">        
        <center>
        <iframe id="textEditor" name="textEditor" style="width:800px; height:1030px; box-shadow: #333 0px 5px 12px 5px; background-color: #FFF; z-index: -999;" frameborder="0"></iframe>
        </center>

		<script type="text/javascript">
        textEditor.document.designMode="on";
        textEditor.document.open();
        textEditor.document.write('<head><style type="text/css">body{ font-family:arial; font-size:13px; margin: 75px 75px 75px 75px;}</style></head>');
        textEditor.document.close();
        
        function def()
        {
            document.getElementById("fonts").selectedIndex=0;
            document.getElementById("size").selectedIndex=1;
            document.getElementById("color").selectedIndex=0;
        }
        function fontEdit(x,y)
        {
            textEditor.document.execCommand(x, "", y);
            //textEditor.focus();
        }
		function clipboardCopy()
			{
			    var txt = '';
			     if (textEditor.getSelection)
			    {
			        txt = textEditor.getSelection();
			             }
			    else if (textEditor.getSelection)
			    {
			        txt = textEditor.getSelection();
			            }
			    else if (textEditor.selection)
			    {
			        txt = textEditor.selection.createRange().text;
			            }
			    else return;
			document.getElementById('selectedtext').value =  txt;
			}
        function printOut() {
            document.textEditor.print();
        }
        function saveFile() {
            var content = document.getElementById('textEditor').contentWindow.document.body.innerHTML; 
            document.getElementById('saveContent').value = content;
            showDiv('saveDialog');
			//saveContent.focus();
        }
		function openFile() {
            showDiv('openDialog');
			updateOpenFileList();
        }
		function openFileContents(num) {
			var newContent = document.getElementById('openFileContent' + num +'').value;
			var newTitle = document.getElementById('openFileTitle' + num + '').value;
			
			textEditor.document.designMode="on";
        	textEditor.document.open();
        	textEditor.document.write('<head><style type="text/css">body{ font-family:arial; font-size:13px; margin: 75px 75px 75px 75px;}</style></head>');
			textEditor.document.write(newContent);
        	textEditor.document.close();
			
			document.getElementById('crtDocTitle').value = newTitle;
			
		}
		function updateOpenFileList() {
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("odcon").innerHTML = xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","CORE/backgrounds/openoxdfile.php",true);
		xmlhttp.send();
		}
        </script>
	</div>
</div>

<!--TextEdit Dialog Boxes-->

<div id="saveDialog" style="top: 400px; left: 400px; overflow: hidden; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar" onmousedown="dragStart(event, 'saveDialog')"> Save File</div>
	  <div class="content">
    <p>Save your file to the server.</p>
  <p align="center">
    <form action="CORE/backgrounds/writefile.php" target="runtextEdit" method="post" enctype="multipart/form-data">
    	<input type="text" id="crtDocTitle" name="name" placeholder="File Name" onclick="document.getElementById('crtDocTitle').focus();"><br><br>
        <input id="saveContent" name="saveContent" type="hidden" value="FAILED TO WRITE">
        <input type="submit" value="Save" onClick="hideDiv('saveDialog'); saveStatus();"><input type="button" value="Cancel" onClick="hideDiv('saveDialog')">
    </form>
  </p>
  </div>
</div>

<div id="openDialog" style="top: 400px; left: 400px; overflow:hidden; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar" onmousedown="dragStart(event, 'openDialog')"> Open File</div>
	  <div class="content" style="height: 51%; overflow: auto;">
    <p>Click a file below to open it in Writer.</p>
  <p align="center">
      <span id="odcon">
		<?
            // Define the full path to your folder from root 
            $path = "/var/www/xos/files/uploads/$session->username"; 
            $i = 1;
        
            // Open the folder 
            $dir_handle = @opendir($path); 
        
            // Loop through the files 
            while ($file = readdir($dir_handle)) { 
        
            if($file == "." || $file == ".." || $file == "index.php" || $file == "music") 
        
                continue; 
                //echo "<a href=\"#\" onClick=\"openFileContents($i)\">$file</a><br>"; 
                $name = "/var/www/xos/files/uploads/$session->username/$file";
                $ext = substr($file, -4, 4);
                if($ext == ".txt") {
                    $fh = fopen($name, 'r');
                    $data = fread($fh, filesize($name));
                    fclose($fh);
                    $data = htmlentities($data);
                    //$dataCon = addslashes($data);
                    echo("<input id=\"openFileContent" . $i . "\" type=\"hidden\" value=\"" . $data . "\">");
                    echo("<input id=\"openFileTitle" . $i . "\" type=\"hidden\" value=\"" . $file . "\">");
                    echo("<a href=\"#\" onClick=\"hideDiv('openDialog'); openFileContents('$i');\">$file</a><br>");
                }
                $i++;
                
            } 
        
            // Close 
            closedir($dir_handle); 
        
        ?>
    </span>
  </p>
  <div id="cancelOpen" style="position: absolute; right: 5px; bottom: 5px;"><button onClick="hideDiv('openDialog')">Cancel</button></div>
  </div>
</div>

<div id="calc" style="overflow:hidden; width:260px; height:330px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'calc')">
<a onClick="hideDiv('calc'); hideDiv('ri06')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="hideDiv('calc')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Calculator</div>
	  <div class="content">
    <form name="Calc">
          <table border="0">
            <tbody><tr> 
              <td> 
                <div align="center"> 
                  <input type="text" size="30" style="font-size: +1;" name="Input">
                </div>
              </td>

            </tr>
            <tr> 
              <td height="111"> 
                <div align="center"> 
                  <input type="button" onclick="Calc.Input.value += '1'" value="  1  " name="one">
                  <input type="button" onclick="Calc.Input.value += '2'" value="  2  " name="two">
				  <input type="button" onclick="Calc.Input.value += '3'" value="  3  " name="three">
				  <input type="button" onclick="Calc.Input.value += ' + '" value="  +  " name="plus">
                  <p>
                  <input type="button" onclick="Calc.Input.value += '4'" value="  4  " name="four">
                  <input type="button" onclick="Calc.Input.value += '5'" value="  5  " name="five">
                  <input type="button" onclick="Calc.Input.value += '6'" value="  6  " name="six">
                  <input type="button" onclick="Calc.Input.value += ' - '" value="   -  " name="minus">
                  <p>
                  <input type="button" onclick="Calc.Input.value += '7'" value="  7  " name="seven">
                  <input type="button" onclick="Calc.Input.value += '8'" value="  8  " name="eight">
                  <input type="button" onclick="Calc.Input.value += '9'" value="  9  " name="nine">
                  <input type="button" onclick="Calc.Input.value += ' * '" value="  x  " name="times">
                  <p>
                  <input type="button" onclick="Calc.Input.value = ''" value="  Clear " name="clear">
                  <input type="button" onclick="Calc.Input.value += '0'" value="  0  " name="zero">
                  <input type="button" onclick="Calc.Input.value += ' / '" value="   /  " name="div">
                </p></div>
              </td>
            </tr>
            <tr> 
              <td> 
                <div align="center"> 
                  <input type="button" onclick="Calc.Input.value = eval(Calc.Input.value)" value="             =            " name="DoIt">

                </div>
              </td>
            </tr>
          </tbody></table>
          
          <div align="right"><br>
		</div>
          <p>&nbsp;</p>
        </form>
  </div>
</div>

<div id="stickies" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'stickies')">
<a onClick="hideDiv('stickies'); hideDiv('ri04')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="hideDiv('stickies')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Stickie Manager</div>
	  <div class="content">
    <p>You can have up to 6 stickie notes. Open your stickies below.</p>
    <table style="text-align: left; width: 450px;" border="0" cellpadding="2" cellspacing="2">
		<tbody>
			<tr>
				<td>Stickie #1<br></td>
				<td><a onClick="showDiv('stick01')">OPEN</a><br></td>
				<td><a onClick="hideDiv('stick01')">CLOSE</a><br></td>
			</tr>
			<tr>
				<td>Stickie #2<br></td>
				<td><a onClick="showDiv('stick02')">OPEN</a></td>
                <td><a onClick="hideDiv('stick02')">CLOSE</a></td>
            </tr>
            <tr>
                <td>Stickie #3</td>
            	<td><a onClick="showDiv('stick03')">OPEN</a></td>
            	<td><a onClick="hideDiv('stick03')">CLOSE</a></td>
            </tr>
            <tr>
				<td>Stickie #4</td>
                <td><a onClick="showDiv('stick04')">OPEN</a></td>
                <td><a onClick="hideDiv('stick04')">CLOSE</a></td>
            </tr>
            <tr>
            	<td>Stickie #5</td>
                <td><a onClick="showDiv('stick05')">OPEN</a></td>
                <td><a onClick="hideDiv('stick05')">CLOSE</a></td>
			</tr>
			<tr>
                <td>Stickie #6</td>
                <td><a onClick="showDiv('stick06')">OPEN</a></td>
                <td><a onClick="hideDiv('stick06')">CLOSE</a></td>
            </tr>
       </tbody>
     </table>
     <br>
     <input type="checkbox" id="openStickStatus" checked onChange="changeStickStatus();"><label for="openStickStatus">Open Stickies When xOS Starts</label>
  </div>
</div>

<div id="paint" style="overflow:hidden; width: 863px; height: 673px; background-color: #5e5e5e;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'paint')">
<a onClick="javascript:hideDiv('paint'); hideDiv('ri03')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('paint')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right"  onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a><a onClick="hideDiv('paint')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Pixlr Editor</div>
	  <div class="content">
    <iframe id="pixlr" style="z-index: -9999;" src="CORE/explorer/editor.php" width="100%" height="90%" frameborder="0"></iframe>
  </div>
</div>

<div id="xmusic" style="overflow: hidden; background-color: #FFF;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'xmusic')">
<a onClick="javascript:hideDiv('xmusic'); hideDiv('ri08')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="fullScreen('xmusic')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a><a onClick="hideDiv('xmusic')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> xMusic</div>
	  <div class="content" style="height: 89%; overflow: hidden; padding: 0px;">
      <div id="musframe" style="position: relative; top: 0px;">
      <iframe src="/xmusic/index.php" width="100%" height="100%" frameborder="0"></iframe>
      </div>
  	  </div>
</div>

<div id="gameportal" style="overflow:auto; background-color:#6633FF" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'gameportal')">
<a onClick="hideDiv('gameportal')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="fullScreen('gameportal')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right"  onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a><a onClick="hideDiv('gameportal')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Game Portal</div>
	  <div class="content">
    <p>The content of Game Portal will soon arrive.</p>
  </div>
</div>

<div id="donfeed" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'donfeed')">
<a onClick="hideDiv('donfeed')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Contribute to xOS</div>
	  <div class="content">
      <iframe id="contributefrm" width="100%" height="82%" frameborder="0"></iframe>
      </div>
</div>

<div id="runtime" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'runtime')">
<a onClick="hideDiv('runtime')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="hideDiv('runtime')" title="Minimize"><img src="CORE/Min.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/MinBack.png'"
onmouseout="this.src='CORE/Min.png'"></a> Developer Runtime - Current Log</div>
	  <div class="content">
      This is were all the magic happens. Each Frame is label runcmd1, 2, 3, or 4. Please provide the number when reporting errors.
      <iframe id="runcmd" width="100%" height="36px;"></iframe><br>
      <iframe id="runcmd2" width="100%" height="36px;"></iframe><br>
      <iframe id="runcmd3" width="100%" height="36px;"></iframe><br>
      <iframe id="runtextEdit" width="100%" height="36px;"></iframe><br>
      </div>
</div>


































<!--Window-->

<!--Stickie Notes-->
<!--1-->
<div id="stick01" class="stickie" style="position: absolute; top: 127px; left: 75px;"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick01')"><a href="#" onClick="hideDiv('stick01')"><img src="CORE/stickClose.png" onmouseover="this.src='CORE/stickCloseBack.png'" onmouseout="this.src='CORE/stickClose.png'" width="16" height="16" style="position: relative; top: 4px; left: 4px;"></a></div>
<section id="scont01" style="margin: 10px 10px 10px 10px;" contenteditable="true" onKeyUp="saveNote('stick01', 'scont01')">
<p>Editt</p>
</section>
</div>

<div id="stick02" class="stickie" style="position: absolute; top: 127px; left: 75px;"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick02')"><a href="#" onClick="hideDiv('stick02')"><img src="CORE/stickClose.png" onmouseover="this.src='CORE/stickCloseBack.png'" onmouseout="this.src='CORE/stickClose.png'" width="16" height="16" style="position: relative; top: 4px; left: 4px;"></a></div>
<section id="scont02" style="margin: 10px 10px 10px 10px;" contenteditable="true" onKeyUp="saveNote('stick02', 'scont02')">
<p>Editt</p>
</section>
</div>

<div id="stick03" class="stickie" style="position: absolute; top: 127px; left: 75px;"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick03')"><a href="#" onClick="hideDiv('stick03')"><img src="CORE/stickClose.png" onmouseover="this.src='CORE/stickCloseBack.png'" onmouseout="this.src='CORE/stickClose.png'" width="16" height="16" style="position: relative; top: 4px; left: 4px;"></a></div>
<section id="scont03" style="margin: 10px 10px 10px 10px;" contenteditable="true" onKeyUp="saveNote('stick03', 'scont03')">
<p>Editt</p>
</section>
</div>

<div id="stick04" class="stickie" style="position: absolute; top: 127px; left: 75px;"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick04')"><a href="#" onClick="hideDiv('stick04')"><img src="CORE/stickClose.png" onmouseover="this.src='CORE/stickCloseBack.png'" onmouseout="this.src='CORE/stickClose.png'" width="16" height="16" style="position: relative; top: 4px; left: 4px;"></a></div>
<section id="scont04" style="margin: 10px 10px 10px 10px;" contenteditable="true" onKeyUp="saveNote('stick04', 'scont04')">
<p>Editt</p>
</section>
</div>

<div id="stick05" class="stickie" style="position: absolute; top: 127px; left: 75px;"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick05')"><a href="#" onClick="hideDiv('stick05')"><img src="CORE/stickClose.png" onmouseover="this.src='CORE/stickCloseBack.png'" onmouseout="this.src='CORE/stickClose.png'" width="16" height="16" style="position: relative; top: 4px; left: 4px;"></a></div>
<section id="scont05" style="margin: 10px 10px 10px 10px;" contenteditable="true" onKeyUp="saveNote('stick05', 'scont05')">
<p>Editt</p>
</section>
</div>

<div id="stick06" class="stickie" style="position: absolute; top: 127px; left: 75px;"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick06')"><a href="#" onClick="hideDiv('stick06')"><img src="CORE/stickClose.png" onmouseover="this.src='CORE/stickCloseBack.png'" onmouseout="this.src='CORE/stickClose.png'" width="16" height="16" style="position: relative; top: 4px; left: 4px;"></a></div>
<section id="scont06" style="margin: 10px 10px 10px 10px;" contenteditable="true" onKeyUp="saveNote('stick06', 'scont06')">
<p>Editt</p>
</section>
</div>

<!--Stickie Note Note Storage-->

<script type="text/javascript">
function saveNote(stickie, scontNum) {
	var stickieName = stickie;
	var stickieContent = document.getElementById(scontNum).innerHTML;
	
	if(typeof(localStorage) == "undefined" ) {
		return;
	} 
	else {
		try {
			localStorage.setItem(stickieName, stickieContent); //saves to the database, "key", "value"
		} catch (e) {
			if (e == QUOTA_EXCEEDED_ERR) {
				alert('Quota exceeded!'); //data wasn’t successfully saved due to quota exceed so throw an error
			}
		}
	}
}

function changeStickStatus() {
	var setting = document.getElementById('openStickStatus');
	if(setting.checked == true) {
		openStatus('t');
	}
	else {
		openStatus('f');
	}
}

function openStatus(status) {
	if(typeof(localStorage) == "undefined" ) {
		return;
	} 
	else {
		try {
			localStorage.setItem("stickiesOpen", status); //saves to the database, "key", "value"
		} catch (e) {
			if (e == QUOTA_EXCEEDED_ERR) {
				alert('Quota exceeded!'); //data wasn’t successfully saved due to quota exceed so throw an error
			}
		}
	}
}

function openNotes() {
	
		var stickieStatus;
		var stickiesOpen = localStorage.getItem('stickiesOpen');
		if(stickiesOpen != null) {
			if(stickiesOpen == "t") {
			//Stickie 1
				stickieContent = localStorage.getItem('stick01');
				if(stickieContent != null)
				{
					document.getElementById('scont01').innerHTML = stickieContent;
					showDiv('stick01');
				}
				else {
					document.getElementById('scont01').innerHTML = "<p>Edit</p>";
				}
			//Stickie 2	
				stickieContent = localStorage.getItem('stick02');
				if(stickieContent != null)
				{
					document.getElementById('scont02').innerHTML = stickieContent;
					showDiv('stick02');
				}
				else {
					document.getElementById('scont02').innerHTML = "<p>Edit</p>";
				}
			//Stickie 3	
				stickieContent = localStorage.getItem('stick03');
				if(stickieContent != null)
				{
					document.getElementById('scont03').innerHTML = stickieContent;
					showDiv('stick03');
				}
				else {
					document.getElementById('scont03').innerHTML = "<p>Edit</p>";
				}
			//Stickie 4	
				stickieContent = localStorage.getItem('stick04');
				if(stickieContent != null)
				{
					document.getElementById('scont04').innerHTML = stickieContent;
					showDiv('stick04');
				}
				else {
					document.getElementById('scont04').innerHTML = "<p>Edit</p>";
				}
			//Stickie 5	
				stickieContent = localStorage.getItem('stick05');
				if(stickieContent != null)
				{
					document.getElementById('scont05').innerHTML = stickieContent;
					showDiv('stick05');
				}
				else {
					document.getElementById('scont05').innerHTML = "<p>Edit</p>";
				}
			//Stickie 6	
				stickieContent = localStorage.getItem('stick06');
				if(stickieContent != null)
				{
					document.getElementById('scont06').innerHTML = stickieContent;
					showDiv('stick06');
				}
				else {
					document.getElementById('scont06').innerHTML = "<p>Edit</p>";
				}
			}
			if(stickiesOpen == "f") {
				//Stickie 1
				stickieContent = localStorage.getItem('stick01');
				if(stickieContent != null)
				{
					document.getElementById('scont01').innerHTML = stickieContent;
				}
				else {
					document.getElementById('scont01').innerHTML = "<p>Edit</p>";
				}
			//Stickie 2	
				stickieContent = localStorage.getItem('stick02');
				if(stickieContent != null)
				{
					document.getElementById('scont02').innerHTML = stickieContent;
				}
				else {
					document.getElementById('scont02').innerHTML = "<p>Edit</p>";
				}
			//Stickie 3	
				stickieContent = localStorage.getItem('stick03');
				if(stickieContent != null)
				{
					document.getElementById('scont03').innerHTML = stickieContent;
				}
				else {
					document.getElementById('scont03').innerHTML = "<p>Edit</p>";
				}
			//Stickie 4	
				stickieContent = localStorage.getItem('stick04');
				if(stickieContent != null)
				{
					document.getElementById('scont04').innerHTML = stickieContent;
				}
				else {
					document.getElementById('scont04').innerHTML = "<p>Edit</p>";
				}
			//Stickie 5	
				stickieContent = localStorage.getItem('stick05');
				if(stickieContent != null)
				{
					document.getElementById('scont05').innerHTML = stickieContent;
				}
				else {
					document.getElementById('scont05').innerHTML = "<p>Edit</p>";
				}
			//Stickie 6	
				stickieContent = localStorage.getItem('stick06');
				if(stickieContent != null)
				{
					document.getElementById('scont06').innerHTML = stickieContent;
				}
				else {
					document.getElementById('scont06').innerHTML = "<p>Edit</p>";
				}
				document.getElementById('openStickStatus').checked = false;
			}
		}
		else {
			openStatus('t')
		}
}
</script>

<!--End Session Windows-->

<!--CONTEXT MENU SUPPORT-->

<div id="contextDismiss" style="width: 100%; height: 100%; position: absolute; top: 0px; left: 0px; visibility: hidden; z-index: 9998;" onClick="dismissMenu()" onContextMenu="reContext(); return false;"></div>

<!--CONTEXT MENU SUPPORT-->

<!--Shut Down-->
<div id="shutdown" style="top: 50%; left: 50%; margin-top: -200px; margin-left: -190px; overflow:auto; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar"> Shut Down</div>
	  <div class="content">
    <p>Are you sure you want to Shut Down xOS Webtop?</p>
    <p align="center">
    <a onClick="hideDiv('shutdown')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
    <a href="boot/ShutDown.html"><img src="CORE/buttons/boot/shutdown.jpg" onMouseOver="this.src='CORE/buttons/boot/shutdownunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/shutdown.jpg'"></a>
  </p>
  </div>
</div>

<!--Restart-->
<div id="restart" style="top: 50%; left: 50%; margin-top: -200px; margin-left: -190px; overflow:auto; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar"> Restart</div>
	  <div class="content">
    <p>Are you sure you want to Restart xOS Webtop?</p>
  <p align="center">
    <a onClick="hideDiv('restart')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
    <a href="boot/Restart.html"><img src="CORE/buttons/boot/restart.jpg" onMouseOver="this.src='CORE/buttons/boot/restartunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/restart.jpg'"></a>
  </p>
  </div>
</div>

<!--Logoff-->
<div id="logoff" style="top: 50%; left: 50%; margin-top: -200px; margin-left: -190px; overflow:auto; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar"> Log Out</div>
	  <div class="content">
    <p>Are you sure you want to Log Out xOS Webtop?</p>
  <p align="center">
    <a onClick="hideDiv('logoff')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
    <a href="xoslogin/process.php"><img src="CORE/buttons/boot/logout.jpg" onMouseOver="this.src='CORE/buttons/boot/logoutunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/logout.jpg'"></a>
  </p>
  </div>
</div>

<!--End Session Windows-->

<!--Notifications-->

<div id="upgrade" style="position: absolute; top: 40px; right: 10px; width: 260px; height: 60px; background-color: #EEE; border-radius: 8px; padding: 10px 10px 10px 10px; visibility: hidden;">UPGRADE</div>


<!--Bottom Right Corner Quick Menu-->

<!--Access Start-->
	<div id="accessStart" style="position: absolute; bottom: 0px; right: 0px; height: 5px; width: 5px; z-index: 999997;" onMouseOver="showDiv('accessmain'); showDiv('accessbackdrop');">A</div>

	<!--Access Backdrop to Keep Alive-->
    <div id="accessbackdrop" style="position: absolute; bottom: 0px; right: 0px; height: 500px; width: 210px; z-index: 999997; visibility: hidden;" onMouseOut="hideDiv('accessmain'); hideDiv('accessbackdrop');">
	<!--Main Access Menu-->
	<div id="accessmain" style="position: absolute; bottom: 5px; right: 5px; width: 200px; padding: 16px; z-index: 999997; visibility: hidden; background-color: #999; border-radius: 7px;" onMouseOver="showDiv('accessmain'); showDiv('accessbackdrop');">
    	<span id="exitfull"><a class="accessMenuDisabled" href="#" onMouseOver="hideDiv('accessmusic'); hideDiv('accessnoti'); hideDiv('accessoptions')"><img src="CORE/images/desktop/fullappdisabled.png" width="42" height="42"></a></span>
        <span id="noti"><a class="accessMenuDisabled" href="#" onMouseOver="showDiv('accessnoti'); hideDiv('accessmusic'); hideDiv('accessoptions')"><img src="CORE/images/desktop/notificationsoff.png" width="42" height="42"></a></span>
        <span id="xmusicstatus"><a href="#" onMouseOver="showDiv('accessmusic'); hideDiv('accessnoti'); hideDiv('accessoptions')"><img src="CORE/images/start-bar/music.png" width="42" height="42"></a></span>
        <span id="smallmenuaccess"><img src="CORE/images/desktop/asmallmenu.png" width="42" height="42" onMouseOver="showDiv('accessoptions'); hideDiv('accessnoti'); hideDiv('accessmusic')"></span>
    </div>
    <div id="accessmusic" style="position: absolute; bottom: 89px; right: 5px; width: 200px; padding: 16px; z-index: 999997; visibility: hidden; background-color: #999; border-radius: 7px;" onMouseOver="showDiv('accessmusic'); showDiv('accessmain'); showDiv('accessbackdrop');" onMouseOut="hideDiv('accessmusic');">SONG<br>ARTIST<br>PLAY PREVIOUS NEXT</div>
	</div>
    <div id="accessnoti" style="position: absolute; bottom: 89px; right: 5px; width: 232px; padding-top: 16px; padding-bottom: 16px; color: #EEE; z-index: 999997; visibility: hidden; background-color: #999; border-radius: 7px;" onMouseOver="showDiv('accessnoti'); showDiv('accessmain'); showDiv('accessbackdrop');" onMouseOut="hideDiv('accessnoti');">
    <span id="notis">
    <div style="border-bottom: #333 solid thin; border-top: #333 solid thin;"><table width="232px" border="0"><tr><td width="24px">&nbsp;<img src="CORE/images/desktop/notdone.png" width="14" height="14"></td><td><strong>xOS Noti Test</strong><br>This is just a test of the notification system. Pretty Huh?</td></tr></table></div>
    <div style="border-bottom: #333 solid thin;"><table width="232px" border="0"><tr><td width="24px">&nbsp;<img src="CORE/images/desktop/notdone.png" width="14" height="14"></td><td><strong>xOS Noti Test 2</strong><br>This is just a test of the notification system. Pretty Huh?</td></tr></table></div>
    </span></div>
    <div id="accessoptions" style="position: absolute; bottom: 89px; right: 5px; width: 200px; padding: 16px; z-index: 999997; visibility: hidden; background-color: #999; border-radius: 7px;" onMouseOver="showDiv('accessoptions'); showDiv('accessmain'); showDiv('accessbackdrop');" onMouseOut="hideDiv('accessoptions')">The main menu options will be right here when you need them, such as restart, shut down, log out.
    </div>
    
    
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>

</body>
</html>
<?
}
?>