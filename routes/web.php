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
Route::get('/follow/{id}', 'ThemeController@follow')->name('themes.follow');
Route::get('/following/{id}', 'ThemeController@following')->name('themes.following');

// Index sorting
Route::get('/post_asc', 'ThemeController@indexPostAsc', 'var')->name('themes.indexPostAsc');
Route::get('/monpost_asc', 'ThemeController@indexMonPostAsc', 'var')->name('themes.indexMonPostAsc');
Route::get('/view_asc', 'ThemeController@indexViewAsc', 'var')->name('themes.indexViewAsc');
Route::get('/monview_asc', 'ThemeController@indexMonViewAsc', 'var')->name('themes.indexMonViewAsc');
// Index sorting
Route::get('/monpost_desc', 'ThemeController@indexMonPostDesc', 'var')->name('themes.indexMonPostDesc');
Route::get('/view_desc', 'ThemeController@indexViewDesc', 'var')->name('themes.indexViewDesc');
Route::get('/monview_desc', 'ThemeController@indexMonViewDesc', 'var')->name('themes.indexMonViewDesc');

Route::get('/theme/create', 'ThemeController@create')->name('themes.create');
Route::post('/', 'ThemeController@store')->name('themes.store');
Route::get('/{id}', 'ThemeController@show')->name('themes.show');
Route::get('/theme/edit/{id}', 'ThemeController@edit')->name('themes.edit');
Route::put('/lock/{id}', 'ThemeController@lock')->name('themes.lock');
Route::put('/unlock/{id}', 'ThemeController@unlock')->name('themes.unlock');
Route::put('/theme/{id}', 'ThemeController@update')->name('themes.update');
Route::delete('/theme/{id}', 'ThemeController@destroy')->name('themes.destroy');

// POSTS
// Index sorting
Route::get('/theme/{id}/creation_asc', 'ThemeController@showCreationAsc', 'var')->name('themes.showCreationAsc');
Route::get('/theme/{id}/com_asc', 'ThemeController@showComAsc', 'var')->name('themes.showComAsc');
Route::get('/theme/{id}/moncom_asc', 'ThemeController@showMonComAsc', 'var')->name('themes.showMonComAsc');
Route::get('/theme/{id}/view_asc', 'ThemeController@showViewAsc', 'var')->name('themes.showViewAsc');
Route::get('/theme/{id}/monview_asc', 'ThemeController@showMonViewAsc', 'var')->name('themes.showMonViewAsc');
// Index sorting
Route::get('/theme/{id}/com_desc', 'ThemeController@showComDesc', 'var')->name('themes.showComDesc');
Route::get('/theme/{id}/moncom_desc', 'ThemeController@showMonComDesc', 'var')->name('themes.showMonComDesc');
Route::get('/theme/{id}/view_desc', 'ThemeController@showViewDesc', 'var')->name('themes.showViewDesc');
Route::get('/theme/{id}/monview_desc', 'ThemeController@showMonViewDesc', 'var')->name('themes.showMonViewDesc');

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
