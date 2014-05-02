<!DOCTYPE HTML>
<html manifest="offline.manifest">
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="5; url=javascript:hideDiv('loadscreen')" />
<title>xOS Mobile</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="apple-touch-icon-precomposed" href="launch/index.png" />
<link rel="apple-touch-startup-image" media="only screen and (-webkit-min-device-pixel-ratio: 2)" href="launch/back@2x.png" />
<link rel="apple-touch-startup-image" media="only screen and (-webkit-min-device-pixel-ratio: 1)" href="launch/back.png" />
<meta id="viewport" name="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<!--Prevent Scrolling-->
<script type="text/javascript">
    function BlockMove(event) {
        // Tell Safari not to move the window.
        event.preventDefault() ;
    }
</script>

<?
include("xoslogin/include/session.php");

if(!$session->logged_in){
	print "<meta http-equiv=\"refresh\" content=\"0;url=xoslogin/main.php\" />";
}
else{
?>

<!--Add to Home Screen Prompt-->

<script type="text/javascript">
var addToHomeConfig = {
	animationIn: 'fade',
	animationOut: 'fade',
	expire:0,
	touchIcon:true,
	message:'Get the xOS Mobile WebApp on your %device. Just Click the %icon and then <strong>Add to Home Screen</strong>. Then you can launch it like a normal App.'
};
</script>
<link rel="stylesheet" href="CORE/css/add2home.css" type="text/css" />
<script type="application/javascript" src="CORE/js/add2home.js?v1"></script>

<!--Google Maps-->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    
    <script type="text/javascript">
        var map;
        
        function initialize() {
            var myOptions = {
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map_canvas'),
                                      myOptions);
            
            // Try HTML5 geolocation
            if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = new google.maps.LatLng(position.coords.latitude,
                                                     position.coords.longitude);
                                                         
                    var infowindow = new google.maps.InfoWindow({
                                                    map: map,
                                                    position: pos,
                                                    content: 'Your Location was Found.'
                                                    });
                                                         
                                    map.setCenter(pos);
                                    }, function() {
                                    handleNoGeolocation(true);
                                    });
            } else {
                // Browser doesn't support Geolocation
                handleNoGeolocation(false);
            }
        }
        
        function handleNoGeolocation(errorFlag) {
            if (errorFlag) {
                var content = 'Error: The Geolocation service failed.';
            } else {
                var content = 'Error: Your browser doesn\'t support geolocation.';
            }
            
            var options = {
                map: map,
                position: new google.maps.LatLng(37, -122),
                content: content
            };
            
            var infowindow = new google.maps.InfoWindow(options);
            map.setCenter(options.position);
        }
        
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        
<!--External Scripts-->

<script src="CORE/js/hideshowapps.js" type="text/javascript"></script>
<script src="CORE/js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="webrowser/script.js" type="text/javascript"></script>
<script src="webrowser/jquery.url.min.js" type="text/javascript"></script>
<script src="CORE/text/texteditor.js" type="text/javascript" ></script>
<script src="CORE/js/shake.js" type="text/javascript"></script>
<script src="CORE/js/orientmove.js" type="text/javascript"></script>
<script type="text/javascript" src="CORE/js/iscroll.js"></script>

<!--External CSS-->

<link rel="stylesheet" href="CORE/css/application.css" media="screen and (max-width: 320px)" type="text/css" />
<link rel="stylesheet" href="CORE/css/applicationls.css" media="screen and (min-width: 321px)" type="text/css" />
<link rel="stylesheet" href="CORE/text/textedit.css" type="text/css" />

<!--Internal Scripts-->

<script type="text/javascript">
function updateClock ( )
{
  var currentTime = new Date ( );
  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;
  var currentTimeString = currentHours + ":" + currentMinutes + " " + timeOfDay;
  document.getElementById("time").firstChild.nodeValue = currentTimeString;
}
</script>
<script type="text/javascript">
    function xosmove() {
        window.scroll(0,0)//This is the window position
    }
</script>
<script type="text/javascript">
var myScroll;

function loaded() {
	myScroll = new iScroll('wrapper', {
		snap: true,
		momentum: false,
		hScrollbar: false,
		onScrollEnd: function () {
			document.querySelector('#indicator > li.active').className = '';
			document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
		}
	 });
}

document.addEventListener('DOMContentLoaded', loaded, false);
</script>
<script type="text/javascript">
var myScroll;
function midscroll() {
	myScroll.scrollToPage(3, 0, 200)
}
</script>
<script type="text/javascript">
var t1; //Define Timeout
var t2; //Define Timeout
var t3; //Define Timeout

