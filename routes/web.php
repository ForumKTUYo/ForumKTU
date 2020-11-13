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

Route::get('/', 'ThemeController@index')->name('themes.index');
Route::post('/', 'ThemeController@store')->name('themes.store');
Route::get('/{id}', 'ThemeController@show')->name('themes.show');
Route::delete('/theme/{id}', 'ThemeController@destroy')->name('themes.destroy');
Route::get('/post/create', 'PostController@create')->name('posts.create');
Route::post('/post/create', 'PostController@store')->name('posts.store');
Route::get('/post/{id}', 'PostController@show')->name('posts.show');
Route::delete('/post/{id}', 'PostController@destroy')->name('posts.destroy');
Route::get('/profile/{id}', 'UserController@show')->name('users.show');