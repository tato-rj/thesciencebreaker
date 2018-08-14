(function($) {
    "use strict";

// Set up sticky menu
$('nav').addClass('original').clone().removeClass('mt-3 original').appendTo('header').addClass('pl-4 pr-4 clone');
$('.clone').find('.logo').show();
var sideBar = $('#side-bar');
var navHeight = $('nav').outerHeight();
var headerHeight = $('header').outerHeight();
var dist = $('main').offset().top;

$(window).scroll(function () {
    var scroll = $(this).scrollTop();

    if (scroll < dist) {
        //Sticky menu
        $('.original').css('visibility', 'visible');
        $('.clone').fadeOut(100);
        // Scroll top button
        $('.scroll-to-top').fadeOut();       
    } else if (scroll > dist) {
        //Sticky menu
        $('.original').css('visibility', 'hidden');
        $('.clone').fadeIn(200);
        // Scroll top button
        $('.scroll-to-top').fadeIn();
    }
});

$(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    // Scroll with ease
    $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
});

})(jQuery);