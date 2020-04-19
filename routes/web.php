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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/home', 'KamarController@index');
Route::resource('kamar', 'KamarController');

Auth::routes();

Route::get('/kamar', 'KamarController@index')->name('home');

Route::resource('kepala', 'KepalaController');

Auth::routes();

Route::get('/kepala', 'KepalaController@index')->name('home');

Route::resource('transaksi', 'TransaksiController');

Auth::routes();

Route::get('/transaksi', 'TransaksiController@index')->name('home');
