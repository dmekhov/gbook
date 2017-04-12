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

Auth::routes();

Route::get('/', 'CommentController@index');
Route::post('/comment', 'CommentController@store');
Route::match(['GET','POST'], '/per-page-toggle', 'CommentController@perPage');
Route::get('/user/{user}', 'UserController@show');
Route::get('/personal', 'UserController@personal')->middleware('auth');
