<?
include("xoslogin/include/session.php");

if(!$session->logged_in){
	header("Location: https://xos.xproduct.net/desktop/xoslogin/main.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>xOS 3.1</title>
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
	   //alert("Your browser may have some compatiblity issues. We just want to warn you. You may think it is fine.");
	}
    else if (DetectIE())
	{
	   //alert("Your browser may have some compatiblity issues. We just want to warn you. You may think it is fine.");
	   
	}
</script>
<!--Scripts-->
<script src="CORE/scripts/windows/dragwindow.js" type="text/javascript"> </script>
<script src="CORE/scripts/windows/genresize.js" type="text/javascript"> </script>
<script src="CORE/scripts/windows/hideshowwindows.js" type="text/javascript"> </script>
<script src="CORE/scripts/windows/ieemu.js" type="text/javascript"> </script>
<script src="CORE/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script> 
<script src="webrowser/jquery.url.min.js" type="text/javascript"></script> 
<script src="webrowser/script.js" type="text/javascript"></script>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>

<!--CSS-->
<link href="CORE/css/windowdiv.css" rel="stylesheet" type="text/css">
<link href="CORE/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<link href="CORE/css/stickies.css" rel="stylesheet" type="text/css">

<!--Internal Scripts-->
<script language="javascript">
if (moz) {
	extendElementModel(window);
	extendEventObject(window);
	emulateEventHandlers(["mousemove", "mousedown", "mouseup"]);
}

</script>
<script type="text/javascript">
function fullScreen(full) {
var div = document.getElementById(full);

	if(div.style.width=="99.8%") {
		div.style.left = '64px';
		div.style.top = '139px';
		div.style.width = '737px';
		div.style.height = '467px';
		div.style.zIndex = '12';
	}
	else {
		div.style.left = '0px';
		div.style.top = '36px';
		div.style.width = '99.8%';
		div.style.height = '100%';
		div.style.zIndex = '9999';
	}
}
</script>
<script language="Javascript">
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
<script language="javascript" type="text/javascript">
	function changeCssClass(objDivID) {           
		if(document.getElementById(objDivID).className=='window') 
		{
			document.getElementById(objDivID).className = 'windowfull';            
		}
		else
		{
		document.getElementById(objDivID).className = 'window'; 
		}
}            
</script>
<script type="text/javascript">
function disClock(v) {
	if(v=='1') {
		showDiv('Tick');
	}
	if(v=='2') {
		showDiv('Clock');
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
	window.onload = function() {
		runEC(); 
		changeBGImage('<? include("CORE/getbackground.php") ?>'); 
		disClock('<?  include("CORE/getclock.php"); ?>');
		setTimeout(fade('startup3'), 4000);	
	}
</script>

<!-- Fullscreen Change -->
	

<!--Internal CSS-->
<style type="text/css">
body {
	margin: 0px 0px 0px 0px;
	background-repeat: no-repeat;
	background-size:cover;
	-moz-background-size:cover;
	-webkit-background-size:cover;
	overflow:hidden;
}
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
</style>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28358901-1']);
  _gaq.push(['_setDomainName', 'xproduct.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<!--CORE VERSION -_-1.3.4-_- CORE VERSION-->
<body>

<!--FIRST LOAD-->
<div id="startup3" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; background-image:url(freshback.png); background-size:cover; z-index: 9999;">
<div id="holder" style="position: absolute; left: 50%; top: 50%; background-image:url(CORE/tranparbox.png); background-size: cover; border: 4px; border-color: #333; border-radius: 10px; width: 280px; height: 370px; padding: 12px; margin-top: -185px; margin-left: -140px;">
<strong><font color="#FFFFFF"><p align="center">Welcome to xOS Webtop <? echo $session->username ?>.</p>
<p>&nbsp;</p>
<p align="center"><img src="CORE/loader.svg" width="16" height="16">&nbsp;Now Loading Your Settings.</p>
</font></strong></div> 
</div>


<!--Backgrounds including Live Backgrounds-->

<div id="spinning" style="z-index: -100; visibility: hidden;">
<img id="spinning" src="CORE/livebackgrounds/milkywaytop.jpg" style="position: absolute; top: 50%; left: 50%; margin-left: -1000px; margin-top: -1000px; width: 2000px; height: 2000px; z-index: -100;">
</div>

<!--Background Change-->
<script language="JavaScript">

var backImage = new Array();

backImage[0] = "freshback.png";
backImage[1] = "greyback.jpg";
backImage[2] = "bluemoon.jpg";
backImage[3] = "startunnel.jpg";
backImage[4] = "waterfall.jpg";
backImage[5] = "";

// Do not edit below this line.
//-----------------------------

function changeBGImage(whichImage){
if (document.body){
document.body.background = backImage[whichImage];
}
}
</script>
<!--Background Change-->


<!--Menubar-->


<div id="top" style="height:36px; background-color:#999; -webkit-user-select:none;" class="none">
<div id="menubar">
  <ul id="MenuBar1" class="MenuBarHorizontal">
    <li><a class="MenuBarItemSubmenu"><img src="CORE/images/desktop/startx.png" width="12" height="12"><b>OS</b></a>
      <ul>
        <li><a onClick="showDiv('about')"><img src="CORE/images/small/info.png" width="16" height="16">&nbsp;About</a></li>
        <li><a onClick="showDiv('softwareinfo')"><img src="CORE/images/small/softinfo.png" width="16" height="16">&nbsp;Software</a></li>
        <li><a> </a></li>
        <li><a onClick="showDiv('shutdown')">Shut Down</a></li>
        <li><a onClick="showDiv('restart')">Restart</a></li>
        <li><a onClick="showDiv('logoff')">Log Out</a></li>
      </ul>
    </li>
<li><a class="MenuBarItemSubmenu">Run</a>
  <ul>
    <li><a onClick="showDiv('cmd')"><img src="CORE/images/small/terminal.png" width="16" height="16">&nbsp;Command</a></li>
    <li><a onClick="showDiv('launchpad')"><img src="CORE/images/small/up.png"  width="16" height="16">&nbsp;LaunchPad</a></li>
    <li><a onClick="showDiv('explorer')"><img src="CORE/images/small/explorer.png"  width="16" height="16">&nbsp;xOS Explorer</a></li>
  </ul>
</li>
  </ul>
</div>

<div id="ActionBar" align="right" style="position:absolute; right:123px; top: 9px; width: 158px; height: 24px; -webkit-user-select:none;">
</div>

<div id="userdis" class="name" style="position: absolute; top: 7px; right: 90px; height: 28px; -webkit-user-select:none; cursor: pointer;" onMouseOver="toggleDiv('div2',1)" onMouseOut="toggleDiv('div2',0)">
<? echo $session->username ?>
</div>

<div id="Clock" style="position:absolute; right:55px; top: 6px; height: 30px; width: 30px; -webkit-user-select:none; visibility: hidden;" onMouseOver="toggleDiv('div1',1)" onMouseOut="toggleDiv('div1',0)" class="none">
<form name="Tick">
<a onClick="showDiv('calendar')" class="chili"><input name="Clock" type="text" size="8" readonly style="background-color:#999; border-width:0; cursor: pointer;" class="chili"></a>
</form>
</div>
<div id="Tick" style="position:absolute; right:55px; top: 6px; height: 30px; width: 30px; -webkit-user-select:none; visibility:hidden;" onMouseOver="toggleDiv('div1',1)" onMouseOut="toggleDiv('div1',0)" class="none">
<form name="Clock">
<a onClick="showDiv('calendar')" class="chili"><input name="Tick" type="text" size="8" readonly style="background-color:#999; border-width:0; cursor: pointer;" class="chili"></a>
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

<div id="desktop" style="-webkit-user-select:none;">

<br>
<a href="CORE/explorer/computer.html" target="explorer" onClick="showDiv('explorer')"><img src="CORE/images/desktop/Computer.png" height="80px" width="80px" alt="COMPUTER"></a><p>
<a href="CORE/explorer/documents.php" target="explorer" onClick="showDiv('explorer')"><img src="CORE/images/desktop/Documents.png"
height="80px" width="80px" alt="DOCUMENTS"></a><p>
<a href="CORE/explorer/network.html" target="explorer" onClick="showDiv('explorer')"><img src="CORE/images/desktop/Satellite-128.png" height="80px" width="80px" alt="NETWORK"></a><br>




</div>

<!--Start Bar-->
<div id="dock" align="center" style="position: absolute; bottom: -24px; width: 100%; z-index: -12; -webkit-user-select:none;" class="dock">
<img src="CORE/dock.png" width="710" height="30" style="z-index: -12; border-radius: 5px;">

</div>
<div align="center" style="position:absolute; bottom:0px; width:100%; z-index: 12; -webkit-user-select:none;" id="startbar" class="startbar">
  <a onClick="showDiv('calendar'); front('calendar')" style="cursor: pointer;"><img src="CORE/images/start-bar/date.png" width="64" height="64" onMouseOver="showDiv('nd01')" onMouseOut="hideDiv('nd01')"></a>&nbsp;
  <a onClick="showDiv('writer'); front('writer')" style="cursor: pointer;"><img src="CORE/images/start-bar/textedit.png" width="64" height="64" onMouseOver="showDiv('nd02')" onMouseOut="hideDiv('nd02')"></a>&nbsp;
  <a onClick="showDiv('paint'); front('paint')" style="cursor: pointer;"><img src="CORE/images/start-bar/paint.png" width="64" height="64" onMouseOver="showDiv('nd03')" onMouseOut="hideDiv('nd03')"></a>&nbsp;
  <a onClick="showDiv('stickies'); front('stickies')" style="cursor: pointer;"><img src="CORE/images/start-bar/stickies.png" width="64" height="64" onMouseOver="showDiv('nd04')" onMouseOut="hideDiv('nd04')"></a>&nbsp;
  <a onClick="showDiv('calc'); front('calc')" style="cursor: pointer;"><img src="CORE/images/start-bar/calculator.png" width="64" height="64" onMouseOver="showDiv('nd05')" onMouseOut="hideDiv('nd05')"></a>&nbsp;
  <a onClick="showDiv('email'); front('email')" style="cursor: pointer;"><img src="CORE/images/start-bar/email.png" width="64" height="64" onMouseOver="showDiv('nd06')" onMouseOut="hideDiv('nd06')"></a>&nbsp;
  <a onClick="showDiv('xplayer'); front('xplayer')" style="cursor: pointer;"><img src="CORE/images/start-bar/music.png" width="64" height="64" onMouseOver="showDiv('nd07')" onMouseOut="hideDiv('nd07')"></a>&nbsp;
  <a href="http://search.yahoo.com" target="frame" onClick="showDiv('webrowser'); front('webrowser')" style="cursor: pointer;"><img src="CORE/images/start-bar/webbrowser.png" width="64" height="64" onMouseOver="showDiv('nd08')" onMouseOut="hideDiv('nd08')"></a>&nbsp;
  <a onClick="showDiv('settings'); front('settings')" style="cursor: pointer;"><img src="CORE/start-bar/settings.png" width="64" height="64" onMouseOver="showDiv('nd09')" onMouseOut="hideDiv('nd09')"></a>&nbsp;
  <a href="CORE/explorer/desktop.html" target="explorer" onClick="showDiv('explorer'); front('explorer')" style="cursor: pointer;"><img src="CORE/start-bar/explorer.png" width="64" height="64" onMouseOver="showDiv('nd10')" onMouseOut="hideDiv('nd10')"></a>&nbsp;
  
 </div><font color="#CCCCCC">
 <div style="position:absolute; bottom:0px; margin-left: -360px; left: 50%; width:100%; z-index: 12;">
 <div style="position: absolute; bottom: 79px; left: 0px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd01">Calendar</div>
 <div style="position: absolute; bottom: 79px; left: 71px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd02">TextEdit</div>
 <div style="position: absolute; bottom: 79px; left: 142px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd03">Paint</div>
 <div style="position: absolute; bottom: 79px; left: 213px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd04">Stickies</div>
 <div style="position: absolute; bottom: 79px; left: 284px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd05">Calculator</div>
 <div style="position: absolute; bottom: 79px; left: 355px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd06">Email</div>
 <div style="position: absolute; bottom: 79px; left: 428px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd07">Music</div>
 <div style="position: absolute; bottom: 79px; left: 497px; width: 72px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd08">weBrowser</div>
 <div style="position: absolute; bottom: 79px; left: 572px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd09">Settings</div>
 <div style="position: absolute; bottom: 79px; left: 644px; width: 64px; background-color: #565656; padding: 4px; border: solid 1.5px #FFFFFF; border-radius: 18px; visibility: hidden;" align="center" id="nd10">Explorer</div>
 </div></font>
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
<a href="javascript:hideDiv('[windowname]')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
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

<div id="about" style="overflow: auto;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'about')">
About xOS 3 <a href="javascript:hideDiv('about')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></div>
	  <div class="content">
    <p>Check out the newest features below.</p>
    <p><strong><u>Better, Faster, <i>Cleaner</i></u></strong></p>
    <p>We have cleaned up some stuff to make your expirence more error-free and look better. Not an overhaul but it is a start of something great. We have also removed some applications such as Spark and Defender. Why? Nobody ever uses them. Spark had no users and Defender was somewhat useless to you because we don't get viruses so neither do you.</p>
    <p><b><u>Fullscreen Apps</u></b></p>
    <p>&nbsp;&nbsp;&nbsp;xOS Webtop is best viewed in fullscreen and so should you apps. Open up Pain and look at the blue button by the close button and click it. It will introduce itself.</p>
   	<p>We hope you enjoy some of the new things in xOS Webtop 3.1.2 and hope you keep on loving it.</p>
    <p>Thanks,</p>
    <p>~The XProduct Team~</p>
  </div>
</div>

<div id="softwareinfo" style="overflow:auto; width: 400px; height: 680px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'softwareinfo')">
<a href="javascript:hideDiv('softwareinfo')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> About Software</div>
	  <div class="content">
    <img align="middle" src="CORE/logo.png">
    <p align="center">Software Version: 3.1.4</p>
    <p align="center">CORE Version: 1.90.77</p>
    <p>&nbsp;</p>
    <hr>
    <p align="center">Processor Speed: Doesn't Matter</p>
    <p align="center">Amount of RAM: Also Doesn't Matter</p>
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
<a href="javascript:hideDiv('cmd')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Command</div>
	  <div class="content">
    <form action="javaScript:gotoURL()" method="get" name="url2go">
	  <label for="textarea"></label>
	  <textarea name="go" id="textarea" cols="85" rows="22" onclick="this.value='';" style="background-color:#000; border:#000000; color: #FFF;">Enter Your Commands Here - XProduct 2011</textarea>
	  <input value="Execute" type="submit">
	</form> 
</div>
</div>

<div id="explorer" style="overflow:auto" class="window">
	<div class="menubar" 
    	onmousedown="dragStart(event, 'explorer')">
<a href="javascript:hideDiv('explorer')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> xOS Explorer</div>
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

<div id="manlogin" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'manlogin')">
<a href="javascript:hideDiv('manlogin')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Manage Your Account</div>
	  <div class="content">
    <iframe id="mlogn" width="100%" height="85%" frameborder="0">Please Upgrade to Google Chrome or Apple Safari</iframe>
    </div>
</div>

<div id="settings" style="overflow:auto; height:487px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'settings')">
<a href="javascript:hideDiv('settings')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Settings</div>
	  <div class="content">
<div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">Background</li>
        <li class="TabbedPanelsTab" tabindex="0">Network</li>
        <li class="TabbedPanelsTab" tabindex="0">Display</li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        	<p><strong>Change Display Settings</strong></p>
            <strong>Background</strong>
            <br>Choose a background that best suits you.
            <div style="height: 288px; overflow: auto;">
            <table width="100%" border="0" cellspacing="6">
  <tr>
    <td><a href="CORE/backgrounds/updateback0.php" target="runcmd" onClick="changeBGImage(0); hideDiv('spinning')"><img src="freshback.png" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback1.php" target="runcmd" onClick="changeBGImage(1); hideDiv('spinning')"><img src="greyback.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback2.php" target="runcmd" onClick="changeBGImage(2); hideDiv('spinning')"><img src="bluemoon.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback3.php" target="runcmd" onClick="changeBGImage(3); hideDiv('spinning')"><img src="startunnel.jpg" width="160" height="128"></a></td>
  </tr>
  <tr>
    <td><a href="CORE/backgrounds/updateback4.php" target="runcmd" onClick="changeBGImage(4); hideDiv('spinning')"><img src="waterfall.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback5.php" target="runcmd" onClick="changeBGImage(5); hideDiv('spinning')"><img src="blank.png" width="160" height="128"></a></td>
    <td><a href="javascript:showDiv('spinning')"><img src="CORE/livebackgrounds/milkywaytop.jpg" width="160" height="128"></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="CORE/backgrounds/updateback4.php" target="runcmd" onClick="changeBGImage(4); hideDiv('spinning')"><img src="waterfall.jpg" width="160" height="128"></a></td>
    <td><a href="CORE/backgrounds/updateback5.php" target="runcmd" onClick="changeBGImage(5); hideDiv('spinning')"><img src="blank.png" width="160" height="128"></a></td>
    <td><a href="javascript:showDiv('spinning')"><img src="CORE/livebackgrounds/milkywaytop.jpg" width="160" height="128"></a></td>
    <td>&nbsp;</td>
  </tr>
</table>           
</div>
</div>

<div class="TabbedPanelsContent">
        <p>Your Network information.</p>
        <p><script language="JavaScript">
			VIH_FontPix = "16";
			VIH_DisplayFormat = "You are visiting from:<br>IP Address: %%IP%%<br>Host: %%HOST%%";
			VIH_DisplayOnPage = "yes";
		   </script>
		<script language="JavaScript" src="https://scripts.hashemian.com/js/visitorIPHOST.js.php"></script>
</div>
<div class="TabbedPanelsContent"><br>
		<p><b><u>Fullscreen</u></b></p>
		<p>The best way to veiw xOS is in fullscreen. Press F11 on your keyboard to enter fullscreen mode. If you want to leave fullscreen mode simply press F11 again.</p>
        <p>We hope you enjoy xOS in fullscreen.</p>
        <p><b><u>Clock</u></b></p>
        <p>Which do you prefer?</p>
        <p>&nbsp;&nbsp;<a href="CORE/backgrounds/updateclock1.php" target="runcmd2" onClick="showDiv('noseck'); hideDiv('hideDiv('seck')">3:30 PM</a>&nbsp;&nbsp;or&nbsp;&nbsp;<a href="CORE/backgrounds/updateclock2.php" target="runcmd2" onClick="showDiv('seck'); hideDiv('hideDiv('noseck')">3:30:21 PM</a>&nbsp;&nbsp;
</div>
    </div>
</div>
</div>
</div>

<div id="guard" style="overflow:auto; background-color:#555" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'guard')">
<a href="javascript:hideDiv('guard')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> GuardDog</div>
	  <div class="content">
    <p>xOS <strong>IS</strong> and <strong>ALWAYS</strong> has been.</p>
  </div>
</div>

<div id="launchpad" style="overflow:auto; background-color:#C00; width: 750px;" class="window">
	<div class="menubar" style="background-color:#FFF;"
    	onmousedown="dragStart(event, 'launchpad')">
<a href="javascript:hideDiv('launchpad')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> LaunchPad</div>
	  <div class="content">
    <p>
  <a onClick="showDiv('calendar'); front('calendar')" style="cursor: pointer;"><img src="CORE/images/start-bar/date.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('writer'); front('writer')" style="cursor: pointer;"><img src="CORE/images/start-bar/textedit.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('paint'); front('paint')" style="cursor: pointer;"><img src="CORE/images/start-bar/paint.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('stickies'); front('stickies')" style="cursor: pointer;"><img src="CORE/images/start-bar/stickies.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('calc'); front('calc')" style="cursor: pointer;""><img src="CORE/images/start-bar/calculator.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('email'); front('email')" style="cursor: pointer;"><img src="CORE/images/start-bar/email.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('gameportal'); front('gameportal')" style="cursor: pointer;"><img src="CORE/images/start-bar/gpicon.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('xplayer'); front('xplayer')" style="cursor: pointer;"><img src="CORE/images/start-bar/music.png" width="64" height="64"></a>&nbsp;
  <a href="http://search.yahoo.com" target="frame" onClick="showDiv('webrowser'); front('webrowser')"><img src="CORE/images/start-bar/webbrowser.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('settings'); front('settings')" style="cursor: pointer;"><img src="CORE/start-bar/settings.png" width="64" height="64"></a>&nbsp;
  <a href="CORE/explorer/desktop.html" target="explorer" onClick="showDiv('explorer'); front('explorer')"><img src="CORE/start-bar/explorer.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('iheart'); front('iheart')" style="cursor: pointer;"><img src="CORE/images/start-bar/iheart.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('canrid'); front('canrid')" style="cursor: pointer;"><img src="CORE/images/start-bar/canrid.png" width="64" height="64"></a>&nbsp;
  <a onClick="showDiv('gshark'); front('gshark')" style="cursor: pointer;"><img src="CORE/images/start-bar/gshark.png" width="64" height="64"></a>&nbsp;
  </p>
  </div>
</div>


<!--Other Programs-->

<div id="webrowser" style="overflow:auto; width:900px; height: 620px;" class="window">
	<div class="menubar" style="background-color: #5fa8b6;"
    	onmousedown="dragStart(event, 'webrowser')">
<a href="javascript:hideDiv('webrowser')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('webrowser')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a></div>
	  <div class="content">
    <div id="browser">
    <div id="msn" style="position:absolute; left:511px; top:55px; width: 96px;"><a href="https://www.msn.com" target="frame"><img src="webrowser/msnlink.png" width="141" height="40"></a></div>
    <div style="position:absolute; left: 110px; top: 30px;" id="next"><a href="javascript:history.go(1)"><img src="webrowser/next.png" width="64" height="64"></a></div>
  <div style="position:absolute; top: 10px;" id="back"><a href="javascript:history.go(-1)"><img src="webrowser/back.png" width="108" height="108"></a></div>
  <div style="position:absolute; width: 17px; left: 680px; top: 30px;" id="reload"><img src="webrowser/reload.png" width="22" height="22"></div>
  <input id="url" name="url" style="position:absolute; left: 200px; width: 464px; top: 30px;" placeholder="http://" onclick="document.getElementById('url').focus();"></input>
  <input id="google" name="google" style="position:absolute; left: 200px; top: 55px; width: 258px;" placeholder="Yahoo Search" onClick="document.getElementById('google').focus();"></input>
  <iframe frameborder="0" id="frame" name="frame" class="frame" style="position:absolute; left: 11px; top: 110px; width: 97%; height: 80%; overflow:auto; background-color:#FFF;"></iframe>
</div>
  </div>
</div>

<div id="calendar" style="overflow:auto; width:870px; height: 620px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'calendar')">
<a href="javascript:hideDiv('calendar')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('calendar')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a> Calendar</div>
	  <div class="content" style="padding: 0px;">
    <iframe src="CORE/calendar/index.html" width="100%" height="92%" frameborder="0" scrolling="no">Please Upgrade to Google Chrome or Apple Safari</iframe>
  </div>
</div>

<div id="email" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'email')">
<a href="javascript:hideDiv('email')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> E-mail</div>
	  <div class="content">
    <img src="CORE/images/desktop/error.png" width="150" height="125" style="-webkit-user-select: none;"><h1 style="position: absolute; top: 70px; left: 140px;">Sorry,</h1>
    <p style="-webkit-user-select: none;">This feature has been disabled due to user security. We hope to do something useful here soon.
    <p style="-webkit-user-select: none;">Thank you for your understanding,
    <p style="-webkit-user-select: none;">~The XProduct Team~
  </div>
</div>

<div id="writer" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'writer')">
<a href="javascript:hideDiv('writer')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Document Writer</div>
	  <div class="content">
    <textarea cols="115" id="editor1" name="editor1" rows="25"> </textarea>
			<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'editor1',
					{
						extraPlugins : 'docprops'
					});

			//]]>
			</script>
  </div>
