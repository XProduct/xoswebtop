<!DOCTYPE HTML>
<?
include("include/session.php");
?>
<html>
<head>
<title>xOS Link Login</title>
<?
if($session->logged_in){
   echo "<meta http-equiv=\"refresh\" content=\"0;url=../xOSmobile.php\" />";
}
else{
?>
<meta id="viewport" name="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<style type="text/css">
body,td,th {
	color: #333;
}
body {
	background-color: #5FA8B6;
}
a:link {
	color: #0F0;
}
a:visited {
	color: #0F0;
}
a:hover {
	color: #0F0;
}
a:active {
	color: #0F0;
}
</style>
</head>
<body>
<h1>Login</h1>
<?
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}
?>
<form action="process.php" method="post">
<p><input type="text" name="user" maxlength="30" style="width: 98%; height: 34px; font-size: 24px;" placeholder="Username" value="<? echo $form->value("user"); ?>"><? echo $form->error("user"); ?>
<br><input type="password" name="pass" maxlength="30" style="width: 98%; height: 34px; font-size: 24px;" placeholder="Password" value="<? echo $form->value("pass"); ?>"><? echo $form->error("pass"); ?>
<p>
  <input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
  <font size="2">Remember Me</p>
<p>
  <input type="hidden" name="sublogin" value="1">
  <input type="submit" value="Login">
</p>
<p><br>
    <font size="2">[<a href="forgotpass.php">Forgot Password?</a>]</font> </p>
  <p>    Not registered? <a href="register.php">Sign-Up!</a></p>
</form>
<?
}
?>
</body>
</html>
