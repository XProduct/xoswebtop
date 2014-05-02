<?

$username = $_POST['username'];
$password = $_POST['password'];

$connect = mysql_connect("localhost", "root", "8cEP4sttQ5g4");
if (!$connect)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("xoslogin", $connect);

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$password = md5($password);

$data = "";

$result = mysql_query("SELECT username, email FROM users WHERE username='" . $username . "' AND password='" . $password . "'") or die(mysql_error());
while($returnData = mysql_fetch_array($result))
{
	$data = $returnData['username'] . "," . $returnData['email'];
}

mysql_close($connect);

if ($data == "") {
	$data = "Incorrect Username or Password";	
}

print($data);

?>