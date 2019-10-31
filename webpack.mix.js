let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.styles([
		'resources/assets/vendor/jquery-popover-0.0.3.css',
		'resources/assets/vendor/fontawesome-all.min.css',
		'public/css/app.css',
		], 'public/css/app.css')
    .scripts([
		'resources/assets/vendor/pace.min.js',
     	'public/js/app.js',
     	], 'public/js/app.js')
	.version();
