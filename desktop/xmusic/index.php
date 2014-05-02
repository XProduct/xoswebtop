<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>xMusic.beta</title>
<?
include("../xoslogin/include/session.php");

if(!$session->logged_in){
	print "<meta http-equiv=\"refresh\" content=\"0;url=login/main.php\" />";
}
else {
?>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<!--HIDE SHOW 2.0-->
<script type="text/javascript">
function hide(x) {
	document.getElementById(x).style.visibility = 'hidden';
}
function show(x) {
	document.getElementById(x).style.visibility = 'visible';
}
</script>
<script type="text/javascript">
function checkChecked() {
	if(document.getElementById('shfl').checked) {
		hide('indicatorS');
	}
	else {
		show('indicatorS');
	}
}
</script>
<style type="text/css">
body {
	margin: 0px 0px 0px 0px;
	user-select: none;
	-webkit-user-select: none;
}
a:link {
	color: #000;
}
a:visited {
	color: #000;
}
a:hover {
	color: #000;
}
a:active {
	color: #000;
}
#player {
	padding: 10px 10px 10px 10px;
	background-color:#333333;
	height: 92px;
	box-shadow: #666 5px 8px 12px;
}
#handle {
	-webkit-appearance: none;
	background-color: transparent;
	position: absolute;
	top: -3px;
	left: -2px;
	width: 300px;
}
#handle::-webkit-slider-thumb {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #CCCCCC;
}
#handle::-webkit-slider-thumb:hover {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #575757;
}
#handle::-webkit-slider-thumb:active {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #60a6b3;
}
#volumeSlider {
	-webkit-appearance: none;
	background-color: transparent;
	position: absolute;
	top: -3px;
	left: -2px;
	width: 150px;
	z-index: 13;
}
#volumeSlider::-webkit-slider-thumb {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #CCCCCC;
}
#volumeSlider::-webkit-slider-thumb:hover {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #575757;
}
#volumeSlider::-webkit-slider-thumb:active {
	-webkit-appearance: none; 
	width: 10px;
	height: 22px;
	background-color: #60a6b3;
}
.selectsong:hover {
	text-decoration: none;
	color: #000;
	cursor: pointer;
	background-color: #999;
	width: 100%;
}
#share {
	color: #999;
	font-size: smaller;
}
</style>

</head>

<body>

