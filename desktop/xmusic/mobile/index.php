<?
include("../../xoslogin/include/session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>xMusic</title>
<link rel="apple-touch-icon-precomposed" href="../imgs/index.png" />
<meta id="viewport" name="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="application/javascript" src="../js/iscroll-lite.js?v4"></script>
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

<script type="text/javascript">

var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper');
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

document.addEventListener('DOMContentLoaded', loaded, false);

</script>

<style type="text/css" media="all">
body,ul,li {
	padding:0;
	margin:0;
	border:0;
}

body {
	font-size:12px;
	-webkit-user-select:none;
    -webkit-text-size-adjust:none;
	font-family:helvetica;
}

#header {
	position:absolute; z-index:2;
	top:0; left:0;
	width:100%;
	height:45px;
	line-height:45px;
	background-color: #333;
	padding:0;
	color:#eee;
	font-size:20px;
	text-align:center;
}

#header a {
	color:#f3f3f3;
	text-decoration:none;
	font-weight:bold;
	text-shadow:0 -1px 0 rgba(0,0,0,0.5);
}

#wrapper {
	position:absolute; z-index:1;
	top:45px; bottom:48px; left:0;
	width:100%;
	background:#aaa;
	overflow:auto;
}

#scroller {
	position:absolute; z-index:1;
	-webkit-touch-callout:none;
	-webkit-tap-highlight-color:rgba(0,0,0,0);
	width:100%;
	padding:0;
}

#scroller ul {
	list-style:none;
	padding:0;
	margin:0;
	width:100%;
	text-align:left;
}

#scroller li {
	padding:0 10px;
	height:40px;
	line-height:40px;
	border-bottom:1px solid #ccc;
	border-top:1px solid #fff;
	background-color:#fafafa;
	font-size:14px;
}
body {
	margin: 0px 0px 0px 0px;
	user-select: none;
	-webkit-user-select: none;
}
#player {
	position: fixed;
	bottom: 0px;
	left: 0px;
	background-color:#333333;
	height: 45px;
	width: 100%;
	z-index: 12;
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
a:link {
	color: #000;
	text-decoration: none;
	cursor: pointer;
}
</style>

</head>

<body>

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
				var sum = crt+next;
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
		lart = artist.length;
		lalb = album.length;
		if(lart > 27) {
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
		}
				
		song.play();
		
		//GIVE USER title and artist
		
		document.getElementById('title').innerHTML = tlt;
		document.getElementById('artist').innerHTML = art;
		document.getElementById('album').innerHTML = alb;
		
		// Check to see if the track has stopped
		song.addEventListener('ended', function(){
			// Stop playing
			song.pause();
			// Send the playhead back to the beginning
			
			if(!document.getElementById('shfl').checked) {
				var next = 1;
				var sum = Number(crt)+Number(next);
				//alert(sum + " : " + next);
				var newSong = document.getElementById('s' + sum + '').getAttribute('onClick');
				//alert(newSong)
				window.location.href = 'javascript:' + newSong + '';
				//alert('javascript:' + newSong + '');
			}
			else if(document.getElementById('shfl').checked) {
				var total = document.getElementById('total').getAttribute('value');
				var next = Math.floor(Math.random() * total) + 1
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

<div id="header">xMusic.beta</div>
<div id="wrapper">
	<div id="scroller">
		<ul id="thelist">
            <? 

//GET SONG ID3 TAGS FROM FILE
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
/////////////////////////////////////////////////////////////////

// include getID3() library (can be in a different directory if full path is specified)
require_once('../getid3/getid3/getid3.php');

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
			echo "<li id=\"s" . $i . "\" class=\"autoplay\" onClick=\"loadPlayer('http://xos.xproduct.net/files/uploads/$session->username/music/$file', '" . $i . "', '$file', '$artist', '$album')\">$file</li>"; 
		}
		else {	
			echo "<li id=\"s" . $i . "\" class=\"autoplay\" onClick=\"loadPlayer('http://xos.xproduct.net/files/uploads/$session->username/music/$file', '" . $i . "', '$title', '$artist', '$album')\">$title</li>"; 
		}
		$i++;
	}
}


// Close Uploaded Files Folder 
closedir($dir); 

echo("<li id=\"share\">Shared</li>");

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
			echo "<li id=\"s" . $i . "\" class=\"autoplay\" onClick=\"loadPlayer('$name', '" . $i . "', '$title', '$artist', '$album')\">$title</li>"; 
		}
		$i++;
	}
	fclose($file);
} 
else {
    echo('Nobody is Sharing Songs with You.');
}       

$fix = 1; //Subtracts the final i++ from the $sum
$sum = $i - $fix;

if($sum < 1) {
	echo("<p>Use the desktop version to upload Music.</p>");
}
else {
	echo("<input type=\"hidden\" id=\"total\" value=\"". $sum ."\"></input>");
}

?>
		</ul>
	</div>
</div>

<div id="player">
		<div id="controla" style="visibility: visible; position: absolute; top: 5px; left: 5px;">
		<img src="../imgs/play.inactive.png" width="36" height="36"  id="play"
                                                     onTouchStart="this.src='../imgs/play.active.png'"
										  			 onTouchEnd="this.src='../imgs/play.inactive.png'">
        </div>
        <div id="controlb" style="visibility: hidden; position: absolute; top: 5px; left: 5px;">
		<img src="../imgs/pause.inactive.png" width="36" height="36"  id="pause"
                                                     onTouchStart="this.src='../imgs/pause.active.png'"
										  			 onTouchEnd="this.src='../imgs/pause.inactive.png'">
        </div>
        <img id="indicatorS" src="../imgs/active.png" width="36" height="36" style="position: absolute; top: 5px; left: 51px; visibility: hidden;">
        <label for="shfl" style="position: absolute; top: 5px; left: 51px;"><img src="../imgs/shfl.inactive.png" width="36" height="36"
        											 onTouchStart="this.src='../imgs/shfl.active.png'"
										  			 onTouchEnd="this.src='../imgs/shfl.inactive.png'"
                                                     onClick="checkChecked();"></label>
        <input id="shfl" type="checkbox" style="position: absolute; visibility: hidden;">
		<div id="progressContainer" style="position: absolute; top: 15px; left:111px; width: 200px; height: 20px; background-color: #EEE;">
        	<!--<input id="handle" type="range" min="0" value="0" max="100">-->
		  <div id="progress" style="background-color: #CCC; height: 20px; width: 0px;"></div>
		</div>
</div>

</body>
</html>
