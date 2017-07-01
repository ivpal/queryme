<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$fbCallback = env('FACEBOOK_REDIRECT');
Route::get('/fb_redirect', 'Auth\FacebookLoginController@redirect');
Route::get("/{$fbCallback}", 'Auth\FacebookLoginController@callback');
