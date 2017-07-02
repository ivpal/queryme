<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
