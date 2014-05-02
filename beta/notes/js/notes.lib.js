// JavaScript Document////////////////////////////////////////
//	notes.lib.js											//
//															//
//	Written by Brandon Davis (bdavis@xproduct.net)			//
//															//
//	May use with written credit to author of script.        //
//	Edits may be made without permission. Still must 		//
//	include credit to author.								//
//															//
//////////////////////////////////////////////////////////////

var touchMoveNow = false;
var currentLi = "";
var currentUser = "";
var sendNotes = new Array();

function openNote(id) 
{
	if (touchMoveNow == false) {
		//This is where the note gets opened
		var noteObject = localStorage.getItem(id);
		if (noteObject != null) {
			var note = JSON.parse(noteObject);
			document.getElementById('inNoteHeader').innerHTML = note.title;
			document.getElementById('theNoteContent').innerHTML = note.content;
			document.getElementById('currentNoteUID').value = id;
		}
		else {
			document.getElementById('inNoteHeader').innerHTML = "New Note";
			document.getElementById('theNoteContent').innerHTML = "";
			document.getElementById('currentNoteUID').value = "new" + (countNewNotes() + 1);
		}
		document.getElementById('note').className = "active";
	}
	if (currentLi != "") { document.getElementById(currentLi).style.backgroundColor = "#FAFAFA"; }
	currentLi = "";
	touchMoveNow = false;
}

function doFocus(id) {
	document.getElementById('note_' + id).style.backgroundColor = "#2F7199";
	currentLi = "note_" + id; 
}

function logTouchMove() {
	touchMoveNow = true;
	if (currentLi != "") {
		document.getElementById(currentLi).style.backgroundColor = "#FAFAFA";
	}
}

function storeNote() {
	var id = document.getElementById('currentNoteUID').value;
	var note = JSON.parse(localStorage.getItem(id));
	if (note != null) {
		note.title = document.getElementById('inNoteHeader').innerHTML;
		note.content = document.getElementById('theNoteContent').innerHTML;
		localStorage.setItem(id, JSON.stringify(note));
	}
	else {
		note = { "id": id, "title": "", "content": "" };	
		note.title = document.getElementById('inNoteHeader').innerHTML;
		note.content = document.getElementById('theNoteContent').innerHTML;
		localStorage.setItem(id, JSON.stringify(note));
	}
}

function newNote() {
	openNote("%%%");
}

function deleteNote() {
	var id = document.getElementById('currentNoteUID').value;
	localStorage.removeItem(id);
	deleteServerNotes(id);
}

function countNotes() {
	var j = 0;
	for(var i in localStorage)
	{
		j++;
	}
	return j;
}

function countNewNotes() {
	var j = 1;
	for(var lItem in localStorage)
	{
		if (lItem.substring(0, 3) == "new") {
			j++;	
		}
	}
	return j;
}

function sendNewNote(id) {
	var j = 1;
	for(var lItem in localStorage)
	{
		if (lItem.substring(0, 3) == "new") {
			var params = "";
			
			var note = JSON.parse(localStorage.getItem(lItem));
			sendNotes.push(note);
			
			//Send it off to the server
			sendNewServerNote();
			j++;	
		}
	}
	return j;
}

function sendNote(id) {
	var note = JSON.parse(localStorage.getItem(id));
	sendServerNote(note);
}

function loadNotes() {
	var list = "";
	
	var keys = new Array();
	
	for(var i = 0, l = localStorage.length; i < l; i++) {
		var k = localStorage.key(i);
		keys.push(k);
	}
	
	for(var key in keys)
	{
		if (keys[key].substring(0, 2) == "nt" || keys[key].substring(0, 3) == "new") {
			var note = JSON.parse(localStorage[keys[key]]);
			var noteTitle = note.title;
			var noteID = keys[key].trim();
			
			if (is_touch_device()) {
				//Enables touchevents
				list += "<li ontouchstart=\"doFocus('" + noteID + "')\" ontouchmove=\"logTouchMove()\" id=\"note_" + noteID + "\" ontouchend=\"openNote(\'" + noteID + "\');\">" + noteTitle + "</li>";
			}
			else {
				list += "<li onmousedown=\"doFocus('" + noteID + "')\" id=\"note_" + noteID + "\" onmouseup=\"openNote(\'" + noteID + "\');\">" + noteTitle + "</li>";
			}
		}
	}
	document.getElementById('thelist').innerHTML = list;
	document.getElementById('networkActivity').style.display = "none";
}

