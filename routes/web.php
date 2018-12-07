<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'ApplicationController@dashboard');

    // Crawler CRUD Routes
    Route::get('/crawlers', 'CrawlerController@index');
    Route::post('/crawlers', 'CrawlerController@store');
    Route::get('/crawlers/create', 'CrawlerController@create');
    Route::get('/crawlers/{id}/edit', 'CrawlerController@edit');

    // Crawler Item Routes
    Route::post('/items', 'ItemController@store');

    // In-house API routes
    Route::get('/crawlers/{id}/items', 'CrawlerController@getItems');
    Route::get('/crawlers/{id}/process', 'CrawlerController@getProcess');
    Route::post('/crawlers/{id}/process', 'CrawlerController@saveProcess');
    Route::get('/crawlers/{id}/output', 'CrawlerController@getOutput');
    Route::post('/crawlers/{id}/output', 'CrawlerController@saveOutput');
});

Auth::routes();