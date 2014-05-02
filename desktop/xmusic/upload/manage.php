<?
include("../../xoslogin/include/session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Manage Account Storage</title>
</head>

<body>
<h2>Manage Account Storage</h2>
<p>Hello, <? echo $session->username ?>!</p>
<p>
<?php
// we need to get what type of account they have
$con = mysql_connect("localhost","root","grammy27");

if (!$con) { die('Could not connect: ' . mysql_error());
} mysql_select_db("xosdata", $con);
 $result = mysql_query("SELECT * FROM userdata WHERE user='$session->username'");
	while($row = mysql_fetch_array($result)) {
	$all = $row['store'];
} mysql_close($con); 

// we need the full path to the folder we want to find the size of
//      below we result in a folder path of /var/www/mywebsite/html/files
$folder = $_SERVER['DOCUMENT_ROOT'].'/files/uploads/' .$session->username. '/music';

// now prevent malicious attacks since we are executing a shell command
$folder = escapeshellcmd($folder);

// make sure this is a folder
if( ! is_dir($folder) )
{
        echo "$folder is not a folder.<br />";
}
// if we could find the pattern of our command du -s
else
{
        // we execute du (disk usage) to find out the folder size
        //      notice we use the execution operator (the key to the left of 1 on your keyboard)
        //      this is the same as the php function shell_exec()
        //      you can add the -h flaf to the below command to format the file size into MB, GB, etc.
        //              i.e. `du -sh $folder`;
        $output = `du -s $folder`;

        if( preg_match('/([0-9]+)(\t.*)/',$output,$match) )
        {
                $size = $match[1];
				$total = $size / 1024;
				
				echo("You have a total of ". round($total) ." MB out of " . $all . " MB ");
        
		}
        else
        {
                // error
                // either we can't execute du -s command (such as windows users) or the folder doesn't exist
                echo "There was an error while retrieving the size of your music folder.<br />";
        }
}
?>
</p>
<p>&nbsp;</p>
<p><a href="add.music.php">Add Music to Your Library</a></p>
<p><a href="delete.music.php">Delete Music from your Library</a></p>
<p><a href="share.music.php">Share Music from your Library</a></p>
<p><a href="share.remove.php">Remove Songs People Have Shared With You</a></p>


<p>&nbsp;</p>
<p>Need more storage? <a href="http://xos.xproduct.net/donate.php">Donate</a> and we will give you a Gigabyte of storage.</p>
</body>
</html>