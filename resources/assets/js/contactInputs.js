(function($) {
    "use strict";

$('input[name="news_from"]').on('change', function() {
	var $section = $(this).attr('id');
	$('#options').find('input, textarea').hide();
	$('.'+$section).fadeIn();
});

})(jQuery);
