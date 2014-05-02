<? ///////////////////////////////////////////////////////////////////
//																	//
//	xOS Notes PHP Library											//
//																	//
//	Brandon Davis - bdavis@xproduct.net  							//
//																 	//
//	GET Commands													//
//  																//
//																	//
//																	//
//																	//
//////////////////////////////////////////////////////////////////////


$id = $_GET['id'];
$owner = $_GET['owner'];
$title = $_GET['title'];
$content = $_GET['content'];
$type = $_GET['type'];

if (isset($type)) {
	switch ($type) {
		case "push":
			if (isset($id) && isset($owner) && isset($title) && isset($content)) {
				pushNotes($id, $owner, $title, $content);
			}
			break;
		case "pull":
			if (isset($owner)) {
				pullNotes($owner);
			}
			break;
		case "new":
			if (isset($owner) && isset($title) && isset($content)) {
				newNote($owner, $title, $content);
			}
			break;
		case "delete":
			if (isset($id)) {
				deleteNote($id);
			}
			break;	
		default:
			print("#_#The command '$type' was not reconized.");
			break;
	}
}
else {
	echo("#_#No command was specified in this command.");
}

function pushNotes($idS, $ownerS, $titleS, $contentS) { 
	$connect = mysql_connect("localhost", "root", "8cEP4sttQ5g4");
	if (!$connect)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("xosdata", $connect);
	
	$titleS = mysql_real_escape_string($titleS);
	$contentS = mysql_real_escape_string($contentS);
	
	mysql_query("UPDATE notes SET title='$titleS', content='$contentS', modified=NOW() WHERE noteID='$idS' AND owner='$ownerS'") or die(mysql_error());
	print("Note updated successfully. ($idS)");
	
	mysql_close($connect);
}

function pullNotes($ownerS) {
	$connect = mysql_connect("localhost", "root", "8cEP4sttQ5g4");
	if (!$connect)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("xosdata", $connect);
	
	$result = mysql_query("SELECT * FROM notes WHERE owner='$ownerS'");
	
	print('{ "notes": [ ');
	$noteList = "";
	
	while($note = mysql_fetch_array($result))
	{
		$noteList .= '{ "id":"' . $note['noteID'] . '","title":"' . $note['title'] . '","content":"' . $note['content'] . '"},';
	}
	
	$returnMessage = rtrim($noteList, ",");
	print($returnMessage);
	
	print(' ] }');
	
	
	mysql_close($con);
}

function newNote($ownerS, $titleS, $contentS) {
	$connect = mysql_connect("localhost", "root", "8cEP4sttQ5g4");
	if (!$connect)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("xosdata", $connect);
	
	$titleS = mysql_real_escape_string($titleS);
	$contentS = mysql_real_escape_string($contentS);
	
	mysql_query("INSERT INTO notes (noteID, title, owner, content, modified) VALUES (NULL, '$titleS', '$ownerS', '$contentS', NOW())") or die(mysql_error());
	$lastID = mysql_insert_id();
	print("Note inserted successfully. ($lastID)");
	
	mysql_close($connect);
}

function deleteNote($idS) {
	$connect = mysql_connect("localhost", "root", "8cEP4sttQ5g4");
	if (!$connect)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("xosdata", $connect);
	
	$idS = mysql_real_escape_string($idS);
	
	mysql_query("DELETE FROM notes WHERE noteID='$idS'") or die(mysql_error());
	print("Note deleted successfully. ($idS)");
	
	mysql_close($connect);
}

?>