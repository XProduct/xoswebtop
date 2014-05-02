<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$string = 'line 1:
  line 2:
  line 3:
  line 4:';
echo 'Original $string: <br><textarea cols="40" rows="7">'.$string.'</textarea><br>';
$string = str_replace("\r\n",'',$string);
echo '<br>$string without new line: <br><textarea cols="40" rows="7">'.$string.'</textarea>';
?>
</body>
</html>