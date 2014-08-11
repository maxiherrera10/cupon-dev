$(document).ready(function() {
  $.ajaxSetup({ cache: true });
  $.getScript('//connect.facebook.net/es_LA/all.js', function(){
      FB.init({
        appId      : '659274017487487',
        status     : true,
        xfbml      : true
      }); 
    $('#loginbutton,#feedbutton').removeAttr('disabled');
  }); 
});

window.fbAsyncInit = function() {
    FB.Canvas.setAutoGrow();
};