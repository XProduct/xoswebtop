<!DOCTYPE HTML>
<?
include("../include/session.php");

function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");
	  $realtime = date('r', $time ); // Local time for humans

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$realtime</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Time Banned</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}
   
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ../manage.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<html>
<title>xOS Admin Center</title>
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
<body>
<h1>Admin Center</h1>
<p><font size="4">Logged in as <b><? echo $session->username; ?></b></font>. You are a valid administrator.</p>
<hr>
<p>Back to [<a href="../manage.php">Manage Accounts</a>]&nbsp;&nbsp;&nbsp;Go to [<a href="userhelp.php">User Support Page</a>]<br>
  <br>
  <?
if($form->num_errors > 0){
   echo "<font size=\"4\" color=\"#ff0000\">"
       ."!*** Error with request, please fix</font><br><br>";
}
?>
</p>
<table align="center" border="0" cellspacing="5" cellpadding="5">
  <tr><td>
<div style="width: 100%; height: 200px; overflow: visible;">
<?
/**
 * Display Users Table
 */
?>
<h3>All Active Users:</h3>
<?
displayUsers();
?>
</div>
</td></tr>
<tr>
  <td>
    <p><br>
  <?
echo "<b>Total Members:</b> ".$database->getNumMembers()."<br>";
?>
  <br>&nbsp;
    </p>
  <tr><td>
<hr>
</td></tr>
<tr><td>
<br>
<?
/**
 * Update User Level
 */
?>
<h3>Change Users Permissions:</h3>
<? echo $form->error("upduser"); ?>
<table>
<form action="adminprocess.php" method="post">
<tr><td>
Username:<br>
<input name="upduser" type="text" value="<? echo $form->value("upduser"); ?>" size="45" maxlength="45">
</td>
<td>Level:<br>
<select name="updlevel">
<option value="1">Normal User</option>
<option value="9">Administrator</option>
</select>
</td>
<td>
<br>
<input type="hidden" name="subupdlevel" value="1">
<input type="submit" value="Update Level">
</td></tr>
</form>
</table>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Delete User
 */
?>
<h3>Delete User</h3>
<p>You should NEVER delete a user without previous permission or request from the user. The only time you will delete a user if they are having a problem with their account and they are getting active email support. You must immediately notify them of their account status.</p>
<? echo $form->error("deluser"); ?>
<form action="adminprocess.php" method="post">
Username:<br>
<input name="deluser" type="text" value="<? echo $form->value("deluser"); ?>" size="45" maxlength="45">
<input type="hidden" name="subdeluser" value="1">
<input type="submit" value="Delete User">
</form>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Delete Inactive Users
 */
?>
<h3>Delete Inactive Users</h3>
This will delete all normal users (not administrators), who have not logged in to the site
within a certain time period. You specify the days that they have spent inactive to delete them. <br><br>
<table>
<form action="adminprocess.php" method="post">
<tr><td>
Days:<br>
<select name="inactdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>
</td>
<td>
<br>
<input type="hidden" name="subdelinact" value="1">
<input type="submit" value="Delete All Inactive">
</td>
</form>
</table>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Ban User
 */
?>
<h3>Ban User</h3>
<p>Ban a user that behaves badly and/or abuses the services provided with xOS Webtop and/or Mobile.</p>
<h3><? echo $form->error("banuser"); ?></h3>
<form action="adminprocess.php" method="post">
  Username:<br>
<input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>">
<input type="hidden" name="subbanuser" value="1">
<input type="submit" value="Ban User">
</form>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr><td>
<?
/**
 * Display Banned Users Table
 */
?>
<h3>All Banned Users:</h3>
<?
displayBannedUsers();
?>
</td></tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td>
<?
/**
 * Delete Banned User
 */
?>
<h3>Delete Banned User</h3>
<p>You have nothing to say to a banned user? Well delete them. We don't need them anymore. Only delete after a year of no problems with user.</p>
<p><? echo $form->error("delbanuser"); ?></p>
<form action="adminprocess.php" method="post">
  Username:<br>
<input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>">
<input type="hidden" name="subdelbanned" value="1">
<input type="submit" value="Delete Banned User">
</form>
</td>
</tr>
</table>
</body>
</html>
<?
}
?>

