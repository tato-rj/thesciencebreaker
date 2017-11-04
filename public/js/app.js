/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(6);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
__webpack_require__(3);
__webpack_require__(4);
__webpack_require__(5);

/***/ }),
/* 2 */
/***/ (function(module, exports) {

(function ($) {
    "use strict";

    // Set up sticky menu

    $('nav').addClass('original').clone().removeClass('mt-3 original').appendTo('header').addClass('pl-4 pr-4 clone');
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

    $(document).on('click', 'a.scroll-to-top', function (event) {
        var $anchor = $(this);
        // Scroll with ease
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });
})(jQuery);

/***/ }),
/* 3 */
/***/ (function(module, exports) {

if ($('.alert').length) {
	$('.alert').addClass('bounce-down').show().delay(4000).fadeOut();
}

/***/ }),
/* 4 */
/***/ (function(module, exports) {

$(window).on('load', function () {
  setTimeout(function () {
    $('#overlay img').fadeOut(function () {
      $('#overlay').fadeOut();
    });
  }, 500);
});

/***/ }),
/* 5 */
/***/ (function(module, exports) {

(function ($) {
	"use strict";

	$('input[name="news_from"]').on('change', function () {
		var $section = $(this).attr('id');
		$('#options').find('input, textarea').hide();
		$('.' + $section).fadeIn();
	});
})(jQuery);

/***/ }),
/* 6 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);