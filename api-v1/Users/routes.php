<?php

Route::middleware('auth:api')
    ->group(function () {
        Route::get('users/{nickname}', 'UsersController@show');
        Route::get('users/{nickname}/followers', 'UsersController@followers');
        Route::get('users/{nickname}/following', 'UsersController@following');
    });