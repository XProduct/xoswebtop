<?
function chgClock() {
$con = mysql_connect("localhost","root","password_here");
			if (!$con)
 		{
  			die('Could not connect: ' . mysql_error());
  		}

		mysql_select_db("xosdata", $con);
		
		$sbg="UPDATE userdata
			SET back = '$_POST[user]' 
			WHERE user = '$_POST[clock]'";

		if (!mysql_query($sbg,$con))
		
		mysql_close($con);
		
header("Location: ../userhelp.php");
}
function chgBack() {
	$con = mysql_connect("localhost","root","password_here");
			if (!$con)
 		{
  			die('Could not connect: ' . mysql_error());
  		}

		mysql_select_db("xosdata", $con);
		
		$sbg="UPDATE userdata
			SET back = '$_POST[user]' 
			WHERE user = '$_POST[back]'";

		if (!mysql_query($sbg,$con))
		
		mysql_close($con);
		
header("Location: ../userhelp.php");
}
?>