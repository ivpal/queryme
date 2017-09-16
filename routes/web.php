<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/discover', 'HomeController@discover')->name('discover');

Route::post('auth/logout', 'Auth\SocialController@logout')->name('logout');
Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/{username}', 'UserController@show');
