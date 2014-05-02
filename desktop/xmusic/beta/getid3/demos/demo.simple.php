<?php
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
/////////////////////////////////////////////////////////////////

// include getID3() library (can be in a different directory if full path is specified)
require_once('../getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;

$DirectoryToScan = '/var/www/xos/files/uploads/BDavis/music'; // change to whatever directory you want to scan
$dir = opendir($DirectoryToScan);

while (($file = readdir($dir)) !== false) {
	$FullFileName = realpath($DirectoryToScan.'/'.$file);
	if ((substr($FullFileName, 0, 1) != '.') && is_file($FullFileName)) {
		set_time_limit(30);

		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		$artist = (!empty($ThisFileInfo['comments_html']['artist']) ? implode($ThisFileInfo['comments_html']['artist']) : 'UNKNOWN');
		$title = (!empty($ThisFileInfo['comments_html']['title'])  ? implode($ThisFileInfo['comments_html']['title'])  : 'UNKNOWN');
		
		echo($title . " by " . $artist . "<br>");
	}
}

?>
</body>
</html>