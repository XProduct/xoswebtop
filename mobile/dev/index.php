<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Home - xOS Webtop</title>
<link href="../css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
        function slin(){
            document.getElementById('mdrop').className ='slidein';
			setTimeout("document.getElementById('mdrop').className ='mdropav';",1000)
			
        }
		function slon(){
            document.getElementById('mdrop').className ='slideout';
			setTimeout("document.getElementById('mdrop').className ='mdropiv';",1000)
        }
		function stayav() {
			document.getElementById('mdrop').className ='mdropav';
		}
  </script>
<style type="text/css">
body,td,th {
	color: #222;
}
body {
	background-image: url(../images/background.png);
	background-size: cover;
}
.slidein {
	-webkit-animation-duration: 1s;
	-webkit-animation-name: slidein;
	-webkit-animation-iteration-count: 1;
}
@-webkit-keyframes slidein {
	from {
		left: -210px;
	}
	to {
		left: 0px;
	}
}
.slideout {
	-webkit-animation-duration: 1s;
	-webkit-animation-name: slideout;
	-webkit-animation-iteration-count: 1;
}
@-webkit-keyframes slideout {
	from {
		left: 0px;
	}
	to {
		left: -210px;
	}
}
</style>
</head>

<body>
<div id="launch">
  <p>LAUNCH xOS BETA</p>
  <p>(COMING SOON)</p>
</div>

<!--Menu Bar-->

<div id="topcontain"><img src="../images/logo_NEW.png" id="logo"  width="245" height="160" onmouseover="slin()" onmouseout="slon()" style="position: absolute; z-index: 333; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;">
<div id="menubar">
<a href="../index.php" class="menu"><div id="home">&nbsp;HOME&nbsp;</div></a>
<a href="../donate.php" class="menu"><div id="download">&nbsp;DONATE&nbsp;</div></a>
<a href="http://xoswebtop.blogspot.com" class="menu"><div id="blog">&nbsp;BLOG&nbsp;</div></a>
<a href="developer.php" class="menu"><div id="developer">&nbsp;DEVELOP&nbsp;</div></a>
<a href="../about.php" class="menu"><div id="about">&nbsp;ABOUT&nbsp;</div></a>
</div>
<!--Menu Dropdown-->
<div id="mdrop" class="mdropiv" style="position: absolute; top: 136px;">
<font color="5fa8b6">
<p><br>xOS Webtop<br>
  <br>
xOS Mobile<br>
<br>
xOS Tablet
</p>
</font>
</div>
<!--Menu Dropdown-->



</div>

<div id="content" style="position: absolute; top: 175px; left: 0px;">
<img src="../images/home.png" width="100%" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;"><br><br>
<div id="writing" style="background-color: #FFF; width: 98.4%; padding: 10px; box-shadow: 8px 8px 8px #333;">
  <h1>Welcome to the xOS Developer Network</h1>
  <p>Here you will find out all the happening things. At the top by catagory you will see In Development, Future Plans, and a News Section. The In Development Section is obviously applications are in development currently. These may or may not have a Estimated Time of Release (ETR). Future Plans are ideas that we may be having. These will NOT have an ETR. News is a blog about new things in the development world of xOS Webtop, Mobile, and Tablet. It will contain new API's and Updates to the Developer Guide. The News will give upcoming release dates and new features that may be coming or available. </p>
  <p><strong>IN DEVELOPMENT</strong></p>
  <hr>
  <p>GamePortal - Games right in xOS Webtop - Spring 2012</p>
  <p>xOS Tablet - xOS on your Tablet - No ETR</p>
  <hr>
  <p><strong>FUTURE PLANS</strong></p>
  <hr>
  <p><em>None</em></p>
  <hr>
  <p><strong>DEVELOPER NEWS</strong></p>
  <hr>
  <p>January 5, 2012 - <strong>Fullscreen, Development, and YOU</strong></p>
  <p>As you have seen Fullscreen apps are new in xOS Webtop 3.1. This feature allows users to use applications fullscreen on top of everything eept the taskbar. With this new feature we are happy to introduce the Fullscreen API. This API - Read More...</p>
<p>January 5, 2012 - <strong>xOS Webtop 3.1 and xOS Mobile 3.1</strong></p>
  <p>With the new website design xOS Webtop and Mobile have been updated to a more modern and awesome design. xOS Webtop has under went some comsemetic surgrey as has xOS Mobile. Now at version 3.1 we are happy to announce - Read More...</p>
<p>January 5, 2012 - <strong>xOS Has Switched Servers with a New Website Design</strong></p>
  <p>As many of you know Open Source Software almost never has a great UI. We have decided to make a change and make the xOS Website have a Fresh-New-Look. As you have noticed xOS is much cleaner than its previous - Read More...</p>
  <hr>
  <p>xOS is built on PHP, HTML5, AJAX, and JavaScript.<br>
    If you are knowledgable in any of these programing languages and want to become a Webtop OS Developer we ask you, if you are interested, please contact us <a href="mailto:bdavis@xproduct.net">HERE</a>.</p>
</div>
<div id="footer" style="padding: 10px;">
<font color="#CCCCCC" size="-1">
<p>&copy; 2009-2011 XProduct</p>
</font>
<div id="html5"><img src="../images/html5.png" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;"></div>
</div>
</div>


</body>
</html>