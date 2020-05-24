<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'SearchController@random')->name('home');
Route::get('/home', 'SearchController@random')->name('home');
Route::get('/search', 'SearchController@index')->name('search');

Route::resource('/songs', 'SongController');
Route::patch('/songs/{song}/edit', 'SongController@updateImage')->name('songImage');
Route::resource('/books', 'BookController');
Route::patch('/books/{book}/edit', 'BookController@updateImage')->name('bookImage');
Route::get('/books/{book}/tools', 'BookController@tools')->name('tools');
Route::get('/books/show/{filter}', 'BookController@index');

Route::get('/auth', 'ApiController@authenticate')->name('auth');
Route::get('/spoti', 'ApiController@callback')->name('callback');
Route::post('/songs/search/{type}', 'ApiController@search');
Route::post('/books/search/{type}', 'ApiController@search');
Route::get('/books/search/playlist', 'ApiController@renderPlaylistSongs')->name('getPlaylist');
Route::put('/books', 'ApiController@importPlaylist')->name('import');
Route::post('/books/{book}', 'ApiController@exportPlaylist')->name('export');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
