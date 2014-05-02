<?

$usernameGet = $_GET['user'];

$sidString = "uECjRGn0fhn12H0MO4VFj5wiVHo5hQ91XeJoRd3JbsB4ElRKtUWeXD3tJ7C38N35vhfQtcxDBqd5g7rMTIt0rPLcEvUqqDEV3xOSP2sN9cbmqMofrAwugmWAOf1HEk9ev35EcKXMSOVjeGHvCuWV8Y4EkEsVqeeffh5mPPQsaQYjnwfPzNZZhg7J5PraGzaQdRm8buB7VMiq0das0g9VfABLbSYmXfMHdoKmXys2mOAqhsPYV6qGmsHwIxMlboJ3";

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password_here';
$dbname = 'xoslogin';

//Connecting to DB
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error Connecting to mySQL');
mysql_select_db($dbname);

$query  = "SELECT password FROM users WHERE username='" . $usernameGet . "'";
$result = mysql_query($query);
if($result != "") {
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	echo "<MessageXML>";
	while($row = mysql_fetch_array($result))
	{
		 echo "<Data>";
		 echo "<SID>" . $sidString . "</SID>";
		 echo "<Password>" . $row['password'] . "</Password>";
		 echo "</Data>";
	} 
	echo "</MessageXML>";
}
else {
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	echo "<MessageXML>";
	echo "<Data>";
	echo "<SID>" . $sidString . "</SID>";
	echo "<Password></Password>";
	echo "</Data>";
	echo "</MessageXML>";	
}
mysql_close($conn);
?>