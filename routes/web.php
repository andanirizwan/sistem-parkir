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


Route::get('/parkir', 'ParkirController@index');
Route::post('/parkir/simpan', 'ParkirController@simpan');
Route::get('/parkir/kendaraan_json', 'ParkirController@json_kendaraan')->name('json');
Route::get('/parkir/kendaraan', 'ParkirController@kendaraan');
Route::get('/parkir/kendaraan/{id}', 'ParkirController@edit');
Route::post('/parkir/edit/{id}', 'ParkirController@simpan_kendaraan');
Route::get('/parkir/hapus/{id}', 'ParkirController@hapus_kendaraan');
Route::get('/parkir/laporan', 'ParkirController@laporan');