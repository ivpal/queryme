<?php

Route::namespace('Api')->group(function () {
    Route::get('webapp-token', 'WebAppTokenController@create');

    Route::prefix('v1')
        ->namespace('V1')
        ->middleware('auth:api')
        ->group(function () {
            Route::prefix('users')
                ->group(function () {
                    Route::get('{nickname}', 'UsersController@show');
                    Route::get('{nickname}/replies', 'RepliesController@indexForUser');
                    Route::get('{nickname}/questions', 'QuestionsController@indexForUser');
                    Route::get('{nickname}/likes', 'LikesController@indexForUser');

                    Route::get('{nickname}/followers', 'FollowersController@index');
                    Route::get('{nickname}/following', 'FollowersController@following');
                    Route::post('{nickname}/followers', 'FollowersController@store');
                    Route::delete('{nickname}/followers', 'FollowersController@destroy');
                });
        });
});