<?php
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Welcome page
Route::get('/', 'ArticlesController@index');
// Breaks
Route::get('/breaks/{category}/{article}', 'ArticlesController@show');
// Categories
Route::get('/breaks/{category}', 'CategoryController@show');

/*
* 
*	Presentation Pages
* 
*/

// About
Route::get('/about', function() {
	return view('pages.about');
});
// Mission
Route::get('/mission', function() {
	return view('pages.mission');
});
// Team
Route::get('/the-team', 'ManagerController@index');
// Partners
Route::get('/partners', function() {
	return view('pages.partners');
});

/*
* 
*	For Breakers Pages
* 
*/

// Information
Route::get('/information', function() {
	return view('pages.information');
});

// FAQ
Route::get('/faq', function() {
	return view('pages.faq');
});

// Available Articles
Route::get('/available-articles', 'AvailableArticlesController@index');

/*
* 
*	Admin
* 
*/

// Dashboard
Route::get('/admin/dashboard', function() {
	return view('admin/pages/dashboard');
});
