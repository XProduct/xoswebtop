//Javascript Document
window.onorientationchange = function() {
    var orientation = window.orientation;
    switch(orientation) {
        //We want all views to be show when it is the right time
        case 0:
            window.scroll(0,0)
        case 90:
            window.scroll(0,0)
        case -90: 
            window.scroll(0,0)
    }
}
