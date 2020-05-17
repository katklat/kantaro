<?php

//use App\Http\Controllers\BasketController;
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

Route::resource('/baskets', 'BasketController');
Route::resource('/songs', 'SongController');

Route::get('/auth', 'ApiController@authenticate');
Route::get('/spoti', 'ApiController@callback');
Route::post('/songs/search/{type}', 'ApiController@search');
Route::post('/baskets/search/{type}', 'ApiController@search');
Route::get('/baskets/search/playlist', 'ApiController@renderPlaylistSongs')->name('getPlaylist');
Route::patch('/baskets/{basket}', 'ApiController@importPlaylist')->name('import');


Route::get('/baskets/{basket}/tools', 'BasketController@tools')->name('tools');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');
