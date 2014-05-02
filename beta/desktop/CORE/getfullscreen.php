<?
include("../xoslogin/include/session.php");
?>
<?php $con = mysql_connect("localhost","root","8cEP4sttQ5g4");

if (!$con) { die('Could not connect: ' . mysql_error());
} mysql_select_db("xosdata", $con);
 $result = mysql_query("SELECT * FROM userdata WHERE user='$session->username'");
	while($row = mysql_fetch_array($result)) {
	echo $row['full'];
} mysql_close($con); ?>