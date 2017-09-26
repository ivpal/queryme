<?php

Route::middleware('auth:api')
    ->group(function () {
        Route::get('users/{nickname}', 'UsersController@show');

        Route::get('users/{nickname}/followers', 'FollowersController@index');
        Route::get('users/{nickname}/following', 'FollowersController@following');
        Route::post('users/{nickname}/followers', 'FollowersController@store');
        Route::delete('users/{nickname}/followers', 'FollowersController@destroy');
    });