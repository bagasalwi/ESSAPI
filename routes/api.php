<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 Route::post('/register', 'Api\RegisterController@action');
 Route::post('/login', 'Api\LoginController@action');
 Route::get('/me', 'Api\UserController@me')->middleware('auth:api');
 Route::get('/index', 'Api\UserController@index');

 // ABSENSI
 Route::post('/clock_in', 'Api\AbsensiController@clock_in');
 Route::post('/clock_out', 'Api\AbsensiController@clock_out');
 Route::get('/absensi/index', 'Api\AbsensiController@index');
 Route::get('/absensi/show/{id}/', 'Api\AbsensiController@show');

 
//  CUTI
 Route::get('/cuti/index', 'Api\CutiController@index');
 Route::get('/cuti/show/{id}/', 'Api\CutiController@show');
 Route::post('/cuti', 'Api\CutiController@store');
 Route::get('/cuti/reset/', 'Api\CutiController@reset');
 Route::post('/cuti/approve/', 'Api\CutiController@approve');
 Route::post('/cuti/reject/', 'Api\CutiController@reject');
 Route::post('/cuti/cancel/{id}', 'Api\CutiController@cancel');
 Route::get('/cuti/cuti_hrd/', 'Api\CutiController@show_cuti');
 
//  ASSET
Route::get('/asset/index', 'Api\AssetController@index');
Route::get('/asset/show/{id}', 'Api\AssetController@show');
Route::post('/asset', 'Api\AssetController@store');
Route::post('/asset/approve/', 'Api\AssetController@approve');
Route::post('/asset/reject/', 'Api\AssetController@reject');
Route::post('/asset/cancel/{id}', 'Api\AssetController@cancel');
Route::get('/cuti/asset_ga/', 'Api\AssetController@show_asset');

//  REIMBURSE
Route::get('/reimburse/index', 'Api\ReimburseController@index');
Route::get('/reimburse/show/{id}', 'Api\ReimburseController@show');
Route::post('/reimburse', 'Api\ReimburseController@store');
Route::post('/reimburse/approve/', 'Api\ReimburseController@approve');
Route::post('/reimburse/reject/', 'Api\ReimburseController@reject');
Route::post('/reimburse/cancel/{id}', 'Api\ReimburseController@cancel');
Route::get('/cuti/reimburse_ga/', 'Api\ReimburseController@show_reimburse');

//  TRANSPORT
Route::get('/transport/index', 'Api\TransportController@index');
Route::get('/transport/show/{id}', 'Api\TransportController@show');
Route::post('/transport', 'Api\TransportController@store');
Route::post('/transport/approve/', 'Api\TransportController@approve');
Route::post('/transport/reject/', 'Api\TransportController@reject');
Route::post('/transport/cancel/{id}', 'Api\TransportController@cancel');
Route::get('/cuti/transport_ga/', 'Api\TransportController@show_transport');


//SALARIES
Route::post('/sendmail','Api\SalaryController@sendmail');
Route::get('/salary/{id}','Api\SalaryController@show');