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
Route::get('/follow/{id}', 'ThemeController@follow')->name('themes.follow')->middleware('can:admin-user');
Route::get('/unfollow/{id}', 'ThemeController@unfollow')->name('themes.unfollow')->middleware('can:admin-user');
Route::get('/following', 'ThemeController@following')->name('themes.following')->middleware('can:admin-user');

// Index sorting
Route::get('/post_asc', 'ThemeController@indexPostAsc', 'var')->name('themes.indexPostAsc');
Route::get('/monpost_asc', 'ThemeController@indexMonPostAsc', 'var')->name('themes.indexMonPostAsc');
Route::get('/view_asc', 'ThemeController@indexViewAsc', 'var')->name('themes.indexViewAsc');
Route::get('/monview_asc', 'ThemeController@indexMonViewAsc', 'var')->name('themes.indexMonViewAsc');
// Index sorting
Route::get('/monpost_desc', 'ThemeController@indexMonPostDesc', 'var')->name('themes.indexMonPostDesc');
Route::get('/view_desc', 'ThemeController@indexViewDesc', 'var')->name('themes.indexViewDesc');
Route::get('/monview_desc', 'ThemeController@indexMonViewDesc', 'var')->name('themes.indexMonViewDesc');

Route::get('/theme/create', 'ThemeController@create')->name('themes.create')->middleware('can:admin');
Route::post('/', 'ThemeController@store')->name('themes.store')->middleware('can:admin');
Route::get('/{id}', 'ThemeController@show')->name('themes.show');
Route::get('/theme/edit/{id}', 'ThemeController@edit')->name('themes.edit')->middleware('can:admin');
Route::put('/lock/{id}', 'ThemeController@lock')->name('themes.lock')->middleware('can:admin');
Route::put('/unlock/{id}', 'ThemeController@unlock')->name('themes.unlock')->middleware('can:admin');
Route::put('/theme/{id}', 'ThemeController@update')->name('themes.update')->middleware('can:admin');
Route::delete('/theme/{id}', 'ThemeController@destroy')->name('themes.destroy')->middleware('can:admin');

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

Route::get('/post/create', 'PostController@create')->name('posts.create')->middleware('can:admin-user');
Route::post('/post/create', 'PostController@store')->name('posts.store')->middleware('can:admin-user');
Route::get('/post/{id}', 'PostController@show')->name('posts.show');
Route::get('/post/{id}/edit', 'PostController@edit')->name('posts.edit')->middleware('can:admin-user');
Route::put('/post/{id}', 'PostController@update')->name('posts.update')->middleware('can:admin-user');
Route::delete('/post/{id}', 'PostController@destroy')->name('posts.destroy')->middleware('can:admin-user');

// USERS
Route::get('/profile/{id}', 'UserController@show')->name('users.show');
Route::get('/user/follow/{id}', 'UserController@follow')->name('users.follow')->middleware('can:admin-user');
Route::get('/user/unfollow/{id}', 'UserController@unfollow')->name('users.unfollow')->middleware('can:admin-user');
Route::get('/user/following', 'UserController@following')->name('users.following')->middleware('can:admin-user');

// COMMENTS
Route::post('/comment/{id}', 'CommentController@store')->name('comments.store')->middleware('can:admin-user');
Route::delete('/comment/{id}', 'CommentController@destroy')->name('comments.destroy')->middleware('can:admin-user');
Route::get('/comment/{id}/edit', 'CommentController@edit')->name('comments.edit')->middleware('can:admin-user');
Route::put('/comment/{id}', 'CommentController@update')->name('comments.update')->middleware('can:admin-user');

// WARNINGS
Route::get('/profile/{id}/warn', 'WarningController@create')->name('warnings.create')->middleware('can:admin');
Route::post('/profile/{id}/warn', 'WarningController@store')->name('warnings.store')->middleware('can:admin');