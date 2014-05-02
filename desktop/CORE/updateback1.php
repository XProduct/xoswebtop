<?php
$con = mysql_connect("localhost","root","grammy27");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("xosdata", $con);

mysql_query("UPDATE userdata SET back = '0'
WHERE user = '$session->username'");

mysql_close($con);
?>