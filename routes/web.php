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
Route::get('/the-team', 'ManagersController@index');
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
*	Contact page
* 
*/

// Break Inquiry
Route::post('/contact/break-inquiry', 'ContactsController@inquiry');
Route::post('/contact/question', 'ContactsController@question');
Route::post('/contact/submit', 'ContactsController@submit');

/*
* 
*	Admin
* 
*/

Route::get('/admin/dashboard', 'AdminController@index');

// Breaks routes
Route::get('/admin/breaks/add', 'ArticlesController@create');
Route::get('/admin/breaks/edit', 'ArticlesController@selectEdit');
Route::get('/admin/breaks/{article}/edit', 'ArticlesController@edit');
Route::get('/admin/breaks/delete', 'ArticlesController@selectDelete');

Route::post('/admin/breaks', 'ArticlesController@store');
Route::patch('/admin/breaks/{article}', 'ArticlesController@update');
Route::delete('/admin/breaks/{article}', 'ArticlesController@destroy');

// Breakers routes
Route::get('/admin/breakers/add', 'AuthorsController@create');
Route::get('/admin/breakers/edit', 'AuthorsController@selectEdit');
Route::get('/admin/breakers/{author}/edit', 'AuthorsController@edit');
Route::get('/admin/breakers/delete', 'AuthorsController@selectDelete');

Route::post('admin/breakers', 'AuthorsController@store');
Route::patch('/admin/breakers/{author}', 'AuthorsController@update');
Route::delete('/admin/breakers/{author}', 'AuthorsController@destroy');

// Managers routes
Route::get('/admin/managers/add', 'ManagersController@create');
Route::get('/admin/managers/edit', 'ManagersController@selectEdit');
Route::get('/admin/managers/{manager}/edit', 'ManagersController@edit');
Route::get('/admin/managers/delete', 'ManagersController@selectDelete');

Route::post('admin/managers', 'ManagersController@store');
Route::patch('/admin/managers/{manager}', 'ManagersController@update');
Route::delete('/admin/managers/{manager}', 'ManagersController@destroy');

// Available Articles routes
Route::get('/admin/available-articles', 'AvailableArticlesController@create');

Route::post('admin/available-articles', 'AvailableArticlesController@store');
Route::patch('/admin/available-articles/{availableArticle}', 'AvailableArticlesController@update');
Route::delete('/admin/available-articles/{availableArticle}', 'AvailableArticlesController@destroy');

// Editor Picks routes
Route::get('/admin/editor-picks', 'EditorPicksController@edit');
Route::patch('/admin/editor-picks/{pick}', 'EditorPicksController@update');

// Subscription routes
Route::get('/admin/subscriptions', 'SubscriptionsController@index');

Route::post('admin/subscriptions', 'SubscriptionsController@store');
Route::delete('/admin/subscriptions/{email}', 'SubscriptionsController@destroy');