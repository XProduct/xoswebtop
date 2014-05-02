<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pictures</title>
<?
include("../../xoslogin/include/session.php");
?>
<script src="../scripts/windows/hideshowwindows.js" type="text/javascript"></script>
<script type="text/javascript">
function Browser() {

  var ua, s, i;

  this.isIE    = false;
  this.isNS    = false;
  this.version = null;

  ua = navigator.userAgent;

  s = "MSIE";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isIE = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  s = "Netscape6/";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = parseFloat(ua.substr(i + s.length));
    return;
  }

  // Treat any other "Gecko" browser as NS 6.1.

  s = "Gecko";
  if ((i = ua.indexOf(s)) >= 0) {
    this.isNS = true;
    this.version = 6.1;
    return;
  }
}

var browser = new Browser();

function contextMenu(event, id) {

var x, y; //x is left, y is top, like a grid

	if (browser.isIE) {
		x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
		y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
	}
	if (browser.isNS) {
		x = event.clientX + window.scrollX;
		y = event.clientY + window.scrollY;
	}

	var curLpost = document.getElementById(id).style.left = x + 'px';
	var curTpost = document.getElementById(id).style.top = y + 'px';
	
	//alert(x + 'px, ' + y + 'px')
	
	showDiv(id);

}
function dismissMenu() {
	
	var total = document.getElementById('total').value;
	
	while(total != 0) {
		hideDiv(total);
		total = Number(total) - 1;
		
	}
	hideDiv('contextDismiss')
}
</script>
<script type="text/javascript" src="../scripts/pixlr.js"></script>
<style type="text/css">
body {
	background-color: #5e5e5e;
}
.fullmenu {
	position: absolute;
	top: 77px;
	left: 120px;
	visibility: hidden;
	background-color: #EEE;
	border: thin solid #111;
	width: 130px;
	z-index: 9999;
	padding-top: 10px;
	padding-bottom: 10px;
}
.contextEntry {
	width: 100%;
	cursor: default;
}
.contextEntry:hover {
	background-color: #4ba0bd;
	box-shadow: #666 0px 2px 4px;
	color: #EEE;
}
.contextEntryDisabled {
	width: 100%;
	color: #444;
	cursor: default;
}
a:link {
	color: #00F;
}
a:visited {
	color: #00F;
}
a:hover {
	color: #00F;
}
a:active {
	color: #00F;
}
</style>
</head>

<body onContextMenu="return false;">
<p>Your Uploaded Images:</p>
<hr>
<br>
<?
// Define the full path to your folder from root 
    $path = "/var/www/xos/files/uploads/$session->username"; 
	
	//Defintions
	
	$savePath = str_replace("/var/www/xos", "", dirname(__FILE__));
	//$path = "/var/www/xos/files/uploads/BDavis"; 
	$i = 1;

    // Open the folder 
    $dir_handle = @opendir($path); 

    // Loop through the files 
    while ($file = readdir($dir_handle)) { 

    if($file == "." || $file == ".." || $file == "index.php" || $file == "music") 

        continue; 
        //echo "<a href=\"#\" onClick=\"openFileContents($i)\">$file</a><br>"; 
		//$name = "/var/www/xos/files/uploads/$session->username/$file";
		$name = "/var/www/xos/files/uploads/$session->username/$file";
		$ext = substr($file, -4, 4);
		if($ext == ".jpg" || $ext == ".jpeg" || $ext == ".gif" || $ext == ".png" || $ext == ".bmp" || $ext == ".psd" || $ext == ".pxd") {
			echo("&nbsp;&nbsp;&nbsp;<a href=\"#\" onClick=\"pixlr.edit({image:'http://xos.xproduct.net/files/uploads/$session->username/$file', title:'$file', service:'editor', exit:'http://xos.xproduct.net" . $_SERVER['PHP_SELF'] . "', target:'http://xos.xproduct.net" . $savePath . "/editorSave.php', wmode:'transparent'});\" oncontextmenu=\"showDiv('contextDismiss'); contextMenu(event, 'menu$i'); return false;\">$file</a><br>");
			echo("<div id=\"menu$i\" class=\"fullmenu\" onClick=\"hideDiv('menu$i'); hideDiv('contextDismiss');\">");
			echo("<div class=\"contextEntryDisabled\">&nbsp;&nbsp;&nbsp;Cut</div>");
			echo("<div class=\"contextEntryDisabled\">&nbsp;&nbsp;&nbsp;Copy</div>");
			echo("<div class=\"contextEntryDisabled\">&nbsp;&nbsp;&nbsp;Paste</div>");
			echo("<div><hr></div>");
			echo("<div class=\"contextEntry\" onClick=\"pixlr.edit({image:'http://xos.xproduct.net/files/uploads/$session->username/$file', title:'$file', service:'express', exit:'http://xos.xproduct.net" . $_SERVER['PHP_SELF'] . "', target:'http://xos.xproduct.net" . $savePath . "/editorSave.php', wmode:'transparent'});\">&nbsp;&nbsp;&nbsp;Express Edit</div>");
			echo("<div class=\"contextEntry\" onClick=\"pixlr.edit({image:'http://xos.xproduct.net/files/uploads/$session->username/$file', title:'$file', service:'editor', exit:'http://xos.xproduct.net" . $_SERVER['PHP_SELF'] . "', target:'http://xos.xproduct.net" . $savePath . "/editorSave.php', wmode:'transparent'});\">&nbsp;&nbsp;&nbsp;Full Editor</div>");
			echo("<div><hr></div>");
			echo("<div class=\"contextEntry\" onClick=\"window.location.href = 'download.php?file=$path/$file&name=$file';\">&nbsp;&nbsp;&nbsp;Download</div>");
			echo("<div class=\"contextEntry\" onClick=\"hideDiv('menu$i');\">&nbsp;&nbsp;&nbsp;Dismiss</div>");
			echo("</div>");
		}
		$i++;
		
    } 

	echo("<input type=\"hidden\" id=\"total\" value=\"$i\">");

    // Close 
    closedir($dir_handle); 
?>

<div id="contextDismiss" style="width: 100%; height: 100%; position: absolute; top: 0px; left: 0px; visibility: hidden; z-index: 9998;" onClick="dismissMenu()" onContextMenu="return false;"></div>

<p>&nbsp;</p>
<p>Click Link to open in full editor mode or right-click for more options.</p>
<p>&nbsp;</p>

</body>
</html>