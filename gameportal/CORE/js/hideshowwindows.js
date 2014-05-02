//Javascript Document
function hideDiv(pass) {
var divs = document.getElementsByTagName('div');
for(i=0;i<divs.length;i++){
if(divs[i].id.match(pass)){//if they are 'see' divs
if (document.getElementById) // DOM3 = IE5, NS6
divs[i].style.visibility="hidden";// show/hide
else
if (document.layers) // Netscape 4
document.layers[divs[i]].display = 'hidden';
else // IE 4
document.all.hideShow.divs[i].visibility = 'hidden';
}
}
}

function showDiv(pass) {
var divs = document.getElementsByTagName('div');
	for(i=0;i<divs.length;i++){
		if(divs[i].id.match(pass)){
			if (document.getElementById)
				divs[i].style.visibility="visible";
			else
				if (document.layers) // Netscape 4
			document.layers[divs[i]].display = 'visible';
			else // IE 4
			document.all.hideShow.divs[i].visibility = 'visible';
}
}
}

var z = 0;
	
function front(pass) {
	var divs = document.getElementsByTagName('div');
	for(i=0;i<divs.length;i++){
		if(divs[i].id.match(pass)){
			(document.getElementById)
        		divs[i].style.display = "block";
        		divs[i].style.zIndex = z++;
}
}
}
var TimeToFade = 1000.0;

function fade(eid)
{
  var element = document.getElementById(eid);
  if(element == null)
    return;
    
	setTimeout("hideDiv('startup3')", 1000);
   
  if(element.FadeState == null)
  {
    if(element.style.opacity == null || element.style.opacity == '' 
       || element.style.opacity == '1')
      element.FadeState = 2;
    else
      element.FadeState = -2;
  }
    
  if(element.FadeState == 1 || element.FadeState == -1)
  {
    element.FadeState = element.FadeState == 1 ? -1 : 1;
    element.FadeTimeLeft = TimeToFade - element.FadeTimeLeft;
  }
  else
  {
    element.FadeState = element.FadeState == 2 ? -1 : 1;
    element.FadeTimeLeft = TimeToFade;
    setTimeout("animateFade(" + new Date().getTime() + ",'" + eid + "')", 33);
  }  
}

function animateFade(lastTick, eid)
{  
  var curTick = new Date().getTime();
  var elapsedTicks = curTick - lastTick;
  
  var element = document.getElementById(eid);
 
  if(element.FadeTimeLeft <= elapsedTicks)
  {
    element.style.opacity = element.FadeState == 1 ? '1' : '0';
    element.style.filter = 'alpha(opacity = ' + (element.FadeState == 1 ? '100' : '0') + ')';
    element.FadeState = element.FadeState == 1 ? 2 : -2;
    return;
  }
 
  element.FadeTimeLeft -= elapsedTicks;
  var newOpVal = element.FadeTimeLeft/TimeToFade;
  if(element.FadeState == 1)
    newOpVal = 1 - newOpVal;

  element.style.opacity = newOpVal;
  element.style.filter = 'alpha(opacity = ' + (newOpVal*100) + ')';
  
  setTimeout("animateFade(" + curTick + ",'" + eid + "')", 33);
}
