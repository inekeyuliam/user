<?php

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
Route::get('/', 'RekomendasiWisataController@index');
Route::get('/rekomendasi/wisata', 'RekomendasiWisataController@form');
Route::get('/gethasil', 'RekomendasiWisataController@ambilhasil')->name('kirimbobot');
Route::get('/wisata/{id}', 'RekomendasiWisataController@show');
Route::get('/daftar/wisata', 'RekomendasiWisataController@daftar');
Route::get('/showkriteria', 'RekomendasiWisataController@kriteria');
Route::post('/review/wisata/{id}', 'RekomendasiWisataController@update');

Route::get('/hotel', 'RekomendasiHotelController@index');
Route::get('/gethasilhotel', 'RekomendasiHotelController@ambilhasil')->name('kirimbobothotel');
Route::get('/hotel/{id}', 'RekomendasiHotelController@show');
Route::post('/review/hotel/{id}', 'RekomendasiHotelController@update');

Route::get('/persewaan', 'RekomendasiPersewaanController@index');
Route::get('/gethasilpersewaan', 'RekomendasiPersewaanController@ambilhasil')->name('kirimbobotsewa');
Route::get('/persewaan/{id}', 'RekomendasiPersewaanController@show');
Route::post('/review/persewaan/{id}', 'RekomendasiPersewaanController@update');
