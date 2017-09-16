<?php

Route::namespace('Api')->group(function () {
    Route::get('webapp-token', 'WebAppTokenController@create');

    Route::prefix('v1')
        ->namespace('V1')
        ->middleware('auth:api')
        ->group(function () {
            Route::get('users/{nickname}', 'UsersController@show');
        });
});

