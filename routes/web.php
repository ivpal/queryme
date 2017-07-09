<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/discover', 'HomeController@discover')->name('discover');

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
Route::post('auth/logout', 'Auth\SocialController@logout');

Route::get('/{username}', 'UserController@show');