//Defines Reset Fade
function reFade() {
	document.getElementById('lock').style.opacity = '1.0';
}

function unlock() {
	t1 = setTimeout("fade('lock')", 1000)
	t2 = setTimeout("hideDiv('lout')", 1000)
	t3 = setTimeout("reFade()", 3000)
}
</script>
<script type="text/javascript">
<!--
function gotoURL() {
var newURL = document.url2go.go.value
document.location.href=newURL
}
//-->
</script>

<!--Internal CSS-->

</head>

<body id="xosm" onLoad="updateClock(); setInterval('updateClock()', 1000 ); changeBGImage(0); xosmove(); midscroll();" ontouchmove="BlockMove(event);">

<!--Background Change-->

<script language="JavaScript">

var backImage = new Array();

backImage[0] = "freshbackm.png";
backImage[1] = "heatm.jpg";
backImage[2] = "";
backImage[3] = "";
backImage[4] = "";
backImage[5] = "";

// Do not edit below this line.
//-----------------------------

function changeBGImage(whichImage){
if (document.body){
document.body.background = backImage[whichImage];
}
}
</script>

<!--LOAD SCREEN-->

<div id="loadscreen" style="position: absolute; top: 0px; left: 0px; width: 320; height: 460px; z-index: 999;">
<img src="launch/back.png" width="320" height="460">
</div>

<!--LOCK SCREEN-->

<div id="lock" style="position:absolute; top: 0px; left: 0px; background-image:url(freshbackm.png); background-position: 0px 0px; background-size:cover; z-index:11; width:320px; height:460px;">
<div id="tlock" style="position:absolute; top:80px; left:40px;"><font color="#FFFFFF">
<b><span id="time" style="font-size:48px;">&nbsp;</span>
<p>
<script type="text/javascript">
var currentTime = new Date()
var month = currentTime.getMonth() + 1
var day = currentTime.getDate()
var year = currentTime.getFullYear()
document.write(month + "/" + day + "/" + year)
</script></p></b></font>
</div>
<div id="lout" style="position:absolute; bottom:25px; left: 30px; visibility: hidden;">
<img src="CORE/images/unlock/outcircle.png" width="240" height="240">
<div id="lknock" style="position:absolute; bottom:85px; right: -28px;">
<img src="CORE/images/unlock/lock.png" width="80" height="80">
</div>
</div>

<div id="in" class="select" style="position: absolute; bottom: 110px; left: 110px;">
<img src="CORE/images/unlock/lockcircle.png" width="80" height="80" ontouchstart="this.src='CORE/images/unlock/unlockcircle.png'; showDiv('lout'); unlock();"
ontouchend="this.src='CORE/images/unlock/lockcircle.png'; hideDiv('lout');">
</div>
</div>

<!--HOME PAGE-->

<!--Widgets Carosuel-->

<div id="wrapper" style="overflow-x: hidden; overflow-y: hidden; ">
	<div id="scroller">
		<ul id="thelist">
			<li>&nbsp;</li>
			<li>
            <div id="wet">
            <script type="text/javascript" src="http://www.showmyweather.com/weather_widget.php?int=0&type=js&country=us&state=California&city=Concord&smallicon=0&current=1&forecast=1&background_color=333&color=DDD&width=175&padding=30&border_width=0&border_color=000000&border_radius=7&font_size=14&font_family=Verdana&showicons=1&measure=F&d=2011-11-17"></script></div>
            </li>
			<li>&nbsp;</li>
			<li>
            <div id="gsearch" style="position:absolute; margin-left: -150px; left: 50%; width:300px; height: 50px; top: 55px; background-color: #CCCCCC; -webkit-border-radius: 5px; border: 1px #000000 solid; z-index: 3;">
<form action="javascript: showDiv('webrowser')">
<input name="google" id="google" onfocus="this.select()" placeholder="Search Bing" style="position: absolute; top: 3px; left: 3px; height: 30px; width: 220px; font-size:24px; z-index: 2;">
</form>
    <div id="searchdefine" style="position: absolute; width: 44px; height: 44px; top: 2px; right: 2px; border: 1px solid #000; -webkit-border-radius: 5px; background-color: #999999;">
<a href="#"><img src="CORE/images/home/search.png" ontouchend="showDiv('webrowser')" width="40" height="40" style="position:absolute; right: 3px; top: 3px; -webkit-border-radius: 5px;"></a>
        </div>
