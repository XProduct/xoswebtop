// JavaScript Document
////// CONSOLE CLASS /////////////////////////////////////////////////
//																	//
//																	//
//																	//
//																	//
//																	//
//																	//
//////////////////////////////////////////////////////////////////////

//// PROCESS COMMAND ////
// Takes the command and arguements and forms a function
/////////////////////////
var command = "";
			
function startCommand(e) {
	var unicode = e.keyCode? e.keyCode : e.charCode
	if(unicode == "13") 
	{
		var cursorPosition = document.getElementById('consoleTerminal').value.split("\n").length
		var lastLine = Number(cursorPosition) - Number(2); 
		command = document.getElementById("consoleTerminal").value.split("\n")[Number(lastLine)];
		processCommand();
	}
	if(unicode == "38")
	{
		document.getElementById('consoleTerminal').value += command;
	}
}

function processCommand() {
	var currentProcess = command.trim();
	
	if(currentProcess == "")
	{
		report("");
	}
	else if(currentProcess.length > 0)
	{
		var args = currentProcess.substring((currentProcess.indexOf(" ") + 1), currentProcess.length).split(" ");;
		var currentCmd = currentProcess.substring(0, currentProcess.indexOf(" "));
		try {
			window[currentCmd]("", args);
		}
		catch(e) {
			report("The command '" + currentProcess + "' has the following error: \n\n" + e + "\n");
		}
	}
	else
	{
		report("An unknown error has occured.");
	}
}

function report(text) {
	document.getElementById('consoleTerminal').value += text + "\n";
}

//// GLOBAL COMMANDS ////
// All the basic commands used in xOS Webtop
/////////////////////////

var confirmDialogInterval = null;

function run(id, args) {
	if (id != "" || id == null) {
		if (document.getElementById(id) != null) {
			document.getElementById(id).style.display = 'block';
			windowClick(event, id);
			//for (var r = 0; r < args.length; r++) {
				//alert(args[r]);
			//}
			return;
		}
		else {
			report("No Application for Window ID '" + id + "'.");	
			return;
		}
	}
	
	if (args === "undefined" || args == null || args.length == 0) {
		report("RUN requires at least one parameter of window 'id' name. EX. run idofwindow");	
		return;
	}
	for (var i = 0; i < args.length; i++) {
		report("");
		if (document.getElementById(args[i]) != null) {
			document.getElementById(args[i]).style.display = 'block';
			windowClick(event, args[i]);
			//for (var r = 0; r < args.length; r++) {
				//alert(args[r]);
			//}
		}
		else {
			report("No Application for Window ID '" + args[i] + "'.");	
			return;
		}
	}
}
function exit(id, args) {
	if (id != "" || id == null) {
		if (document.getElementById(id) != null) {
			document.getElementById(id).style.display = 'none';
			windowClick(event, id);
			//for (var r = 0; r < args.length; r++) {
				//alert(args[r]);
			//}
			return;
		}
		else {
			report("No Application for Window ID '" + id + "'.");	
			return;
		}
	}
	
	if ((args === "undefined" || args == null || args.length == 0) && id == "") {
		report("RUN requires at least one parameter of window 'id' name. EX. run idofwindow");	
		return;
	}
	for (var i = 0; i < args.length; i++) {
		report("");
		if (document.getElementById(args[i]) != null) {
			document.getElementById(args[i]).style.display = 'none';
			windowClick(event, args[i]);
			//for (var r = 0; r < args.length; r++) {
				//alert(args[r]);
			//}
		}
		else {
			report("No Application for Window ID '" + args[i] + "'.");	
			return;
		}
	}
}
function time(id, args) {
	if ((args === "undefined" || args == null || args.length == 0) && id == "") {
		report("RUN requires at least one parameter of window 'id' name. EX. run idofwindow");	
		return;
	}
	var actualDate = new Date();
	for (var i = 0; i < args.length; i++) {
		switch (args[i]) {
			case "current":
				var date = new Date();
				report("Current Time: " + date);	
				break;
			case "tomorrow":
				var date = new Date(actualDate.getFullYear(), actualDate.getMonth(), actualDate.getDate() + 1);
				report("Tomorrow Time: " + date);	
				break;
			case "yesterday":
				var date = new Date(actualDate.getFullYear(), actualDate.getMonth(), actualDate.getDate() - 1);
				report("Yesterday Time: " + date);	
				break;
			default:
				report("The arguement '" + args[i] + "' was not valid.");	
				break;
		}
	}
}

function updateTime() {
	var date = new Date();
	var hour = date.getHours();
	var minute = date.getMinutes();
	var second = date.getSeconds();
	var dd = "AM"
	
	if (hour >= 12) {
        hour = (hour - 12);
        dd = "PM";
    }
    if (hour == 0) {
        hour = 12;
    }
	minute = minute<10?"0"+minute:minute;
    second = second<10?"0"+second:second;
	
	if (document.getElementById('mainToolbarClock').innerHTML.indexOf("class=\"clockSpacer\"") != -1) {
		document.getElementById('mainToolbarClock').innerHTML = "<span>" + hour + "<span>:</span>" + minute + " " + dd + "</span>";
	}
	else {
		document.getElementById('mainToolbarClock').innerHTML = "<span>" + hour + "<span class=\"clockSpacer\">:</span>" + minute + " " + dd + "</span>";
	}
}

function askLogoff() {
	document.getElementById('confirmDialog').style.display = "block";
	document.getElementById('confirmDialogText').innerHTML = "Are you sure you would like to log off?";
	document.getElementById('confirmDialogAction').innerHTML = "Log Off";
	document.getElementById('confirmDialogCaption').innerHTML = "If you do nothing, you will be logged off automatically in <span id=\"confirmDialogCountdown\">60</span> seconds."
	document.getElementById('confirmDialogAction').setAttribute('onclick', 'logoff()');
	var i = 60;
	var confirmDialogInterval = setInterval(function () {
		i--;
		document.getElementById('confirmDialogCountdown').innerHTML = i.toString();
		if (i == 0) {
			logoff();
		}
	}, 1000);
}

function toggleLeap() {
	var leap = document.getElementById('leapList');
	if(leap.className != "active") {
		leap.className = "active"
	}
	else {
		leap.className = ""
	}
}

function logoff() {
	window.location = "CORE/login/index.php";
}

function cancelConfirm() {
	clearInterval(confirmDialogInterval);
	document.getElementById('confirmDialog').style.display = "none";
}

// Depreciated Commands
function close() { report("The 'close()' command is depreciated. Please use the 'exit('id of element')' command instead."); return false; }