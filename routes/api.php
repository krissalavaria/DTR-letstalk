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
 * TEMPERATURE
 */
Route::get ('get_temperature', 'VueQrCodeReader@get_users_temp');

/**
 * GET TIME SHEETS AND USERS
 */
Route::get('get_users', 'VueQrCodeReader@get_all_users');
Route::get('time_sheets', 'VueQrCodeReader@index');

/**
 * FILTER BY DATE
 */
Route::get('get_by_date', 'VueQrCodeReader@filter_time_sheet_bydate');