<div id="player">
		<div id="controla" style="visibility: visible; position: absolute; top: 10px; left: 10px;">
		<img src="imgs/play.inactive.png" width="88" height="88"  id="play"
                                                     onMouseDown="this.src='imgs/play.active.png'"
                                                     onMouseUp="this.src='imgs/play.hover.png'" 
                                                     onmouseover="this.src='imgs/play.hover.png'"
										  			 onmouseout="this.src='imgs/play.inactive.png'">
        </div>
        <div id="controlb" style="visibility: hidden; position: absolute; top: 10px; left: 10px;">
		<img src="imgs/pause.inactive.png" width="88" height="88"  id="pause"
                                                     onMouseDown="this.src='imgs/pause.active.png'"
                                                     onMouseUp="this.src='imgs/pause.hover.png'" 
                                                     onmouseover="this.src='imgs/pause.hover.png'"
										  			 onmouseout="this.src='imgs/pause.inactive.png'">
        </div>
        <div id="controlc" style="position: absolute; top: 42px; left: 466px;">
        <img src="imgs/prev.inactive.png" width="36" height="36" id="prev"
        											 onMouseDown="this.src='imgs/prev.active.png'"
                                                     onMouseUp="this.src='imgs/prev.hover.png'" 
                                                     onmouseover="this.src='imgs/prev.hover.png'"
										  			 onmouseout="this.src='imgs/prev.inactive.png'">
        </div>
        <img id="indicatorS" src="imgs/active.png" width="36" height="36" style="position: absolute; top: 42px; left: 504px; visibility: hidden;">
        <label for="shfl" style="position: absolute; top: 42px; left: 504px;"><img src="imgs/shfl.inactive.png" width="36" height="36"
        											 onMouseDown="this.src='imgs/shfl.active.png'"
                                                     onMouseUp="this.src='imgs/shfl.hover.png'" 
                                                     onmouseover="this.src='imgs/shfl.hover.png'"
										  			 onmouseout="this.src='imgs/shfl.inactive.png'"
                                                     onClick="checkChecked();"></label>
        <input id="shfl" type="checkbox" style="position: absolute; visibility: hidden;">
        <div id="controld" style="position: absolute; top: 42px; left: 542px;">
        <img src="imgs/next.inactive.png" width="36" height="36" id="next"
        											 onMouseDown="this.src='imgs/next.active.png'"
                                                     onMouseUp="this.src='imgs/next.hover.png'" 
                                                     onmouseover="this.src='imgs/next.hover.png'"
										  			 onmouseout="this.src='imgs/next.inactive.png'">
        </div>
        <div id="songdetails" style="position: absolute; left: 106px; top: 18px;">
       	  <div id="title">&nbsp;</div>
          <div id="artist">Please Select a Song to Play.</div>
          <div id="album">&nbsp;</div>
        </div>
  <span id="timecode" style="position: absolute; top: 85px; left: 407px;">0:00</span>
		<div id="progressContainer" style="position: absolute; top: 84px; left:103px; width: 300px; height: 20px; background-color: #EEE;">
        	<input id="handle" type="range" min="0" value="0" max="100">
			<div id="progress" style="background-color: #CCC; height: 20px; width: 0px;"></div>
		</div>
        <div id="progressContainer" style="position: absolute; top: 84px; left:439px; width: 150px; height: 20px; background-color: #EEE;">
        	<img src="imgs/volume.indicator.png" width="18" height="18" style="position: absolute; top: 1px; left: 2px;">
            <input id="volumeSlider" type="range" min="0" max="100" value="50"/>
			<div id="indvol" style="background-color: #CCC; height: 20px; width: 0px;"></div>
		</div>
		<span id="volume"></span>
        <div id="logout" style="position: absolute; top: 5px; right: 5px;"><a href="login/process.php">Logout</a></div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
			// The play button also functions as pause button.
		$('#play').click(function(){
				song.play();
				show('controlb');
				hide('controla');
		});

		// The pause button
		$('#pause').click(function(){
			song.pause();
			show('controla');
			hide('controlb');
		});
		
		// The pause button
		$('#next').click(function(){
			song.pause();
			// Send the playhead back to the beginning
			
			if(!document.getElementById('shfl').checked) {
				var next = 1;
				var sum = Number(crt) + Number(next);
				var newSong = document.getElementById('s' + sum + '').getAttribute('onClick');
				window.location.href = 'javascript:' + newSong + '';
				//alert('javascript:' + newSong + '');
			}
			else if(document.getElementById('shfl').checked) {
				var total = document.getElementById('total').getAttribute('value');
				var next = Math.floor(Math.random() * total) + 1
				var newSong = document.getElementById('s' + next + '').getAttribute('onClick');
				window.location.href = 'javascript:' + newSong + '';
			}
		});
		
		$('#prev').click(function(){
			window.location.href = 'javascript:' + presong + '';
		});
		
		// The stop button
		$('#stop').click(function(){
			song.pause();
			// Send the playhead back to the beginning
			song.currentTime = 0;
		});
		$('.autoplay').click(function(){
			setTimeout('song.play();', 100);
			show('controlb');
			hide('controla');
		});
		// Take care of the volume slider
		$('#volumeSlider').change(function(){
			// Set the music volume based on the slider's position
			song.volume = $(this).val() / 100;			
		});
		//Take Care of Seek
		$('#handle').change(function() {
			//Change Position Of song
			song.currentTime = $(this).val() * song.duration / 100;
		});
		$('#handle').mouseup(function() {
			song.pause();
			song.play();
		});
	});

	var song = new Audio();
	
	function playI() {
				song.play();
				show('controlb');
				hide('controla');
	}
	
	function loadPlayer(src, id, title, artist, album){
		
		// Define our audio object
		song.setAttribute('src',src);
		
		crt = id; //Current Song
		tlt = title; //Title of Song
		art = artist;
		alb = album;
		/*if(lart > 27) {
			preartist = artist.substr(0,27)
			art = preartist+ "..."; //Artist of Song
		}
		else {
			art = artist;
		}
		if(lalb > 27) {
			prealbum = album.substr(0,27)
			alb = prealbum+ "..."; //Album of Song
		}
		else {
			alb = album;
		}*/
				
		song.play();
		
		//GIVE USER title and artist
		
		document.getElementById('title').innerHTML = tlt;
		document.getElementById('artist').innerHTML = art;
		document.getElementById('album').innerHTML = alb;
		
		$('#next').click(function(){
			presong = "loadPlayer('" + src + "', '" + crt + "', '" + tlt + "', '" + art + "', '" + alb + "')";
		});
		
		// Check to see if the track has stopped
		song.addEventListener('ended', function(){
			// Stop playing
			song.pause();
			
			presong = "loadPlayer('" + src + "', '" + crt + "', '" + tlt + "', '" + art + "', '" + alb + "')";
			//document.getElementById('previous').setAttribute('value', presong);
			
			if(!document.getElementById('shfl').checked) {
				var next = 1;
				var sum = Number(crt)+Number(next);
							previous = song;
				//alert(sum + " : " + next);
				var newSong = document.getElementById('s' + sum + '').getAttribute('onClick');
				//alert(newSong)
				window.location.href = 'javascript:' + newSong + '';
				//alert('javascript:' + newSong + '');
			}
			else if(document.getElementById('shfl').checked) {
				var total = document.getElementById('total').getAttribute('value');
				var next = Math.floor(Math.random() * total) + 1
							previous = song;
				var newSong = document.getElementById('s' + next + '').getAttribute('onClick');
				window.location.href = 'javascript:' + newSong + '';
				//alert('javascript:' + newSong + 'CHECKED');
			}
			else {
			song.currentTime = 0;
			show('controla');
			hide('controlb');		
			}
		}, false);
		
		// Display our progress bar
		song.addEventListener('timeupdate', function(){
			
			// How long is the track in seconds
			var length = song.duration;
			
			// Whereabouts are we in the track
			var secs = song.currentTime;
			
			// How far through the track are we?
			var progress = (secs / length) * 150;
			var traker = (secs / length) * 100;
			
			// Change the width of the progress bar
			$('#progress').css({'width' : progress * 2});
			$('#handle').val(traker)
			
			var tcMins = parseInt(secs/60);
			var tcSecs = parseInt(secs - (tcMins * 60));
			if (tcSecs < 10) { tcSecs = '0' + tcSecs; }
			$('#timecode').html(tcMins + ':' + tcSecs);
		}, false);
	}
