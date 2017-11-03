$(window).on('load', function(){
  setTimeout(function(){
    $('#overlay img').fadeOut(function(){
    	$('#overlay').fadeOut();
    });
  }, 500);
});