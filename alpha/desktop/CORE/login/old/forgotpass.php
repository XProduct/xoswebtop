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
<title>xOS Link | Retrieve Password</title>
<style type="text/css">
body,td,th {
	color: #0F0;
}
body {
	background-color: #333;
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

<h1>Reset Password</h1>

<?
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "<h1>New Password Generated</h1>";
      echo "<p>Your new password has been generated "
          ."and sent to the email <br>associated with your account. "
          ."<a href=\"main.php\">Main</a>.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "<h1>New Password Failure</h1>";
      echo "<p>There was an error sending you the "
          ."email with the new password,<br> so your password has not been changed. "
          ."<a href=\"main.php\">Main</a>.</p>";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>

<h1>Forgot Password</h1>
A new password will be generated for you and sent to the email address<br>
associated with your account, all you have to do is enter your
username.<br><br>
<? echo $form->error("user"); ?>
<form action="process.php" method="POST">
<b>Username:</b> <input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>">
<input type="hidden" name="subforgot" value="1">
<input type="submit" value="Get New Password">
</form>

<?
}
?>

</body>
</html>
