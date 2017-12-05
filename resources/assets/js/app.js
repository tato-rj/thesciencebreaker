$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

require('./alertBox');
require('./overlay');
require('./contactInputs');

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	$('.dropdown').click(function() {
		$clicked_menu = $(this).find('.dropdown-menu');
		$('.dropdown-menu').not($clicked_menu).slideUp('fast');
		$clicked_menu.slideToggle('fast');
	})
}

$('form').submit(function(){
    $(this).find(':input[type=submit]').prop('disabled', true).val('Working on it...');
});

