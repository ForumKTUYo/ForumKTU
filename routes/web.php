<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/search', 'PostController@search')->name('posts.search');

// THEMES
Route::get('/', 'ThemeController@index')->name('themes.index');
Route::get('/theme/create', 'ThemeController@create')->name('themes.create');
Route::post('/', 'ThemeController@store')->name('themes.store');
Route::get('/{id}', 'ThemeController@show')->name('themes.show');
Route::get('/theme/edit/{id}', 'ThemeController@edit')->name('themes.edit');
Route::put('/lock/{id}', 'ThemeController@lock')->name('themes.lock');
Route::put('/unlock/{id}', 'ThemeController@unlock')->name('themes.unlock');
Route::put('/theme/{id}', 'ThemeController@update')->name('themes.update');
Route::delete('/theme/{id}', 'ThemeController@destroy')->name('themes.destroy');

// POSTS
Route::get('/post/create', 'PostController@create')->name('posts.create');
Route::post('/post/create', 'PostController@store')->name('posts.store');
Route::get('/post/{id}', 'PostController@show')->name('posts.show');
Route::get('/post/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/post/{id}', 'PostController@update')->name('posts.update');
Route::delete('/post/{id}', 'PostController@destroy')->name('posts.destroy');

// USERS
Route::get('/profile/{id}', 'UserController@show')->name('users.show');

// COMMENTS
Route::post('/comment/{id}', 'CommentController@store')->name('comments.store');
Route::delete('/comment/{id}', 'CommentController@destroy')->name('comments.destroy');
Route::get('/comment/{id}/edit', 'CommentController@edit')->name('comments.edit');
Route::put('/comment/{id}', 'CommentController@update')->name('comments.update');
