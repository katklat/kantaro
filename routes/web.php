<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/lists', function () {
    return view('lists.index');
})->name('lists.index');
Route::get('/lists/1', function () {
    return view('lists.show');
})->name('lists.show');
Route::get('/lists/create', function () {
    return view('lists.create');
})->name('lists.create');
Route::get('/lists/create/success', function () {
    return view('lists.success');
})->name('lists.create.success');
Route::get('/lists/add', function () {
    return view('lists.add');
})->name('lists.add');
Route::get('/lists/tools', function () {
    return view('lists.tools');
})->name('lists.tools');
Route::get('/songs', function () {
    return view('songs.index');
})->name('songs.index');
