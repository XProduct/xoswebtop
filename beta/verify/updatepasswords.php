<?
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '8cEP4sttQ5g4';
$dbname = 'xoslogin';

//Connecting to DB
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error Connecting to mySQL');
mysql_select_db($dbname);

$old = md5("grammy27"); //md5 version
$hash = hash("sha512", "grammy27"); //sha512 version

echo $old;
echo "<br>";
echo $hash;

//$query  = "SELECT password FROM users WHERE username='BDavis'";
//$result = mysql_query($query);

//if($result != "") {
//	while($row = mysql_fetch_array($result))
//	{
		//echo $row['password'];
		
		//$_POST["pass"] == $row['password']
		
//		$old = md5($row['password']); //md5 version
//		$hash = hash("sha512", $row['password']); //sha512 version
		
//		echo $hash;
		//mysql_query("UPDATE users SET password='$hash' WHERE password='$old'");
//	} 
//}
//else {
//	echo "FAILED";
//}
?>