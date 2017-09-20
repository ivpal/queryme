<?php

Route::middleware('auth:api')
    ->group(function () {
        Route::get('users/{nickname}', 'UsersController@show');
    });