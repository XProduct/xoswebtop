<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>xOS</title>
<link href="CORE/styles/styles.css" type="text/css" rel="stylesheet">
<script src="CORE/scripts/window/dragwindow.js" type="text/javascript"></script>
<script src="CORE/scripts/window/resizewindow.js" type="text/javascript"></script>
<script src="CORE/scripts/command.js" type="text/javascript"></script>
<script type="text/javascript">
window.onload = function (e) {
	var windowControls = document.getElementsByClassName('windowButtons');
	for (w = 0; w < windowControls.length; w++) {
		var curID = windowControls.item(w).parentNode.parentNode.id;
		windowControls.item(w).innerHTML = "<div onclick=\"exit('" + curID + "')\" class=\"minimizeButton\"></div><div class=\"fullscreenButton\"></div><div onclick=\"exit('" + curID + "')\" class=\"closeButton\"></div>";	
		
	}
	updateTime();
	setInterval("updateTime()", 1000);
	
	//Define Click Event Handlers
	
	document.getElementById("leapList").onclick = function (e) {
		console.log(this);
		console.log(e.target);
		if (this == e.target) {
			toggleLeap();	
		}
	}
}


var menuClick = false;
var lastMenu = null;
var lastInput = null;

function menuDisplay(menuType, override) {
	if (document.getElementById('mainMenuDrop').style.display == "block") {
		document.getElementById('mainMenuDrop').style.display = "none";
	}
	if (document.getElementById('toolMenuDrop').style.display == "block") {
		document.getElementById('toolMenuDrop').style.display = "none";
	}
	document.getElementById(menuType).style.display = override;
	menuClick = true;
	lastMenu = menuType;
	return;
}

window.onclick = function (e) {
	//console.log(e); //Displays on mouse down event
	if ((e.srcElement.tagName == "INPUT" || e.srcElement.tagName == "TEXTAREA") && e.srcElement.id != "dictationText") {
		lastInput = e.srcElement.id;
	}
	if (menuClick != true && lastMenu != null) {
		document.getElementById(lastMenu).style.display = "none";
		menuClick = false;
		lastMenu = null;
	}
	else {
		menuClick = false;
	}
}

window.oncontextmenu = function (e) {
	if (e.srcElement.id != (null || "")) {
		console.log(e.srcElement.id);
	}
	else if (e.srcElement.localName == "html") {
		console.log("html document");
	}
	else {
		console.log(e);	
	}
	//return false;	
}

var isCtrl = false;
var isShift = false;

window.onkeyup = function(e) {
    if(e.which == 17) isCtrl=false;
	if(e.which == 16) isShift=false;
}

window.onkeydown = function(e){
    if(e.which == 17) isCtrl=true;
    if(e.which == 16) isShift=true;
	if(e.which == 190 && (isCtrl == true && isShift == true)) {
		if (lastInput != null || lastInput !== "undefined") {
			document.getElementById('dictationText').focus();
			//Continue to allow the speak dialog to come up.
		}
    }
}

function processSpeech(words) {
	console.log(document.getElementById(lastInput).tagName);
	if (document.getElementById(lastInput).tagName == "TEXTAREA") {
		
	}
	else {
		document.getElementById(lastInput).value += words;
		document.getElementById(lastInput).focus();
		document.getElementById('dictationText').value = "";
	}
}

function toggleNotificationPanel() {
	var panel = document.getElementById('notificationPanel');
	if(panel.style.right == "0px") {
		panel.style.right = "-320px";
	}
	else {
		panel.style.right = "0px";
	}
}
</script>
</head>
<body>

<!--Toolbar On Very Top Of Page-->

<div id="maintoolbar">
<!--left-->
    <div id="mainToolbarMainMenu" onclick="menuDisplay('mainMenuDrop', 'block');" class="toolbarItem"></div>
    <div id="mainToolbarFileMenu" class="toolbarItem">File</div>
    <div id="mainToolbarEditMenu" class="toolbarItem">Edit</div>
    <div id="mainToolbarViewMenu" class="toolbarItem">View</div>
    <div id="mainToolbarToolsMenu" onclick="menuDisplay('toolMenuDrop', 'block');"class="toolbarItem">Tools</div>
    <!--<div id="maintoolbarmainmenu">
    
    </div>-->
    
<!--Right-->
<div id="rightMenu">
	<div id="mainMenuBarVoiceAction"><input type="speech" id="dictationText" x-webkit-speech onwebkitspeechchange="processSpeech(this.value);"></div>
    <div id="mainToolbarClock">00:00 AM</div>
    <div id="mainToolbarLogin">Brandon</div>
    <div id="mainToolbarNotification" onclick="toggleNotificationPanel()"></div>
</div>

</div>

<div id="mainMenuDrop" class="dropMenuToolbar" onclick="menuDisplay('mainMenuDrop');">
<div id="mainMenuAbout" onclick="run('about');" class="menuItem">About xOS</div>
<div id="mainMenuSoftware" onclick="run('settings');" class="menuItem">Software Upgrade</div>
<div><hr></div>
<div id="mainMenuShutDown" onclick="run('about');" class="menuItem">Shut Down</div>
<div id="mainMenuRestart" onclick="run('settings');" class="menuItem">Restart</div>
<div id="mainMenuLogOff" onclick="askLogoff();" class="menuItem">Log Off</div>
<div id="mainMenuLock" onclick="run('settings');" class="menuItem">Lock</div>
</div>