</div>

<div id="calc" style="overflow:hidden; width:260px; height:330px" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'calc')">
<a href="javascript:hideDiv('calc')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Calculator</div>
	  <div class="content">
    <form name="Calc">
          <table border="0">
            <tbody><tr> 
              <td> 
                <div align="center"> <font size="+1"> 
                  <input type="text" size="30" name="Input">
                  </font></div>
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
<a href="javascript:hideDiv('stickies')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Stickie Manager</div>
	  <div class="content">
    <p>You can have up to 6 stickie notes. Open your stickies below.</p>
    <table style="text-align: left; width: 450px;" border="0" cellpadding="2" cellspacing="2">
		<tbody>
			<tr>
				<td>Stickie #1<br></td>
				<td><a href="javascript:showDiv('stick01')">OPEN</a><br></td>
				<td><a href="javascript:hideDiv('stick01')">CLOSE</a><br></td>
			</tr>
			<tr>
				<td>Stickie #2<br></td>
				<td><a href="javascript:showDiv('stick02')">OPEN</a></td>
                <td><a href="javascript:hideDiv('stick02')">CLOSE</a></td>
            </tr>
            <tr>
                <td>Stickie #3</td>
            	<td><a href="javascript:showDiv('stick03')">OPEN</a></td>
            	<td><a href="javascript:hideDiv('stick03')">CLOSE</a></td>
            </tr>
            <tr>
				<td>Stickie #4</td>
                <td><a href="javascript:showDiv('stick04')">OPEN</a></td>
                <td><a href="javascript:hideDiv('stick04')">CLOSE</a></td>
            </tr>
            <tr>
            	<td>Stickie #5</td>
                <td><a href="javascript:showDiv('stick05')">OPEN</a></td>
                <td><a href="javascript:hideDiv('stick05')">CLOSE</a></td>
			</tr>
			<tr>
                <td>Stickie #6</td>
                <td><a href="javascript:showDiv('stick06')">OPEN</a></td>
                <td><a href="javascript:hideDiv('stick06')">CLOSE</a></td>
            </tr>
       </tbody>
     </table>
  </div>
