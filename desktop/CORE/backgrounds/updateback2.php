<?
include("../../xoslogin/include/session.php");
?>
<?php
$con = mysql_connect("localhost","root","password_here");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("xosdata", $con);

mysql_query("UPDATE userdata
SET back = '2' 
WHERE user = '$session->username'");
{
echo "Successfully updated background to background 2. No Errors.";	
}

mysql_close($con);
?>