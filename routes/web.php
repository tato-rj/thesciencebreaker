<?php
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Welcome page
Route::get('/', 'ArticlesController@index');
// Breaks
Route::get('/breaks/{category}/{article}', 'ArticlesController@show');
// Categories
Route::get('/breaks/{category}', 'CategoryController@show');
// About
Route::get('/about', function() {
	return view('pages.about');
});
// About
Route::get('/partners', function() {
	return view('pages.partners');
});
// Mission
Route::get('/mission', function() {
	return view('pages.mission');
});
// Team
Route::get('/the-team', 'ManagerController@index');