</div>

<div id="paint" style="overflow:hidden; width: 863px; height: 673px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'paint')">
<a href="javascript:hideDiv('paint')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('paint')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a> Pixlr Editor</div>
	  <div class="content">
    <iframe id="pixlr" type="text/html" width="100%" height="90%" src="https://pixlr.com/" frameborder="0"></iframe>
  </div>
</div>

<div id="xplayer" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'xplayer')">
<a href="javascript:hideDiv('xplayer')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> XPlayer</div>
	  <div class="content">
    <img src="CORE/images/desktop/error.png" width="150" height="125" style="-webkit-user-select: none;"><h1 style="position: absolute; top: 70px; left: 140px;">Sorry,</h1>
    <p style="-webkit-user-select: none;">This feature has been disabled due to its lack of individual user customization. Somethingthat is different for everyone is music. Please use our iHeartRadio and Grooveshark Apps until we can give you the best expierence possible.
    <p style="-webkit-user-select: none;">Thank you for your understanding,
    <p style="-webkit-user-select: none;">~The XProduct Team~
  </div>
</div>

<div id="gameportal" style="overflow:auto; background-color:#6633FF" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'gameportal')">
<a href="javascript:hideDiv('gameportal')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('gameportal')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a> Game Portal</div>
	  <div class="content">
    <p>The content of Game Portal will soon arrive.</p>
  </div>
