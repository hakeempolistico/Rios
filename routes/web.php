<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//DASHBOARD ROUTING
Route::resource('dashboard', 'DashboardController');

//GENRES ROUTING
Route::put('genres', 'GenreController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('genres/{id}/destroy', 'GenreController@destroy');
Route::resource('genres', 'GenreController');

//AUTHORS ROUTING
Route::put('authors', 'AuthorsController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('authors/{id}/destroy', 'AuthorsController@destroy');
Route::resource('authors', 'AuthorsController');


//SECTIONS ROUTING
Route::put('sections', 'SectionsController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('sections/{id}/destroy', 'SectionsController@destroy');
Route::resource('sections', 'SectionsController');