</div>
            </li>
			<li>&nbsp;</li>
			<li>&nbsp;</li>
			<li>
			Apps Page Scrolls Up and Down. Unique Expierence. Yah.
            </li>
		</ul>
	</div>
</div>
<br>
<div id="nav" href="javascript:showDiv('lock')">
	<ul id="indicator">
		<li class="">1</li>
		<li class="">2</li>
		<li class="">3</li>
		<li class="active">4</li>
		<li class="">5</li>
		<li class="">6</li>
		<li class="">7</li>
	</ul>
	
</div>


<!--Start Bar-->
<div id="homebar" style="position:absolute; bottom:0px; left: 50%; margin-left: -92px; background-color:#666666; border-top-left-radius: 20px; border-top-right-radius: 20px;">
<a ontouchend="showDiv('xplayer')"><img src="CORE/images/home/music.png" width="60" height="60" alt="MUS" style="border-top-left-radius: 20px;"></a>
<a onclick="showDiv('apps')"><img src="CORE/images/home/apps.png" width="60" height="60" alt="APP"></a>
<a ontouchend="showDiv('webrowser')"><img src="CORE/images/home/browser.png" width="60" height="60" alt="WEB" style="border-top-right-radius: 20px;"></a>
</div>
<!--END Start Bar-->

<!--BASIC APPLICATION FORMAT-->

<!--//Start

[HOME PAGE] - With Home Button Only -

           {NAME: Your Applications Name}
<div id="NAME" style="position:absolute;" class="application">
<div class="menubar"><a href="javascript:hideDiv('NAME')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
</div>
</div>

[OTHER PAGES] - With Home and Back Buttons -



<!--END APPLICATION FORMAT---->

<div id="hideAll">

<!--CORE APPLICATIONS-->
<div id="apps">
<div id="bh" style="position: fixed; bottom: 5px; left: 50%; margin-left: -36px;">
<a href="javascript:hideDiv('apps')"><img src="CORE/images/home/home_button.png" width="72" height="72"></a>
</div><font color="#FFF">
<table width="100%" border="0">
  <tr>
    <td width="25%"><a onClick="showDiv('weather')" style="-webkit-tap-highlight-color: rgba(0,0,0,0.4);"><img src="CORE/images/apps/weather.png" width="100%" onClick="hideDiv('apps')" style="-webkit-tap-highlight-color: rgba(0,0,0,0.4);"></a></td>
    <td width="25%"><a onClick="showDiv('calc')"><img src="CORE/images/apps/calculator.png" width="100%" onClick="hideDiv('apps')"></a></td>
    <td width="25%"><a ontouchend="showDiv('xplayer')"><img src="CORE/images/apps/music.png" width="100%" onClick="hideDiv('apps')"></a></td>
    <td width="25%"><a onClick="showDiv('webrowser')"><img src="CORE/images/apps/browser.png" width="100%" onClick="hideDiv('apps')"></a></td>
  </tr>
  <tr> 
    <td align="center">Weather</td>
    <td align="center">Calculator</td>
    <td align="center">xMusic</td>
    <td align="center">weBrowser</td>  
  </tr>
  <tr>
    <td><a ontouchstart="showDiv('maps')"><img src="CORE/images/apps/maps.png" width="100%" onClick="hideDiv('apps')"></a></td>
    <td><a onClick="showDiv('textedit')"><img src="CORE/images/apps/textedit.png" width="100%" onClick="hideDiv('apps')"></a></td>
    <td><a onClick="showDiv('command')"><img src="CORE/images/apps/command.png" width="100%" onClick="hideDiv('apps')"></a></td>
    <td><a ontouchend="showDiv('explorer')"><img src="CORE/images/apps/explorer.png" width="100%" onClick="hideDiv('apps')"></a></td>
  </tr>
  <tr> 
    <td align="center">Maps</td>
    <td align="center">Text Edit</td>
    <td align="center">Command</td>
    <td align="center">Explorer</td>  
  </tr> 
  <tr>
    <td><a><img src="CORE/images/apps/logoff.png" width="100%" ontouchend="showDiv('asklogoff')"></a></td>
    <td><a ontouchend="showDiv('settings')"><img src="CORE/images/apps/settings.png" width="100%" onClick="hideDiv('apps')"></a></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td align="center">LogOut</td>
    <td align="center">Settings</td>
    <td align="center"></td>
    <td align="center"></td>  
  </tr> 
</table></font>
</div>

