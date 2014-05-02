<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
<style type="text/css">
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
	color: #0000FF;
}
a:visited {
	color: #0000FF;
}
a:hover {
	color: #0000FF;
}
a:active {
	color: #FF0000;
}
</style>
</head>

<body>
<table width="100%" height="260px" border="0">
  <tr>
    <td width="200px" ><p style="position: absolute; top: 0px; left: 0px;">
    	<div id="menu" class="fullmenu" onClick="hideDiv('menu'); hideDiv('contextDismiss');">");
		<div class="contextEntryDisabled">&nbsp;&nbsp;&nbsp;Cut</div>
		<div class="contextEntryDisabled">&nbsp;&nbsp;&nbsp;Copy</div>
		<div class="contextEntryDisabled">&nbsp;&nbsp;&nbsp;Paste</div>
		<div><hr></div>
		<div class="contextEntry" onClick="window.location.href = 'list.php';">&nbsp;&nbsp;&nbsp;Refresh</div>
		</div>
<? 
// Handle User *Input Uncomment to use*
// $dirName = isset($_POST['dirName'])?$_POST['dirName']:false;
/** 
 * Change the path to your folder. 
 * 
 * This must be the full path from the root of your 
 * web space. If you're not sure what it is, ask your host. 
 * 
 * Name this file index.php and place in the directory. 
 */ 

    // Define the full path to your folder from root 
    $path = "/var/www/xos/files/uploads/$session->username"; 
	$i = 1;
	
    // Open the folder 
    $dir_handle = @opendir($path) or die("Unable to open $session->username's Upload Folder.<br>Error Code 17: 404 Not Found; To create Upload Directory contact the adminisrator."); 

    // Loop through the files 
    while ($file = readdir($dir_handle)) { 

    if($file == "." || $file == ".." || $file == "index.php" || $file == "music") 

        continue; 
        echo("<a href=\"http://xos.xproduct.net/files/uploads/$session->username/$file\" oncontextmenu=\"showDiv('contextDismiss'); contextMenu(event, 'menu$i'); return false;\" target=\"viewer\">$file</a><br />"); 
		echo("<div id=\"menu$i\" class=\"fullmenu\" onClick=\"hideDiv('menu$i'); hideDiv('contextDismiss');\">");
		echo("<div class=\"contextEntryDisabled\">&nbsp;&nbsp;&nbsp;Cut</div>");
		echo("<div class=\"contextEntryDisabled\">&nbsp;&nbsp;&nbsp;Copy</div>");
		echo("<div class=\"contextEntryDisabled\">&nbsp;&nbsp;&nbsp;Paste</div>");
		echo("<div><hr></div>");
		echo("<form id=\"delete$i\" method=\"post\" action=\"delete.php\"><input type=\"hidden\" name=\"filetodel\" value=\"/var/www/xos/files/uploads/$session->username/$file\"></form>");
		echo("<div class=\"contextEntry\" onClick=\"document.getElementById('delete$i').submit()\">&nbsp;&nbsp;&nbsp;Delete</div>");
		echo("<div><hr></div>");
		echo("<div class=\"contextEntry\" onClick=\"window.location.href = 'download.php?file=$path/$file&name=$file';\">&nbsp;&nbsp;&nbsp;Download</div>");
		echo("<div class=\"contextEntry\" onClick=\"hideDiv('menu$i');\">&nbsp;&nbsp;&nbsp;Dismiss</div>");
		echo("</div>");
	
	$i++;
    } 
	
	echo("<input type=\"hidden\" id=\"total\" value=\"$i\">");

    // Close 
    closedir($dir_handle); 

?></p>
</td>
<td>
<iframe width="100%" height="100%" id="viewer" allowtransparency src="notice.html" frameborder="0"> </iframe>
</td>
  </tr>
</table>

<div id="contextDismiss" style="width: 100%; height: 100%; position: absolute; top: 0px; left: 0px; visibility: hidden; z-index: 9998;" onClick="dismissMenu()" onContextMenu="return false;"></div>

</body>
</html>