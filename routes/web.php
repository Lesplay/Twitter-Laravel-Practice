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

//Tweets routes
Route::get('/', 'TweetsController@index');
Route::get('/tweets/create', ['as'=>'tweetCreate', 'uses'=>'TweetsController@create'])->middleware('auth');
Route::post('/tweets', ['as'=>'tweetStore', 'uses'=>'TweetsController@store'])->middleware('auth');
Route::get('/tweets/{tweet}', ['as'=>'tweetShow', 'uses'=>'TweetsController@show']);

//Users routes
Route::get('/users/{user}', ['as'=>'userShow', 'uses'=>'UsersController@show']);

//Messages routes
Route::get('/messages/{user}', ['as'=>'userMessages', 'uses'=>'MessagesController@show'])->middleware('auth');
Route::post('/messages', ['as'=>'messageSend', 'uses'=>'MessagesController@store'])->middleware('auth');

//Comments routes
Route::post('/comments', ['as'=>'commentStore', 'uses'=>'CommentsController@store']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