<!--Other Applications-->

<div id="weather" style="position:absolute; background-color: #333;" class="application">
<div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('weather')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('weather')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
</div>
<div style="left: -30px;">
<script type="text/javascript" src="http://www.showmyweather.com/weather_widget.php?int=0&type=js&country=us&state=California&city=Concord&smallicon=0&current=1&forecast=1&background_color=333&color=DDD&width=320&padding=30&border_width=0&border_color=000000&font_size=14&font_family=Verdana&showicons=1&measure=F&d=2011-11-17"></script>
</div>
</div>

<div id="xplayer" style="position:absolute; background-color: #000;" class="application">
<div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('xplayer')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('xplayer')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
</div>
    <font color="#FF0000"><h1>Sorry,</h1><p>We haven't got music down yet. We are working on it.</font>
</div>

<div id="calc" style="position:absolute;" class="application">
<div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('calc')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('calc')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
</div>
<form id="Calc" name="Calc">  
<div align="center">      
<input type="text" style="width:286px; height:40px; font-size:30px;" name="Input">
</div>
</form>
<table width="320px" border="0">
  <tr>
    <td width="75px"><a ontouchend="Calc.Input.value += '1'"><img src="CORE/images/calc/1.jpg" width="75px"></a></td>
    <td width="75px"><a ontouchend="Calc.Input.value += '2'"><img src="CORE/images/calc/2.jpg" width="75px"></a></td>
    <td width="75px"><a ontouchend="Calc.Input.value += '3'"><img src="CORE/images/calc/3.jpg" width="75px"></a></td>
    <td width="75px"><a ontouchend="Calc.Input.value += '/'"><img src="CORE/images/calc/divide.jpg"  width="75px"></a></td>
  </tr>
  <tr>
    <td><a ontouchend="Calc.Input.value += '4'"><img src="CORE/images/calc/4.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '5'"><img src="CORE/images/calc/5.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '6'"><img src="CORE/images/calc/6.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '*'"><img src="CORE/images/calc/multi.jpg" width="75px"></a></td>
  </tr>
  <tr>
    <td><a ontouchend="Calc.Input.value += '7'"><img src="CORE/images/calc/7.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '8'"><img src="CORE/images/calc/8.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '9'"><img src="CORE/images/calc/9.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '-'"><img src="CORE/images/calc/-.jpg" width="75px"></a></td>
  </tr>
  <tr>
    <td><a ontouchend="Calc.Input.value = ''"><img src="CORE/images/calc/clear.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '0'"><img src="CORE/images/calc/0.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value = eval(Calc.Input.value)"><img src="CORE/images/calc/=.jpg" width="75px"></a></td>
    <td><a ontouchend="Calc.Input.value += '+'"><img src="CORE/images/calc/+.jpg" width="75px"></a></td>
  </tr>
</table>
</div>

<div id="webrowser" style="position:absolute; background-color: #000;" class="application">
    <div style="position: fixed; left: 0px;">
<div class="menubar"><a href="javascript:xosmove()" onClick="hideDiv('webrowser'); showDiv('apps')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:xosmove()" onClick="hideDiv('webrowser')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
</div>
<div style="position:absolute; top: 42px; width: 20px; height: 20px; right: 5px;" id="reload"><img src="webrowser/reload.png" width="20" height="20" style="-webkit-border-radius: 3px;"></div>
  <input id="url" name="url" style="position:absolute; left: 5px;" value="http://"></input></div>
  <iframe frameborder="0" id="frame" name="frame" class="frame" width="320px" height="390px;" style="position:absolute; top: 70px; overflow: scroll; background-color:#FFF"></iframe>
  
</div>

<div id="textedit" style="position: absolute; background-color: #FFF;" class="application">
<div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('textedit')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('textedit')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
</div>
    <textarea id="texteditor"></textarea>
    <script type="text/javascript">
        new TINY.editor.edit('editor',{
                             id:'texteditor',
                             width:318,
                             height:260,
                             cssclass:'te',
                             controlclass:'tecontrol',
                             rowclass:'teheader',
                             dividerclass:'tedivider',
                             controls:['bold','italic','underline','|','strikethrough','subscript','superscript','|',
                                       'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
                                       'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
                                       'font','size','style','|','image','hr','link','unlink','|','print'],
                             footer:true,
                             fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
                             xhtml:true,
                             cssfile:'CORE/text/textedit.css',
                             bodyid:'editor',
                             footerclass:'tefooter',
                             toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
                             });
        </script>
</div>
    
