<?php

Route::namespace('Api')->group(function () {
    Route::get('webapp-token', 'WebAppTokenController@create');
});