function closeNote(arg) {
	document.getElementById('networkActivity').style.display = "block";
	document.getElementById('theNoteContent').blur();
	document.getElementById('inNoteHeader').blur();
	switch (arg) {
		case "save":
			if (document.getElementById('inNoteHeader').innerHTML == "New Note" && document.getElementById('theNoteContent').innerHTML == "") {
				deleteNote();

			}
			else if (document.getElementById('currentNoteUID').value.indexOf("new") == -1) {
				storeNote();
				sendNote(document.getElementById('currentNoteUID').value);
			}
			else {
				storeNote();
				sendNewNote(document.getElementById('currentNoteUID').value);
			}
			break;
		case "delete":
			confirmFile("Are you sure you want to delete the note \"" + document.getElementById('inNoteHeader').innerHTML + "\"?");
			return false;
			break;
		case "close":
			//Just Continue Handled Somewhere Else
			break;
	}
	
	if (navigator.onLine == true) {
		setTimeout(function () { pullServerNotes(); }, 2000);
	}
	else {
		loadNotes();
	}
	
	document.getElementById('note').className = "inactive";
	document.getElementById('inNoteHeader').innerHTML = "";
	document.getElementById('theNoteContent').innerHTML = "";
	document.getElementById('currentNoteUID').value = "";
}

function confirmFile(text) {
	document.getElementById('confirmFileText').innerHTML = text;
	document.getElementById('confirmFileBD').style.display = "block";
	document.getElementById('confirmFile').style.display = "block";
}

function deleteFile() {
	deleteNote();
	dismissConfirmFile();
	closeNote('close');
}

function dismissConfirmFile() {
	document.getElementById('confirmFileBD').style.display = "none";
	document.getElementById('confirmFile').style.display = "none";
}

var ct = 0;

function sendNewServerNote() {
	if (navigator.onLine != true) { return; }
	var note = sendNotes[ct];
	if (note == null) { ct = 0; statusMessage("All Notes Synced With Server."); return; }
	var noteID = note.id;
	var noteTitle = escape(note.title);
	var noteContent = escape(note.content);
	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var response = xmlhttp.responseText;
			var start = response.indexOf('(') + 1;
			var end = response.indexOf(')', start);
			var assignedID = response.substring(start, end);
			
			note.id = assignedID;
			localStorage.setItem("nt" + assignedID, JSON.stringify(note));
			localStorage.removeItem(noteID);
			localStorage.removeItem("");
			
			ct++;
			sendNewServerNote(); //Run again. The function auto aborts when it doesn't have anymore data.
		}
	}
	xmlhttp.open("GET","scripts/notes.lib.php?owner=" + currentUser + "&title=" + noteTitle + "&content=" + noteContent + "&type=new", true);
	xmlhttp.send();
}

function sendServerNote(note) {
	if (navigator.onLine != true) { return; }
	if (note == null) { return; }
	var noteID = note.id;
	var noteTitle = escape(note.title);
	var noteContent = escape(note.content);
	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var response = xmlhttp.responseText;
			statusMessage("Last Edited Note Saved to Server.");
		}
	}
	xmlhttp.open("GET","scripts/notes.lib.php?id=" + noteID + "&owner=" + currentUser + "&title=" + noteTitle + "&content=" + noteContent + "&type=push", true);
	xmlhttp.send();
}

function pullServerNotes() {
	if (navigator.onLine != true) { return; }
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var response = xmlhttp.responseText;
			console.log(response);
			clearNotes();
			var noteData = JSON.parse(response);
			
			for (var j = 0; j < noteData.notes.length; j++) {
				localStorage.setItem("nt" + noteData.notes[j].id, JSON.stringify(noteData.notes[j]));	
			}
			
			statusMessage("All Notes Synced with Server.");
			loadNotes();
		}
	}
	xmlhttp.open("GET","scripts/notes.lib.php?owner=" + currentUser + "&type=pull", true);
	xmlhttp.send();
}

function deleteServerNotes(noteID) {
	if (navigator.onLine != true) { return; }
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var response = xmlhttp.responseText;
			
			statusMessage("Note Deleted Successfully.");
		}
	}
	xmlhttp.open("GET","scripts/notes.lib.php?id=" + noteID.substring(2, noteID.length) + "&type=delete", true);
	xmlhttp.send();
}

