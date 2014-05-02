<?php
$con = mysql_connect("10.10.10.3","xproduc2_admin","grammy27");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("xproduc2_feedback", $con);

$sql="INSERT INTO fbdescribe (DESCRIBE)
VALUES
('$_POST[fbwrite]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Your feedback was sucessfully added to the database. Thank You for your Feedback.";

mysql_close($con)
?>