</div>

<div id="donfeed" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'donfeed')">
<a href="javascript:hideDiv('donfeed')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Contribute to xOS</div>
	  <div class="content">
      <iframe id="contributefrm" width="100%" height="82%" frameborder="0"></iframe>
      </div>
</div>

<div id="runtime" style="overflow:auto" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'runtime')">
<a href="javascript:hideDiv('runtime')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a> Developer Runtime - Current Log</div>
	  <div class="content">
      This is were all the magic happens. Each Frame is label runcmd1, 2, or 3. Please provide the number when reporting errors.
      <iframe id="runcmd" width="100%" height="36px;">Come on your developing in a browser from the 1900's. Really?</iframe><br>
      <iframe id="runcmd2" width="100%" height="36px;">Come on your developing in a browser from the 1900's. Really?</iframe><br>
      <iframe id="runcm3" width="100%" height="36px;">Come on your developing in a browser from the 1900's. Really?</iframe><br>
      </div>
</div>

<div id="iheart" style="overflow:auto; width: 900px; height: 700px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'iheart')">
<a href="javascript:hideDiv('iheart')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('iheart')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a> iHeartRadio</div>
	  <div class="content">
      <iframe src="http://www.iheart.com" width="100%" height="89%" frameborder="0">Error CODE: NO IFRAME SUPPORT :Please upgrade to a modern browser.</iframe>
      </div>
