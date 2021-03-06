<?php

/**
 * Backend Routes
 */
 include('backend.php');

/**
 * Frontend routes
 */


Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::redirect('/home', '/');

    Route::post('/token/create', 'HomeController@createToken')->name('token.create');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::post('/search', 'SearchController@search')->name('search');

});


 

