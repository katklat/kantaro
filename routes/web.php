<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Song;
use Illuminate\Support\Facades\Http;
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

Route::get('/search', 'SearchController@index')->name('search');
Route::get('/', function () {

    $randomSong = DB::table('songs')
        ->inRandomOrder()
        ->first();

    $imgUrl = Song::find($randomSong->id)
        ->imageUrl($randomSong->image);

    return view('home', ['song' => $randomSong, 'imgUrl' => $imgUrl]);
})->name('home');

Route::get('/baskets/{basket}/tools', function () {
    return view('baskets.tools');
})->name('tools');

Route::resource('/baskets', 'BasketController');
Route::resource('/songs', 'SongController');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');
