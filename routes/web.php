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
    return view('auth/login');
});


Route::resource('kamar', 'KamarController');
Auth::routes();
Route::get('/kamar', 'KamarController@index')->name('kamar');


Route::resource('kepala', 'KepalaController');
//Auth::routes();
Route::get('/kepala', 'KepalaController@index')->name('kepala');


Route::resource('transaksi', 'TransaksiController');
//Auth::routes();
Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');

Route::resource('penyewa', 'PenyewaController');
//Auth::routes();
Route::get('/penyewa', 'PenyewaController@index')->name('penyewa');

Route::resource('sewa', 'SewaController');
//Auth::routes();
Route::get('/sewa', 'SewaController@index')->name('sewa');

Route::get('/laporankamar', 'LaporanKamarController@index');
Route::get('/laporankamar/cetak_pdf', 'LaporanKamarController@cetak_pdf');

Route::get('/laporanpenyewa', 'LaporanPenyewaController@index');
Route::get('/laporanpenyewa/cetak_pdf', 'LaporanPenyewaController@cetak_pdf');
