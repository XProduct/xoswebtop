//Javascript Document
window.onload = theClock 

      function theClock() { 
         now = new Date; 
          
         theTime = ((now.getHours() > 0 && now.getHours() < 13)) ? now.getHours() : (now.getHours() == 0) ? 12 : now.getHours()-12; 
         theTime += (now.getMinutes() > 9) ? ":" + now.getMinutes() : ":0" + now.getMinutes(); 
         theTime += (now.getHours() < 12) ? " am" : " pm"; 
          
         clockSpan = document.getElementById("myClock"); 
         clockSpan.replaceChild(document.createTextNode(theTime), clockSpan.firstChild);          
          
         setTimeout("theClock()",1000); 
      } 