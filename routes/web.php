<?php
Route::get('/', 'NavigationController@index');
Route::get('/genres', 'GenresController@index');
Route::get('/genres/{id}/edit', 'GenresController@edit');
Route::post('/genres', 'GenresController@store');
Route::get('/tracks', 'TracksController@index');
Route::get('/tracks/new', 'TracksController@create');
Route::post('/tracks', 'TracksController@store');