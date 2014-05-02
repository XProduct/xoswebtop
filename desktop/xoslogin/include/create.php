<? include("session.php"); ?>

<?
$path = $_SERVER['DOCUMENT_ROOT'] . '/files/uploads/';

	$dirName = $session->username;
 
	// first validate the value:
	if ($dirName !== false && preg_match('~([^A-Z0-9]+)~i', $dirName, $matches) === 0) {
		// We have a valid directory:
		if (!is_dir($path . $dirName)) {
			// We are good to create this directory:
			if (mkdir($path . $dirName, 0777)) {
				echo "Your directory has been created succesfully!<br /><br />";
			}else {
				echo "Unable to create dir {$dirName}.";
			}
		}else {
			echo "Directory {$dirName} already exists.";
		}
	}else {
		// Invalid data, htmlenttie them incase < > were used.
		$dirName = htmlentities($dirName);
		echo "You have invalid values in {$dirName}.";
	}
?>