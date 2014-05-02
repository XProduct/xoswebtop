// JavaScript Document
// Copyright 2001 by www.CodeBelly.com
// Please do *not* remove this notice.

var backImage = new Array(); // don't change this

// Enter the image filenames you wish to use.
// Follow the pattern to use more images.  The
// number in the brackets [] is the number you
// will use in the function call to pick each
// image.

// Note how backImage[3] = "" -- which would
// set the page to *no* background image.

backImage[0] = "CORE\images\desktop";
backImage[1] = "CORE\images\desktop\freshback.png";
backImage[2] = "CORE\images\desktop\greyback.png";
backImage[3] = "";

// Do not edit below this line.
//-----------------------------

function changeBGImage(whichImage){
if (document.body){
document.body.background = backImage[whichImage];
}
}