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

Route::get('/', 'FrontController@dashboard');
Route::get('/discord', 'FrontController@discord');
Route::get('/data-cuti', 'FrontController@cuti');
Route::get('/data-user', 'FrontController@user');
Route::get('/data-asset', 'FrontController@asset');
Route::get('/data-reimburse', 'FrontController@reimburse');
Route::get('/data-transport', 'FrontController@transport');
Route::get('/data-absensi', 'FrontController@absensi');
