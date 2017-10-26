<?php
Auth::routes();
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

Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/graphs', 'AdminController@graphs');

// Break routes
Route::get('/admin/breaks/add', 'ArticlesController@create');
Route::get('/admin/breaks/edit', 'ArticlesController@selectEdit');
Route::get('/admin/breaks/{article}/edit', 'ArticlesController@edit');
Route::get('/admin/breaks/delete', 'ArticlesController@selectDelete');

Route::post('/admin/breaks', 'ArticlesController@store');
Route::patch('/admin/breaks/{article}', 'ArticlesController@update');
Route::delete('/admin/breaks/{article}', 'ArticlesController@destroy');

// Breaker routes
Route::get('/admin/breakers/add', 'AuthorsController@create');
Route::get('/admin/breakers/edit', 'AuthorsController@selectEdit');
Route::get('/admin/breakers/{author}/edit', 'AuthorsController@edit');
Route::get('/admin/breakers/delete', 'AuthorsController@selectDelete');

Route::post('admin/breakers', 'AuthorsController@store');
Route::patch('/admin/breakers/{author}', 'AuthorsController@update');
Route::delete('/admin/breakers/{author}', 'AuthorsController@destroy');