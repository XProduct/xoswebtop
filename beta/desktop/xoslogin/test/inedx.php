<?

if(isset($_POST['submit']))
{
   	$username = $_POST['username'];
	$password = $_POST['password'];
    
	$connection = mysql_connect("localhost", "root", "8cEP4sttQ5g4") or die(mysql_error());
    mysql_select_db("test", $connection) or die(mysql_error());
	
	$queryString = "SELECT * FROM users WHERE password=" . $password;
	
	$result = mysql_query($queryString);
	
	if (!$result) {
		die('Invalid query: ' . mysql_error() . "      " . $queryString);
	}
	
	echo mysql_result($result, 0, 0);
	
	mysql_close($connection);
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Injection Test</title>
</head>

<body>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    Username:<input type="text" id="username" name="username"><br>
    Password:<input type="text" id="password" name="password"><br>
	<input type="submit" name="submit" value="Submit"><br>

</form>


</body>
</html>