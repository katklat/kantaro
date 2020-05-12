<?php

use Illuminate\Support\Facades\Route;
use SpotifyWebAPI\SpotifyWebAPI;

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
Route::get('/search', 'SearchController@index')->name('search');

Route::get('/baskets/{basket}/tools', function () {
    return view('baskets.tools');
})->name('tools');

Route::resource('/baskets', 'BasketController');
Route::resource('/songs', 'SongController');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');