<div id="settings" style="position: absolute;" class="application">
    <div class="menubar" style="position: fixed;"><a href="javascript:showDiv('apps')" onClick="hideDiv('settings')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('settings')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
    </div><font color="#FFFFFF">
    <div style="overflow: scroll;">
    <p align="center">xOS Mobile 3.1 Settings</p>
    <hr>
    <b>About xOS Mobile</b><hr>
    &nbsp;<strong>-</strong>&nbsp;Version 3.1.0<br>
    &nbsp;<strong>-</strong>&nbsp;CORE Version 1.2.43<br>
    &nbsp;<strong>-</strong>&nbsp;Username: <? echo $session->username ?><br>
    &nbsp;<strong>-</strong>&nbsp;<a href="javascript:window.location.href = 'http://xos.xproduct.net/mobile/IPhone/xoslogin/process.php';">Force Logout of xOS Mobile</a>
    <hr>
    <b>Display Settings</b><hr>
    &nbsp;<strong>-</strong>&nbsp;<a href="javascript:changeBGImage(0)">Default Background</a><br>
    &nbsp;<strong>-</strong>&nbsp;<a href="javascript:changeBGImage(1)">Heat Background</a><br>
    &nbsp;<strong>-</strong>&nbsp;<a href="javascript:changeBGImage(2)">No Background</a><br>
    <hr>
    <b>About Applications</b><hr>
    &nbsp;<strong>-</strong>&nbsp;All Applications are Up-to-Date<br>
    &nbsp;<strong>-</strong>&nbsp;No Applications Out-of-Date<br>
    &nbsp;<strong>-</strong>&nbsp;Number of Applications: 9
    <hr>
    <b>Sound Settings</b><hr>
    &nbsp;<strong>-</strong>&nbsp;There is currently no settings for sound.<br>
    <hr>
    &nbsp;&nbsp;XProduct 2012 - Mobile 3.1.0
    </div>
    </font>
</div>    
    
<div id="explorer" style="position: absolute;" class="application">
    <div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('explorer')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('explorer')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
    </div>
    <iframe onTouchMove="BlockMove(event);" id="exp" src="CORE/explorer/list.php" width="320" height="420px;" frameborder="0"></iframe>
</div>        
    
<div id="maps" style="position:absolute;" class="application">
    <div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('maps')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('maps')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
    </div>
    <div id="map_canvas" style="height: 420px;"></div>
</div>    
    
<div id="photoview" style="position:absolute;" class="application">
    <div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('photoview')"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('photoview')"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
    </div>
    You will soon be able to view pictures here.
</div>    

<div id="command" style="position:absolute; background-color: #000;" class="application">
    <div class="menubar"><a href="javascript:showDiv('apps')" onClick="hideDiv('command'); xosmove();"><img src="CORE/images/home/back.png" align="left" style="margin-top: 5px; margin-left: 5px;" width="90" height="30"></a><a href="javascript:hideDiv('command'); xosmove();"><img align="right" style="margin-top:5px; margin-right:5px;" src="CORE/images/home/home.png" width="90" height="30"></a>
    </div>
    <form action="javaScript:gotoURL()" method="get" name="url2go">
	  <textarea name="go" id="textarea" onclick="this.value='javascript:';" style="background-color:#000; border:#000000; color: #FFF; width: 320px; height: 140px;">Enter Your Commands Here - XProduct 2012</textarea>
	  <input value="Execute" type="submit">
	</form> 
</div>    

   
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--HIDE ALL-->    
</div>     
    
    
<!-- Alert Notifications -->

<div id="asklogoff" style="position: absolute; padding: 20px; background-color: #333; border-radius: 10px; width: 320px; margin-left: -160px; left: 50%; visibility: hidden; z-index: 999; top: 80px;">
<font color="#CCCCCC">Are you sure you want to logout of xOS?</font>
<div style="height: 7px;"></div>
<a href="javascript:hideDiv('asklogoff')">
<div id="lgno" style="background-color:#CCC; padding: 10px; border-top-left-radius: 7px; border-top-right-radius: 7px;">Cancel</div></a><a href="javascript:window.location.href = 'http://xos.xproduct.net/mobile/IPhone/xoslogin/process.php';"><div id="lgyes" style="background-color:#5FA8B6; padding: 10px; border-bottom-left-radius: 7px; border-bottom-right-radius: 7px;">Log Out</div></a>
</p>
</div>  

<!--  END PRELOAD  -->   

</body>
<? } ?>
</html>