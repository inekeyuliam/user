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
Route::get('/', 'KotaTujuanController@cari');
Route::get('/wisata','RekomendasiWisataController@index');
Route::get('/wisata/create','RekomendasiWisataController@create');
Route::post('/wisata/store','RekomendasiWisataController@store');
Route::post('/gethasil', 'KotaTujuanController@ambilhasil');