</script>
<div id="contents" style="position: absolute; top: 120px;">
<table width="100%" border="0" cellspacing="10px">
  <tr>
    <th align="left" width="200px">
<? 

//GET SONG ID3 TAGS FROM FILE
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
/////////////////////////////////////////////////////////////////

// include getID3() library (can be in a different directory if full path is specified)
require_once('getid3/getid3/getid3.php');

// Initialize getID3 engine
$getID3 = new getID3;

$path = "/var/www/xos/files/uploads/$session->username/music";
$dir = opendir($path) or die("You are not part of the xMusic Beta");
$i = 1;

while (($file = readdir($dir)) !== false) {
	$FullFileName = realpath($path.'/'.$file);
	if ((substr($FullFileName, 0, 1) != '.') && is_file($FullFileName)) {
		set_time_limit(30);

		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		$artist = (!empty($ThisFileInfo['comments_html']['artist']) ? implode($ThisFileInfo['comments_html']['artist']) : 'unknown');
		$title = (!empty($ThisFileInfo['comments_html']['title'])  ? implode($ThisFileInfo['comments_html']['title'])  : 'unknown');
		$albumws = (!empty($ThisFileInfo['comments_html']['album']) ? implode($ThisFileInfo['comments_html']['album']) : 'unknown');
		
		//Escapes Slashes
		$album = addslashes($albumws);
		
		//echo("$title by $artist on $album <br>"); //FOR TEST 
		
		if($file == "." || $file == ".." || $file == "index.php" || $file == "shared.txt") 

        continue;
		
		if($title == 'unknown') {
			echo "<div class=\"selectsong\">";
			echo "<a id=\"s" . $i . "\" class=\"autoplay\" onClick=\"loadPlayer('http://xos.xproduct.net/files/uploads/$session->username/music/$file', '" . $i . "', '$file', '$artist', '$album')\">$file</a><br />"; 
			echo "</div>";
		}
		else {	
			echo "<div class=\"selectsong\">";
			echo "<a id=\"s" . $i . "\" class=\"autoplay\" onClick=\"loadPlayer('http://xos.xproduct.net/files/uploads/$session->username/music/$file', '" . $i . "', '$title', '$artist', '$album')\">$title</a><br />"; 
			echo "</div>";
		}
		$i++;
	}
}


