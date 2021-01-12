<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 *  
 * QR Code Scanner
 * 
 * */
Route::get('/search_user', 'VueQrCodeReader@search_user');
Route::post('/insert_entry', 'VueQrCodeReader@insert_entry');

/**
 * Temperature Monitoring
 */
Route::get ('get_temperature', 'VueQrCodeReader@get_users_temp');

Route::get('get_users', 'VueQrCodeReader@get_all_users');
Route::get('time_sheets', 'VueQrCodeReader@index');

Route::group(['prefix' => 'scanner_dashboards'], function () {
    Route::post('add', 'PostController@add');
    Route::get('edit/{id}', 'PostController@edit');
    Route::post('update/{id}', 'PostController@update');
    Route::delete('delete/{id}', 'PostController@delete');
});
