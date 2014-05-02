<!DOCTYPE html>
<?
include("../include/session.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>xOS Admin User Help</title>
<script type="text/javascript" src="userhelp/helper.php"></script>
<style type="text/css">
body,td,th {
	color: #CCC;
}
body {
	background-color: #5FA8B6;
}
a:link {
	color: #06F;
}
a:visited {
	color: #06F;
}
a:hover {
	color: #06F;
}
a:active {
	color: #06F;
}
</style>
</head>

<body>
<h1>Admin Center</h1>
<p><font size="4">Logged in as <b><? echo $session->username; ?></b></font>. You are a valid administrator.</p>
<hr>
<p>Back to [<a href="../manage.php">Manage Accounts</a>]&nbsp;&nbsp;&nbsp;Go to [<a href="admin.php">Admin Center</a>]<br>
<br>
What is the user's username?<br><input type="text" autofocus id="user" size="45" maxlength="45">
<hr>
<p>What problems is the user having?
<p><strong>No Clock:</strong>
<form class="clock" action="javascript:chgClock()">
<p><select id="clock">
	<option value="1">Clock 00:00 AM</option>
    <option value="2">Clock 00:00:00 PM</option>
</select>
<button type="submit">Change Clock</button>
</form>
<p>Please Select  A Clock Type:
<p>Restore Default
<p><strong>Clock doesn't update preference:</strong>
<p>Contact Brandon Davis to diagnose the problem but update their prefered prefrence above. When submitting problem to Brandon please provide username,  desired clock type, and if account is active or deleted currently.
<p><strong>No Background:</strong>
<p>Please Select  A Background:
<form class="back" action="javascript:chgClock()">
<p><select id="back">
	<option value="0">Default</option>
    <option value="1">Grey</option>
    <option value="2">Blue Moon</option>
    <option value="3">Tunnel</option>
    <option value="4">Waterfall</option>
    <option value="5">White Plain</option>
</select>
<button type="submit">Change Background</button>
</form>
<p>Restore Default
<p><strong>Background doesn't update always stays the same:</strong>
<p>Contact Brandon Davis to diagnose the problem but update their prefered prefrence above. When submitting problem to Brandon please provide username,  desired background picture, and if account is active or deleted currently.
<p><strong>User Can't login:</strong>
<p>You will have to Delete the users account in Admin Center. Make sure you notify them immediatly that their account needs to be re-registered.
</body>
</html>