</div>

<div id="canrid" style="overflow:auto; width: 900px; height: 800px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'canrid')"><a href="javascript:hideDiv('canrid')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a><a onClick="fullScreen('canrid')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a> Canvas Rider</div>
	  <div class="content">
      <iframe src="http://canvasrider.com/" width="100%" height="89%" frameborder="0">Error CODE: NO IFRAME SUPPORT :Please upgrade to a modern browser.</iframe>
      </div>
</div>

<div id="gshark" style="overflow:auto; width: 900px; height: 800px;" class="window">
	<div class="menubar"
    	onmousedown="dragStart(event, 'gshark')">
<a href="javascript:hideDiv('gshark')"><img src="CORE/Close.png" width="24" height="16" align="right" style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" alt="Close"
onmouseover="this.src='CORE/CloseBack.png'"
onmouseout="this.src='CORE/Close.png'"></a></a><a onClick="fullScreen('gshark')" title="Fullscreen"><img src="CORE/Full.png" height="16" width="16" align="right" style="border-bottom-left-radius: 5px; border-top-left-radius: 5px;" onmouseover="this.src='CORE/FullBack.png'"
onmouseout="this.src='CORE/Full.png'"></a> Grooveshark</div>
	  <div class="content">
      <iframe src="https://grooveshark.com/" width="100%" height="89%" frameborder="0">Error CODE: NO IFRAME SUPPORT :Please upgrade to a modern browser.</iframe>
      </div>
