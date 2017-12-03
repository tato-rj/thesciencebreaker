<?php

Auth::routes();

// Welcome page
Route::get('/', 'ArticlesController@index')->name('home');
// Breaks
Route::get('/breaks/{category}/{article}', 'ArticlesController@show');
// Breakers
Route::get('/breakers/{author}', 'AuthorsController@show');
// Managers
Route::get('/core-team/{member}', 'ManagersController@show');
// Categories
Route::get('/breaks/{category}', 'CategoryController@show');
// Tags
Route::get('/tags/{tag}', 'TagsController@show');
// Search
Route::get('/search', 'SearchController@index');
// Unsubscribe
Route::get('/unsubscribe', function() {
	return view('pages.unsubscribe');
});
Route::delete('/unsubscribe', 'SubscriptionsController@unsubscribe');
// RSS Feed
Route::get('/services/feed', 'FeedController@index');

/*
* 
*	Presentation Pages
* 
*/

// About
Route::get('/about', function() {
	return view('pages.presentation.about');
});
// Mission
Route::get('/mission', function() {
	return view('pages.presentation.mission');
});
// Team
Route::get('/the-team', 'ManagersController@index');
// Breakers
Route::get('/breakers', 'AuthorsController@index');
// Partners
Route::get('/partners', function() {
	return view('pages.presentation.partners');
});

/*
* 
*	For Breakers Pages
* 
*/

// Information
Route::get('/information', function() {
	return view('pages.for_breakers.information');
});

// FAQ
Route::get('/faq', function() {
	return view('pages.for_breakers.faq');
});

// Available Articles
Route::get('/available-articles', 'AvailableArticlesController@index');

/*
* 
*	Contact page
* 
*/

Route::get('/contact/ask-a-question', function() {
	return view('pages.contact.question');
});
Route::get('/contact/break-inquiry', function() {
	return view('pages.contact.inquiry');
});
Route::get('/contact/submit-your-break', function() {
	return view('pages.contact.submit');
});
Route::post('/contact/ask-a-question', 'ContactsController@question');
Route::post('/contact/break-inquiry', 'ContactsController@inquiry');
Route::post('/contact/submit-a-break', 'ContactsController@submit');

/*
* 
*	App
* 
*/

Route::get('/app/breaks', 'AppController@breaks');
Route::get('/app/picks', 'AppController@picks');
Route::get('/app/tags', 'AppController@tags');
Route::get('/app/breakers', 'AppController@breakers');
Route::get('/app/suggestions', 'AppController@suggestions');

/*
* 
*	Admin
* 
*/

Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/graphs', 'AdminController@graphs');

// Breaks routes
Route::get('/admin/breaks/add', 'ArticlesController@create');
Route::get('/admin/breaks/edit', 'ArticlesController@selectEdit');
Route::get('/admin/breaks/{article}/edit', 'ArticlesController@edit');
Route::get('/admin/breaks/delete', 'ArticlesController@selectDelete');

Route::post('/admin/breaks', 'ArticlesController@store');
Route::post('/admin/breaks/{article}/breakers-order', 'ArticlesController@authorsOrder');
Route::patch('/admin/breaks/{article}', 'ArticlesController@update');
Route::delete('/admin/breaks/{article}', 'ArticlesController@destroy');
Route::delete('/admin/breaks/images/{article}', 'ArticlesController@destroyImage');

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

// Highlights routes
Route::get('/admin/highlights', 'HighlightsController@edit');
Route::patch('/admin/highlights/{highlight}', 'HighlightsController@update');

// Subscription routes
Route::get('/admin/subscriptions', 'SubscriptionsController@index');

Route::post('admin/subscriptions', 'SubscriptionsController@store');
Route::delete('/admin/subscriptions/{email}', 'SubscriptionsController@destroy');

// Tags
Route::get('/admin/tags', 'TagsController@index');
Route::post('/admin/breaks/{article}/tags', 'ArticlesController@setTags');
Route::post('/admin/tags', 'TagsController@store');
Route::patch('/admin/tags/{tag}', 'TagsController@update');
Route::delete('/admin/tags/{tag}', 'TagsController@destroy');