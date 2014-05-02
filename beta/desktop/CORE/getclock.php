<?
include("../xoslogin/include/session.php");
?>
<?php $con = mysql_connect("localhost","root","password_here");

if (!$con) { die('Could not connect: ' . mysql_error());
} mysql_select_db("xosdata", $con);
 $result = mysql_query("SELECT * FROM userdata WHERE user='$session->username'");
	while($row = mysql_fetch_array($result)) {
	echo $row['clock'];
} mysql_close($con); ?>