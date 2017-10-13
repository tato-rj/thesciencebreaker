<?php
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Welcome page
Route::get('/', 'ArticlesController@index');
// Breaks
Route::get('/breaks/{category}/{article}', 'ArticlesController@show');
// Categories
Route::get('/breaks/{category}', 'CategoryController@show');