function loginServer() {
	if (navigator.onLine != true) { return; }
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var response = xmlhttp.responseText;
			if (response.indexOf(",") != -1) {
				var userObj = response.split(",");
				localStorage.setItem("user_name", userObj[0]);
				localStorage.setItem("user_email", userObj[1]);
				document.getElementById('loginPanel').style.display = "none";
				currentUser = localStorage.getItem("user_name");
				loadNotes();
				pullServerNotes();
			}
			else {
				document.getElementById('loginMessage').innerHTML = "<span style=\"color: Red;\">Incorrect Username or Password</span>";
			}
		}
	}
	xmlhttp.open("POST","scripts/notes.login.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("username=" + escape(document.getElementById('usernameLogin').value) + "&password=" + escape(document.getElementById('passwordLogin').value));
}

function statusMessage(text) {
	document.getElementById('statusMessage').innerHTML = text;
}

function is_touch_device() {
  return !!('ontouchstart' in window);
}

function clearNotes() {
	for(var lItem in localStorage)
	{
		if (lItem.substring(0, 2) == "nt") {
			localStorage.removeItem(lItem);
		}
	}	
}

window.onload = function (evt) {
	if (localStorage.getItem("user_name") == null) {
		document.getElementById('loginPanel').style.display = "block";
		return;	
	}
	else {
		currentUser = localStorage.getItem("user_name");
	}
	
	if (!is_touch_device()) {
		//Processes all images to make sure they are compatible with desktops and mobile phones
		
		//Handles ontouchstart
		document.getElementById('inNoteClose').setAttribute("onmousedown",document.getElementById('inNoteClose').getAttribute("ontouchstart"));
		document.getElementById('inNoteClose').removeAttribute("ontouchstart");	
		document.getElementById('inNoteAdd').setAttribute("onmousedown",document.getElementById('inNoteAdd').getAttribute("ontouchstart"));
		document.getElementById('inNoteAdd').removeAttribute("ontouchstart");	
		document.getElementById('inNoteDelete').setAttribute("onmousedown",document.getElementById('inNoteDelete').getAttribute("ontouchstart"));
		document.getElementById('inNoteDelete').removeAttribute("ontouchstart");	
		document.getElementById('addNote').setAttribute("onmousedown",document.getElementById('addNote').getAttribute("ontouchstart"));
		document.getElementById('addNote').removeAttribute("ontouchstart");	
		
		//Handles ontouchend
		document.getElementById('inNoteClose').setAttribute("onmouseup",document.getElementById('inNoteClose').getAttribute("ontouchend"));
		document.getElementById('inNoteClose').removeAttribute("ontouchend");	
		document.getElementById('inNoteAdd').setAttribute("onmouseup",document.getElementById('inNoteAdd').getAttribute("ontouchend"));
		document.getElementById('inNoteAdd').removeAttribute("ontouchend");	
		document.getElementById('inNoteDelete').setAttribute("onmouseup",document.getElementById('inNoteDelete').getAttribute("ontouchend"));
		document.getElementById('inNoteDelete').removeAttribute("ontouchend");	
		document.getElementById('addNote').setAttribute("onmouseup",document.getElementById('addNote').getAttribute("ontouchend"));
		document.getElementById('addNote').removeAttribute("ontouchend");	
	}
	
	var noteArea = document.getElementById('theNoteContent');
	
	noteArea.insertBreak = function() {
		this.focus();
		var html = "<br>";
		var sel, range;
		if (window.getSelection) {
			// IE9 and non-IE
			sel = window.getSelection();
			if (sel.getRangeAt && sel.rangeCount) {
				range = sel.getRangeAt(0);
				range.deleteContents();
	
				// Range.createContextualFragment() would be useful here but is
				// non-standard and not supported in all browsers (IE9, for one)
				var el = document.createElement("div");
				el.innerHTML = html;
				var frag = document.createDocumentFragment(), node, lastNode;
				while ( (node = el.firstChild) ) {
					lastNode = frag.appendChild(node);
				}
				range.insertNode(frag);
				
				// Preserve the selection
				if (lastNode) {
					range = range.cloneRange();
					range.setStartAfter(lastNode);
					range.collapse(true);
					sel.removeAllRanges();
					sel.addRange(range);
				}
			}
		} else if (document.selection && document.selection.type != "Control") {
			// IE < 9
			document.selection.createRange().pasteHTML(html);
		}
	}
	
	noteArea.onkeypress = function(e){
	if (!e) e = window.event;   // resolve event instance
		if (e.keyCode == '13'){
			noteArea.insertBreak();
			return false;
		}
	}
	
	loadNotes();
	pullServerNotes();
}