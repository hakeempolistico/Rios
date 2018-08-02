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
Route::put('authors', 'AuthorController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('authors/{id}/destroy', 'AuthorController@destroy');
Route::resource('authors', 'AuthorController');

//SECTIONS ROUTING
Route::put('sections', 'SectionController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('sections/{id}/destroy', 'SectionController@destroy');
Route::resource('sections', 'SectionController');

//ISSUES ROUTING
Route::put('issues', 'IssueController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('issues/{id}/destroy', 'IssueController@destroy');
Route::get('returned', 'IssueController@returned');
Route::resource('issues', 'IssueController');

//BOOKS ROUTING
Route::put('books', 'BookController@update');
Route::put('books', 'BookController@addCopies');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('books/{id}/destroy', 'BookController@destroy');
Route::resource('books', 'BookController');

//MEMBERS ROUTING
Route::put('members', 'MemberController@update');
//Route::delete('genres/destroy', 'GenreController@destroy');
Route::get('members/{id}/destroy', 'MemberController@destroy');
Route::post('/members/getInfo', 'MemberController@getInfo');
Route::resource('members', 'MemberController');
