<?
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */
include("include/session.php");
?>

<html>
<title>xOS Link | Register</title>
<meta id="viewport" name="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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

<?
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
   echo "<h1>Registered</h1>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
       ."<a href=\"main.php\">Login Here</a>.</p>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */
else if(isset($_SESSION['regsuccess'])){
   /* Registration was successful */
   if($_SESSION['regsuccess']){
      echo "<h1>Registered!</h1>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been saved, "
          ."you may now <a href=\"main.php\">login</a>to your xOS.</p>";
   }
   /* Registration failed */
   else{
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>

<h1>Register</h1>
<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>
<form action="process.php" method="POST">

Username:<input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"><? echo $form->error("user"); ?><p>
Password:<input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"><? echo $form->error("pass"); ?><p>
Email:<input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>"><? echo $form->error("email"); ?>
<p>
<input type="hidden" name="subjoin" value="1">
<input type="submit" value="Join!">
<a href="main.php">CANCEL</a>
</form>

<?
}
?>

</div>

</body>
</html>
