//Javascript Document
//CODE 2.0
var theobject = null; //This gets a value as soon as a resize start
var theLastWidth;
var bIsmove=false;

function resizeObject() 
{
	this.el        = null; //pointer to the object
	this.dir    = "";      //type of current resize (n, s, e, w, ne, nw, se, sw)
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
	var obt=event.srcElement.ClassName;
	if (tag=="BODY" || tag=="IMG" || tag=="SPAN"|| tag=="LI" || tag=="UL" || tag=="INPUT")
	return false;
	if (obt=="none" || obt=="startbar" || obt=="dock" || obt=="name" || obt=="menuItem")
	return false;

	var el = getReal(event.srcElement, "className", "window");

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
	if (tag=="BODY" || tag=="IMG" || tag=="SPAN")
  	return false;
	
	if (theobject != null) 
	{
		theobject = null;				
	}		
	
//ResizeAll();
 // if(event.srcElement.parentElement.parentElement.parentElement.id=="HeaderTable" && bIsmove)
  //{	
	//----These're original codes
	//// 	if (event.srcElement.offsetWidth<ListTable.rows(0).cells(event.srcElement.cellIndex).offsetWidth)
	//// 		ListTable.style.tableLayout="fixed";
	//// 	else
	//// 		ListTable.style.tableLayout="auto";
  	//
  	//ListTable.rows(0).cells(event.srcElement.cellIndex).width=event.srcElement.offsetWidth;
	//----Original codes end

	//========Modified By Skysaint Wong
	//If mouse up,then redraw the grids to fix both header and body table's size
	//The function in underside
	//
	//========Modify OK!(2002-10-24)
  //}

}

function doMove() {
	var el, xPos, yPos, str, xMin, yMin;
	xMin = 700; //The smallest width possible
	yMin = 490; //             height

	el = getReal(event.srcElement, "className", "window");
	
	if (el.className == "window") {
		str = getDirection(el);
	//Fix the cursor	
		if (str == "") 
		{
			str = "default";
		}
		else 
		{
			str += "-resize";
		}
		el.style.cursor = str;
	}
	
//Dragging starts here
	if(theobject != null) 
	{
		if (dir.indexOf("e") != -1)
			theobject.el.style.width = Math.max(xMin, theobject.width + window.event.clientX - theobject.grabx) + "px";
	
		if (dir.indexOf("s") != -1)
			theobject.el.style.height = Math.max(yMin, theobject.height + window.event.clientY - theobject.graby) + "px";

		if (dir.indexOf("w") != -1) {
			theobject.el.style.left = Math.min(theobject.left + window.event.clientX - theobject.grabx, theobject.left + theobject.width - xMin) + "px";
			theobject.el.style.width = Math.max(xMin, theobject.width - window.event.clientX + theobject.grabx) + "px";
		}
		if (dir.indexOf("n") != -1) {
			theobject.el.style.top = Math.min(theobject.top + window.event.clientY - theobject.graby, theobject.top + theobject.height - yMin) + "px";
			theobject.el.style.height = Math.max(yMin, theobject.height - window.event.clientY + theobject.graby) + "px";
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
	while ((temp != null) && (temp.tagName != "BODY")) {
		if (eval("temp." + type) == value) {
			el = temp;
			return el;
		}
		temp = temp.parentElement;
	}
	return el;
}

//New function due to resize all the tables and fix to each other
/*function ResizeAll(){
	ListTable.style.tableLayout="fixed";
	if(ListTable.rows(0)!=null)
	{
		for (var i = 0; i <ListTable.rows(0).cells.length; i++)
			ListTable.rows(0).cells(i).style.width=HeaderTable.rows(0).cells(i).style.width;
        } 
}*/

document.onmousedown =doDown;
document.onmouseup   = doUp;
document.onmousemove = doMove;

/*

//CODE 1.3

var theobject = null; //This gets a value as soon as a resize start

function resizeObject() {
	this.el        = null; //pointer to the object
	this.dir    = "";      //type of current resize (n, s, e, w, ne, nw, se, sw)
	this.grabx = null;     //Some useful values
	this.graby = null;
	this.width = null;
	this.height = null;
	this.left = null;
	this.top = null;
}
	

//Find out what kind of resize! Return a string inlcluding the directions
function getDirection(el) {
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
	var el = getReal(event.srcElement, "className", "window");

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

function doUp() {
	if (theobject != null) {
		theobject = null;
	}
}

function doMove() {
	var el, xPos, yPos, str, xMin, yMin;
	xMin = 8; //The smallest width possible
	yMin = 8; //             height

	el = getReal(event.srcElement, "NULL", "window");

	if (el.className == "window") {
		str = getDirection(el);
	//Fix the cursor	
		if (str == "") str = "default";
		else str += "-resize";
		el.style.cursor = str;
	}
	
//Dragging starts here
	if(theobject != null) {
		if (dir.indexOf("e") != -1)
			theobject.el.style.width = Math.max(xMin, theobject.width + window.event.clientX - theobject.grabx) + "px";
	
		if (dir.indexOf("s") != -1)
			theobject.el.style.height = Math.max(yMin, theobject.height + window.event.clientY - theobject.graby) + "px";

		if (dir.indexOf("w") != -1) {
			theobject.el.style.left = Math.min(theobject.left + window.event.clientX - theobject.grabx, theobject.left + theobject.width - xMin) + "px";
			theobject.el.style.width = Math.max(xMin, theobject.width - window.event.clientX + theobject.grabx) + "px";
		}
		if (dir.indexOf("n") != -1) {
			theobject.el.style.top = Math.min(theobject.top + window.event.clientY - theobject.graby, theobject.top + theobject.height - yMin) + "px";
			theobject.el.style.height = Math.max(yMin, theobject.height - window.event.clientY + theobject.graby) + "px";
		}
		
		window.event.returnValue = false;
		window.event.cancelBubble = true;
	} 
}


function getReal(el, type, value) {
	temp = el;
	while ((temp != null) && (temp.tagName != "BODY")) {
		if (eval("temp." + type) == value) {
			el = temp;
			return el;
		}
		temp = temp.parentElement;
	}
	return el;
}

document.onmousedown = doDown;
document.onmouseup   = doUp;
document.onmousemove = doMove;
*/