// Close Uploaded Files Folder 
closedir($dir); 

echo("<p id=\"share\">Shared</p>");

$fileName = "/var/www/xos/files/uploads/$session->username/music/shared.txt";

if(file_exists($fileName)) {
	$song = fopen($fileName,'r');
	while(!feof($song)) { 
		$name = fgets($song);
		set_time_limit(30);
		
		$name = str_replace("\n",'',$name);
		$FullFileName = str_replace("http://xos.xproduct.net/","/var/www/xos/",$name);

		$ThisFileInfo = $getID3->analyze($FullFileName);

		getid3_lib::CopyTagsToComments($ThisFileInfo);

		// output desired information in whatever format you want
		$artist = (!empty($ThisFileInfo['comments_html']['artist']) ? implode($ThisFileInfo['comments_html']['artist']) : 'unknown');
		$title = (!empty($ThisFileInfo['comments_html']['title'])  ? implode($ThisFileInfo['comments_html']['title'])  : 'unknown');
		$albumws = (!empty($ThisFileInfo['comments_html']['album']) ? implode($ThisFileInfo['comments_html']['album']) : 'unknown');
		
		//Escapes Slashes
		$album = addslashes($albumws);
		
		//echo("$title by $artist on $album <br>"); //FOR TEST  
		
		if($file == "." || $file == ".." || $file == "index.php" || $file == "shared.txt") 

		continue;
		if(!$name == "") {
			echo "<a id=\"s" . $i . "\" class=\"autoplay\" onClick=\"loadPlayer('$name', '" . $i . "', '$title', '$artist', '$album')\">$title</a><br />"; 
		}
		$i++;
	}
}      

$fix = 1; //Subtracts the final i++ from the $sum
$sum = $i - $fix;

if($sum < 1) {
	echo("<p>Click the Storage Bar at the bottom of the screen to start uploading files.</p>");
}
else {
	echo("<input type=\"hidden\" id=\"total\" value=\"". $sum ."\"></input>");
}

?>
</th>
    <th>&nbsp;</th>
  </tr>
</table>

</div>

<div id="storage" style="position: absolute; bottom: 0px; right: 0px;">
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
				
				echo("<a id=\"actions\" onClick=\"show('backdrop'); show('info'); show('refreshChange')\" target=\"runtime\" href=\"upload/manage.php\" style=\"text-decoration: none;\">");
				echo("<progress min=\"0\" max=\"" . $all . "\" value=\"". round($total) ."\"></progress>");
				echo("&nbsp;Total: ". round($total) ." MB of " . $all . " MB</a>");
        }
        else
        {
                // error
                // either we can't execute du -s command (such as windows users) or the folder doesn't exist
                echo "There was an error while retrieving the size of your music folder.<br />";
        }
}
?>
</div>

<div id="backdrop" style="position: fixed; top: 0px; left: 0px; background-color:#111111; opacity: 0.8; width: 100%; height: 100%; z-index: 16; visibility: hidden;" onClick="hide('info'); hide('backdrop');"></div>

<div id="info" style="position: absolute; top: 50%; left: 50%; margin-left: -250px; margin-top: -350px; width: 500px; height: 700px; z-index: 999; background-color: #FFF; padding: 10px; border-radius: 7px; visibility: hidden;" onClick="show('refreshChange')">
<iframe id="runtime" height="680px" width="480px" frameborder="0"></iframe>
</div>

<div id="refreshChange" style="position: absolute; top: 112px; left: 50%; margin-left: -215px; background-color: #FC0; opacity: 0.8; border: medium #F30 solid; border-bottom-left-radius: 7px; border-bottom-right-radius: 7px; padding-left: 10px; padding-right: 10px; visibility: hidden;">
<p>You have managed your account <a href="#" onClick="window.location.reload()">refresh</a> to see new songs. <a href="#" onClick="hide('refreshChange')">Dismiss</a>
</div>

</body>
<?
}
?>
</html>