</div>


































<!--Window-->

<!--Stickie Notes-->
<!--1-->
<div id="stick01" class="stickie"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick01')"><a href="javascript:hideDiv('stick01')">X</a></div>
<ul contenteditable="true">
Edit
</ul>
</div>

<div id="stick02" class="stickie"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick02')"><a href="javascript:hideDiv('stick02')">X</a></div>
<ul contenteditable="true">
Edit
</ul>
</div>

<div id="stick03" class="stickie"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick03')"><a href="javascript:hideDiv('stick03')">X</a></div>
<ul contenteditable="true">
Edit
</ul>
</div>

<div id="stick04" class="stickie"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick04')"><a href="javascript:hideDiv('stick04')">X</a></div>
<ul contenteditable="true">
Edit
</ul>
</div>

<div id="stick05" class="stickie"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick05')"><a href="javascript:hideDiv('stick05')">X</a></div>
<ul contenteditable="true">
Edit
</ul>
</div>

<div id="stick06" class="stickie"> 
<div id="dragtop" class="dragtop" onmousedown="dragStart(event, 'stick06')"><a href="javascript:hideDiv('stick06')">X</a></div>
<ul contenteditable="true">
Edit
</ul>
</div>

<!--End Session Windows-->

<!--Shut Down-->
<div id="shutdown" style="top: 50%; left: 50%; margin-top: -200px; margin-left: -190px; overflow:auto; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar"> Shut Down</div>
	  <div class="content">
    <p>Are you sure you want to Shut Down xOS Webtop?</p>
    <p align="center">
    <a href="javascript:hideDiv('shutdown')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
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
    <a href="javascript:hideDiv('restart')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
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
    <a href="javascript:hideDiv('logoff')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
    <a href="xoslogin/process.php"><img src="CORE/buttons/boot/logout.jpg" onMouseOver="this.src='CORE/buttons/boot/logoutunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/logout.jpg'"></a>
  </p>
  </div>
</div>

<!--Upgrade Notify-->
<div id="noteup" style="top: 50%; left: 50%; margin-top: -200px; margin-left: -190px; overflow:auto; width:380px; height:200px; z-index: 9999;" class="window">
	<div class="menubar"> Upgrade Notification (Beta)(Disabled by Default)</div>
	  <div class="content">
    <p>xOS has System Update. To get to the latest version (3.1.0) you must restart xOS.</p>
  <p align="center">
    <a href="javascript:hideDiv('noteup')"><img src="CORE/buttons/boot/cancel.jpg" onMouseOver="this.src='CORE/buttons/boot/cancelunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/cancel.jpg'"></a>
    <a href="#" onClick="hardboot()"><img src="CORE/buttons/boot/restart.jpg" onMouseOver="this.src='CORE/buttons/boot/restartunder.jpg'" onMouseOut="this.src='CORE/buttons/boot/restart.jpg'"></a>
  </p>
  </div>
</div>

<!--End Session Windows-->

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>

</body>
</html>