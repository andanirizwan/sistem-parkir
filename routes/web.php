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
Route::get('/parkir/kendaraan/{id}', 'ParkirController@edit');
Route::post('/parkir/edit/{id}', 'ParkirController@simpan_kendaraan');
Route::get('/parkir/hapus/{id}', 'ParkirController@hapus_kendaraan');
Route::get('/parkir/laporan/motor', 'ParkirController@laporan_motor');
Route::post('/parkir/laporan/motor/hasil', 'ParkirController@laporan_motor_hasil');
Route::get('/parkir/laporan/mobil', 'ParkirController@laporan_mobil');
Route::post('/parkir/laporan/mobil/hasil', 'ParkirController@laporan_mobil_hasil');