<div id="toolMenuDrop" class="dropMenuToolbar" onclick="menuDisplay('toolMenuDrop');">
<div id="toolMenuConsole" onclick="run('console');" class="menuItem">Console</div>
<div id="toolMenuAccount" onclick="run('account');" class="menuItem">Account</div>
</div>

<!--Desktop-->

<p>&nbsp;</p>
<p onclick="toggleLeap();">Leap</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!--Notification Panel-->

<div id="notificationPanel">
	<div id="notificationItems">
    	<div id="noti_newUpdates" class="notificationItem">
        	<strong>New Updates Available</strong><br>
            Click to view the available updates.
        </div>
        <div id="noti_newUpdates" class="notificationItem">
        	<strong>New Music Uploaded</strong><br>
            13 new songs have been uploaded to your account.
        </div>
    </div>
</div>

<!--Application Dock Side Plan-->

<div id="leapListWrapper">
    <div id="leapList">
    	<p>Testing</p>
            	<p>Testing</p>
                    	<p>Testing</p>
                            	<p>Testing</p>
                                    	<p>Testing</p>
                                            	<p>Testing</p>
                                                    	<p>Testing</p>
                                                            	<p>Testing</p>
    </div>
</div>










<!--Windows -- Check Developer Documentation on how to create these -->

<div id="about" style="overflow: hidden;" class="window" onmousedown="windowClick(event, 'about');">
    <div class="menubar" onmousedown="dragStart(event, 'about')">About xOS 4<div class="windowButtons"></div></div>
    <div class="content" style="height: 92%; overflow: auto;">
    	<h1>xOS 4 is Here</h1>
        <h3>What's New?</h3>
        <p><span style="font-weight: bold">New Menu Bar</span><br>The menu bar is brand new. It is gives a more natural feel to the way you navigate around xOS. </p>
        <p><span style="font-weight: bold">New Interface</span><br>A more modern interface to put you in a familiar place. Menus at the top. Applications at the bottom. Everything right where you expect it to be.</p>
        <p><span style="font-weight: bold">Speech Dictation</span><br>Dicate speech any where you are. Easily just click the microphone in the top right of the screen or use the keyboard shortcut <strong>CTRL + SHIFT + .</strong>(Period) It even works offline. Speech dictation requires <a href="https://www.google.com/chrome" target="_blank">Google Chrome</a>.</p>
    </div>
</div>

<div id="settings" style="overflow: hidden;" class="window" onmousedown="windowClick(event, 'settings');">
    <div class="menubar" onmousedown="dragStart(event, 'settings')">Settings<div class="windowButtons"></div></div>
    <div class="content" style="height: 92%; overflow: auto;">
    	<input id="testArea" type="text">
    </div>
</div>

<div id="console" style="overflow: hidden;" class="window" onmousedown="windowClick(event, 'console');">
    <div class="menubar" onmousedown="dragStart(event, 'console')">Console<div class="windowButtons"></div></div>
    <div class="content" style="height: 435px; overflow: hidden; padding: 0px 0px 0px 0px !important;">
    	<textarea id="consoleTerminal" cols="60" rows="10" onkeyup="startCommand(event);"></textarea>
    </div>
</div>

<div id="account" style="overflow: hidden;" class="window" onmousedown="windowClick(event, 'account');">
    <div class="menubar" onmousedown="dragStart(event, 'account')">About xOS 4<div class="windowButtons"></div></div>
    <div class="content" style="height: 92%; overflow: auto;">
    	<h1>Account</h1>
        <h3>About You</h3>
        
        <h3>Options</h3>
		
    </div>
</div>

<div id="texteditor" style="overflow: hidden; width: 1048px; height: 646px;" class="window" onmousedown="windowClick(event, 'texteditor');">
    <div class="menubar" onmousedown="dragStart(event, 'texteditor')">Settings<div class="windowButtons"></div></div>
    <div class="content" style="height: 92%; overflow: auto; text-align: center; padding: 44px;">
    	<iframe id="textEditorPaper" name="textEditorPaper" style="width:800px; height:1030px; box-shadow: #333 0px 5px 12px 5px; background-color: #FFF; z-index: -999;" frameborder="0"></iframe>
    </div>
</div>

<div id="confirmDialog" style="overflow: hidden;" class="window confirm">
    <div class="menubar" onmousedown="dragStart(event, 'confirmDialog')"></div>
    <div class="content" style="height: 89%; overflow: auto;">
    	<p id="confirmDialogText" style="font-weight: 700;"></p>
        <p id="confirmDialogCaption"></p>
        <div style="position: absolute; bottom: 12px; right: 12px;"><button onClick="cancelConfirm();">Cancel</button><button id="confirmDialogAction">Default</button></div>
    </div>
</div>

</body>
</html>