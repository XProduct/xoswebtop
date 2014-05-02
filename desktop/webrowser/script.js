var setFrameUrl = function(url) {
  if (!url || url == 'undefined') return;
  if (!url.match('^http?://')) {
    url = 'http://' + url;
  }
  else if (!url.match('^https?://')) {
    url = 'https://' + url;
  }
  $('#url').val(url);
  $('#frame').attr('src',url);
};

var rotate = function() {
  $('#ipad').toggleClass('landscape').toggleClass('portrait');
}

$(function(){

setFrameUrl($.url.param('url'));
if ($.url.param('portrait')) rotate();

$('#rotate').click(rotate);

$('#reload').click(function(){
  $('#frame').attr('src',$('#frame').attr('src'));
});

$('#url').focus(function(){
  $('#kbd').show();
});

$('#url').blur(function(){
  $('#kbd').hide();
});

$('#url').keyup(function(evt){
  if (evt.keyCode != 13) return;
  $('#url').blur();
  setFrameUrl($(this).val());
});

$('#google').focus(function(){
  $('#kbd').show();
});

$('#google').blur(function(){
  $('#kbd').hide();
});

$('#google').keyup(function(evt){
  if (evt.keyCode != 13) return;
  $('#google').blur();
  setFrameUrl("http://search.yahoo.com/search?q="+escape($(this).val()));
});

$('#show_about').click(function(){
  $('#about').slideToggle();
  return false;
});

});
