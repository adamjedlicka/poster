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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/posts/create', 'PostController@store')->name('posts.store');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
Route::post('/posts/like/{post}', 'PostController@like')->name('posts.like');

Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UserController@update')->name('users.update');

Route::get('/topics', 'TopicController@index')->name('topics.index');
Route::get('/topics/{topic}', 'TopicController@show')->name('topics.show');

Route::post('/follow/{user}', 'FollowController@follow')->name('follow');

Route::post('/notifications/read', 'NotificationController@readAll')->name('notifications.readAll');
