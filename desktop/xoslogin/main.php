<!DOCTYPE HTML>
<?
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<html>
<?
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
	echo "<meta http-equiv=\"refresh\" content=\"0;url=../xOSwebtop.php\" />";
}
else{
?>
<title>xOS Link Login</title>
<style type="text/css">
body,td,th {
	color: #0F0;
}
body {
	background-image: url(../freshback.png);
	background-size: cover;
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
</style>
<body>

<div id="holder" style="position: absolute; left: 50%; top: 50%; background-image:url(../CORE/tranparbox.png); background-size: cover; border: 4px; border-color: #333; border-radius: 10px; width: 280px; height: 370px; padding: 12px; margin-top: -185px; margin-left: -140px;">

<h1>Login</h1>
<?
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}
?>
<form action="process.php" method="post">

  <p>Username:
    <input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"><? echo $form->error("user"); ?>  </p>
  <p>Password:
    <input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"><? echo $form->error("pass"); ?>    </p>
  <p>
    <input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
    <font size="2">Remember me next time&nbsp;&nbsp;&nbsp;&nbsp;    </p>
  <p>
    <input type="hidden" name="sublogin" value="1">
    <input type="submit" value="Login">
    </p>
  <p><br>
    <font size="2">[<a href="forgotpass.php">Forgot Password?</a>]</font> </p>
  <p>    Not registered? <a href="register.php">Sign-Up!</a></p>
</form>

</div>

<?
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
echo "</td></tr><tr><td align=\"center\"><br><br>";
echo "<b>Member Total:</b> ".$database->getNumMembers()."<br>";
echo "There are $database->num_active_users registered members and ";
echo "$database->num_active_guests guests viewing the site.<br><br>"

?>




</body>
</html>
