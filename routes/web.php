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
Route::resource('dashboard', 'DashboardController')->middleware('auth');

//GENRES ROUTING
Route::put('genres', 'GenreController@update')->middleware('auth');
Route::get('genres/{id}/destroy', 'GenreController@destroy')->middleware('auth');
Route::resource('genres', 'GenreController')->middleware('auth');

//AUTHORS ROUTING
Route::put('authors', 'AuthorController@update')->middleware('auth');
Route::get('authors/{id}/destroy', 'AuthorController@destroy')->middleware('auth');
Route::resource('authors', 'AuthorController')->middleware('auth');

//SECTIONS ROUTING
Route::put('sections', 'SectionController@update')->middleware('auth');
Route::get('sections/{id}/destroy', 'SectionController@destroy')->middleware('auth');
Route::resource('sections', 'SectionController')->middleware('auth');

//ISSUES ROUTING
Route::put('issues', 'IssueController@update')->middleware('auth');
Route::get('issues/{id}/destroy', 'IssueController@destroy')->middleware('auth');
Route::get('returned', 'IssueController@returned')->middleware('auth');
Route::resource('issues', 'IssueController')->middleware('auth');

//BOOKS ROUTING
Route::put('books', 'BookController@update')->middleware('auth');
Route::put('books/addcopy', 'BookController@addCopies')->middleware('auth');
Route::get('books/{id}/destroy', 'BookController@destroy')->middleware('auth');
Route::resource('books', 'BookController')->middleware('auth');

//MEMBERS ROUTING
Route::put('members', 'MemberController@update')->middleware('auth');
Route::get('members/{id}/destroy', 'MemberController@destroy')->middleware('auth');
Route::post('/members/getInfo', 'MemberController@getInfo')->middleware('auth');
Route::resource('members', 'MemberController')->middleware('auth');

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::auth();