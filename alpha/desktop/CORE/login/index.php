<? include("include/session.php"); ?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>xOS</title>
</head>
<style type="text/css">
html { 
	background: url(../images/backgrounds/tiles.blur.texture.png); 
	margin: 0px 0px 0px 0px;
	overflow: hidden;
	user-select: none;
	-ms-user-select: none;
	-moz-user-select: none;
	-webkit-user-select: none;
	-o-user-select: none;
	font: Arial, Helvetica, sans-serif;
	font-size: 16px;
	cursor: default;
}
#loginPanel {
	position: absolute;
	background-color: rgba(153, 153, 153, 0.7);	
	text-align: center;
	width: 430px;
	height: 280px;
	margin-left: -200px; 
	left: 50%;
	margin-top: -140px;
	top: 50%;
	-webkit-border-radius: 7px;
	-moz-border-radius: 7px;
	-ms-border-radius: 7px;
	-o-border-radius: 7px;
	border-radius: 7px;
	box-shadow: #333 0px 4px 12px 5px;
	-webkit-transition: text-align 0.2s;
	transition: text-align 0.2s;
}
div.userPanel {
	display: inline-block;
	opacity: 0.6;
	-webkit-transition: opacity 0.2s, display 0.2s;
	transition: opacity 0.2s, display 0.2s;
}
div.userPanel:hover {
	opacity: 1.0;	
}
div.userPanelInactive {
	display: none !important;
}
div.userPanelActive {
	opacity: 1.0 !important;
}
div.proPic {
	-webkit-border-radius: 128px;
	-moz-border-radius: 128px;
	-ms-border-radius: 128px;
	-o-border-radius: 128px;
	border-radius: 128px;
	width: 128px;
	height: 128px;
	-webkit-transform: scale(0.8, 0.8);
	transform: scale(0.8, 0.8);
	border: 6px solid #FFFFFF;
}
#loginInfo {
	position: relative;
	top: -40px;
	opacity: 0.0;
	-webkit-transition: all 0.2s;
	transition: all 0.2s;
}
.loginInfoDroped {
	top: 0px !important;
	opacity: 1.0 !important;
}
#logInButton {
	position: relative;
	top: -1px;
	display: inline-block;
	width: 44px;
	height: 22px;
	-webkit-border-top-right-radius: 4px;
	-webkit-border-bottom-right-radius: 4px;
	-webkit-transition: background-color 0.1s ease-in-out;
	transition: background-color 0.1s ease-in-out;
	background-color: #EAEAEA;
	color: #333333;
}
#logInButton:hover {
	background-color: #999999;
}
#logInButton:active {
	background-color: #008dc4;
}
input[type="password"] {
	outline: none;
	padding: 2px;
	-webkit-border-top-left-radius: 4px;
	-webkit-border-bottom-left-radius: 4px;
	border: 1px solid #CCCCCC;	
}
input[type="password"]:focus {
	border: 1px solid #008dc4;
}
input[type="text"] {
	outline: none;
	padding: 2px;
	-webkit-border-radius: 4px;
	-webkit-border-radius: 4px;
	border: 1px solid #CCCCCC;	
}
input[type="text"]:focus {
	border: 1px solid #008dc4;
}
</style>

<script type="text/javascript">
var userAccounts = new Array();
var currentUser = "";

function dropPasswordField(be) {
	console.log(be);
	
	document.getElementById('otherUser').style.display = "none";
	document.getElementById('cancel').style.display = "inline";
	document.getElementById('loginInfo').className = "loginInfoDroped";
	for (var i = 0; i < userAccounts.length; i++) {
		if (userAccounts[i] != be) {
			document.getElementById(userAccounts[i]).className = "userPanel userPanelInactive";	
		}
		else {
			document.getElementById(userAccounts[i]).className = "userPanel userPanelActive";
			document.getElementById('username').value = document.getElementById(userAccounts[i] + "hidden").value;
		}
	}
	document.getElementById('password').focus();
}

