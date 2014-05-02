//Javascript Document
////// CODE VERSION 2.5.0 ////////////////////////////////////////////////
//																		//
// Edited by Brandon Davis - bdavis@xproduct.net						//
// Changed Event Handling												//
//////////////////////////////////////////////////////////////////////////
var theobject = null; //This gets a value as soon as a resize start
var theLastWidth;
var bIsmove=false;
var disallowResize = [ "console", "about" ];


function resizeObject() 
{
	this.el = null; //pointer to the object
	this.dir = "";      //type of current resize (n, s, e, w, ne, nw, se, sw)
	this.grabx = null;     //Some useful values
	this.graby = null;
	this.width = null;
	this.height = null;
	this.left = null;
	this.top = null;
}
	

//Find out what kind of resize! Return a string inlcluding the directions
function getDirection(el) 
{
	var xPos, yPos, offset, dir;
	dir = "";

	xPos = window.event.offsetX;
	yPos = window.event.offsetY;

	offset = 8; //The distance from the edge in pixels

	if (yPos<offset) dir += "n";
	else if (yPos > el.offsetHeight-offset) dir += "s";
	if (xPos<offset) dir += "w";
	else if (xPos > el.offsetWidth-offset) dir += "e";

	return dir;
}

function doDown() {
	var tag=event.srcElement.tagName;
	var obt=event.srcElement.className;
	if (tag=="BODY" || tag=="IMG" || tag=="SPAN"|| tag=="LI" || tag=="UL" || tag=="INPUT")
	return;
	
	if (obt != "window") {
		return;
	}

	var el = getReal(event.srcElement, "className", "window");

	console.log(el.id);
	for (var i = 0; i < disallowResize.length; i++) {
		if (el.id == disallowResize[i]) {
			return;
		}
	}

	if (el == null) {
		theobject = null;
		return;
	}		

	dir = getDirection(el);
	if (dir == "") return;

	theobject = new resizeObject();
		
	theobject.el = el;
	theobject.dir = dir;

	theobject.grabx = window.event.clientX;
	theobject.graby = window.event.clientY;
	theobject.width = el.offsetWidth;
	theobject.height = el.offsetHeight;
	theobject.left = el.offsetLeft;
	theobject.top = el.offsetTop;

	window.event.returnValue = false;
	window.event.cancelBubble = true;
}

function doUp() 
{
	var tag=event.srcElement.tagName;
	if (tag=="BODY" || tag=="IMG" || tag=="SPAN"|| tag=="LI" || tag=="UL" || tag=="INPUT")
  	return;
	
	
	if (theobject != null) 
	{
		theobject = null;				
	}		
}

function doMove() {
	var el, xPos, yPos, str, xMin, yMin;
	xMin = 170;//The smallest width possible
	yMin = 80; //             height

	el = getReal(event.srcElement, "className", "window");
	switch (el.tagName) {
		case "BODY":
		case "IMG":
		case "SPAN":
		case "LI":
		case "UL":
		case "INPUT":
		case "TEXTAREA":
			return;
			break; 
	}
	
	if (el.className == "window") {
		for (var i = 0; i < disallowResize.length; i++) {
			if (el.id == disallowResize[i]) {
				return;	
			}
		}
		str = getDirection(el);
		//Fix the cursor	
		if (str == "" && theobject != null) 
		{
			str = "default";
		}
		else 
		{
			str += "-resize";
		}
		el.style.cursor = str;
	}
	else if (theobject == null) {
		str = getDirection(el);
		str = "default";
		el.style.cursor = str;
	}
	
	
	
//Dragging starts here
	if(theobject != null) 
	{
		if (dir.indexOf("e") != -1)
			theobject.el.style.width = Math.max(xMin, theobject.width + window.event.clientX - theobject.grabx - 12) + "px";
	
		if (dir.indexOf("s") != -1)
			theobject.el.style.height = Math.max(yMin, theobject.height + window.event.clientY - theobject.graby - 12) + "px";

		if (dir.indexOf("w") != -1) {
			theobject.el.style.left = Math.min(theobject.left + window.event.clientX - theobject.grabx, theobject.left + theobject.width - xMin - 12) + "px";
			theobject.el.style.width = Math.max(xMin, theobject.width - window.event.clientX + theobject.grabx - 12) + "px";
		}
		if (dir.indexOf("n") != -1) {
			theobject.el.style.top = Math.min(theobject.top + window.event.clientY - theobject.graby, theobject.top + theobject.height - yMin - 12) + "px";
			theobject.el.style.height = Math.max(yMin, theobject.height - window.event.clientY + theobject.graby - 12) + "px";
		}
		bIsmove=true;
		window.event.returnValue = false;
		window.event.cancelBubble = true;				
	} 
	else
	  bIsmove=false;			
}


function getReal(el, type, value) {
	temp = el;
	/*while ((temp != null) && (temp.tagName != "BODY")) {
		if (eval("temp." + type) == value) {
			el = temp;
			return el;
		}
		
		temp = temp.parentElement;
		console.log(temp);
	}*/
	el = temp;
	return el;
}

document.onmousedown = doDown;
document.onmouseup   = doUp;
document.onmousemove = doMove;