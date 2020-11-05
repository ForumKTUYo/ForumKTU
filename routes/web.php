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

Route::get('/', 'PageController@index')->name('pages.index');

Route::get('/sukurti', function(){
    return view('create_view');
});

Route::get('/redaguoti', function(){
    return view('create_view');
});

Route::get('/admin', function(){
    return view('edit_themes');
});

Route::get('/{tema}', function($tema){
    return view('posts');
});

Route::get('/profilis/{id}', function($id){
    return view('profile');
});

Route::get('/{tema}/{irasas}', function($tema, $irasas){
    return view('post');
});