function pickpPasswordField() {
	if (userAccounts.length > 0) {
		document.getElementById('otherUser').style.display = "inline";
	}
	document.getElementById('loginInfo').className = "";
	document.getElementById('loginInfoManual').style.display = "none";
	document.getElementById('cancel').style.display = "none";
	document.getElementById('otherUser').style.display = "inline";
	for (var i = 0; i < userAccounts.length; i++) {
		document.getElementById(userAccounts[i]).className = "userPanel";	
		document.getElementById('username').value = "";
	}
}
function initOtherUser() {
	pickpPasswordField();
	for (var i = 0; i < userAccounts.length; i++) {
		document.getElementById(userAccounts[i]).className = "userPanel userPanelInactive";	
		document.getElementById('usernameM').focus();
	}
	document.getElementById('loginInfoManual').style.display = "inline";
	document.getElementById('cancel').style.display = "inline";
	document.getElementById('otherUser').style.display = "none";
}
window.onclick = function (e) {
	console.log(e);
}
window.onload = function () {
	var userObject = { 'id': 1, 'username': 'bdavis', 'fullname': 'Brandon Davis', 'avatar': 'http://statebystategardening.com/images/avatars/default_set/flower_avatar_0022.jpg' };
	localStorage.setItem("user1ID", JSON.stringify(userObject));
	userObject = { 'id': 2, 'username': 'rorange', 'fullname': 'Richard Orange', 'avatar': '' };
	localStorage.setItem("user2ID", JSON.stringify(userObject));
	
	for(i = 0; i < localStorage.length; i++) {
		if (localStorage.key(i).substring(0,4) == "user") {
			document.getElementById('loginInfoManual').style.display = "none";
			document.getElementById('otherUser').style.display = "inline";
			var userLID = JSON.parse(localStorage.getItem(localStorage.key(i)));
			console.log(userLID);
			var userNumber = userLID['id'];
			userAccounts.push("xuser" + userNumber);
			var avatarUrl = userLID['avatar'];
			if (avatarUrl == "") {
				avatarUrl = "../images/defaults/person.default.png";
			}
			document.getElementById('users').innerHTML += "<div id=\"xuser" + userNumber + "\" class=\"userPanel\" onclick=\"dropPasswordField(this.id)\"><div id=\"username" + userNumber + "Pic\" class=\"proPic\" style=\"background-image: url(" + avatarUrl + ");\"></div><div id=\"username" + userNumber + "\">" + userLID['fullname'] + "<input type=\"hidden\" id=\"xuser" + userNumber + "hidden\" value=\"" + userLID['username'] + "\"></div></div>";
		}
	}
}
</script>
<body>
<div id="loginPanel">
	<div id="users">
		
    </div><br><br>
    <a href="javascript:void(0);" id="otherUser" style="position: absolute; bottom: 8px; right: 14px; display: none;" onclick="initOtherUser();">Other User</a>
    <a href="javascript:void(0);" id="cancel" style="position: absolute; bottom: 8px; right: 14px; display: none;" onclick="pickpPasswordField();">Cancel</a>
    <div id="loginInfo">
        <form name="autoLogin" action="login.php" method="post">
            <input type="hidden" id="username" name="user" value="">
            <input type="password" id="password" name="pass" style="width: 180px;" placeholder="Password"><label for="LoginA"><div id="logInButton">Login</div></label>
            <input type="submit" id="LoginA" style="display: none;">
        </form>
    </div>
    <div id="loginInfoManual" style="position: relative; top: -40px;">
    <img src="../images/toolbar/xlogo.inset.png" width="128" height="128">
    	<form name="manLogin" action="login.php" method="post">
            <input type="text" id="usernameM" name="user" style="width: 224px;" value="" placeholder="Username"><br>
            <input type="password" id="passwordM" name="pass" style="width: 180px;" placeholder="Password"><label for="LoginM"><div id="logInButton">Login</div></label>
            <input type="submit" id="LoginM" style="display: none;">
        </form>
    </div>
</div>
</body>
</html>