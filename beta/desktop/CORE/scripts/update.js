// JavaScript Document
function checkver() {
alert(document.getElementByName('ver')[0].value);

var version = document.getElementById('ver')[0].value;

	if(version = '3.1.1') {
		showDiv('current');	
	}
	else {
		showDiv('noteup');
		showDiv('reup');
	}
}
function hardboot() {
	//Reboots With Clean Slate
	location.reload(true);	
}
    function showElements(){
        alert(document.getElementsByByName("myInput")[0].value);
    }
