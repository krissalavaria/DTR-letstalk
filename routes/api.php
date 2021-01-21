<?php

use Symfony\Component\Console\Input\Input;
use App\Barangay;
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

/**
 * EMPLOYEE PROFILE
 */
Route::get('employee_time', 'ProfileController@employee_time')->name('employee_time');
Route::get('get_auth', 'ProfileController@get_user')->name('get_auth');

/**
 * ORDERS TOTAL
 */
Route::get('get_order_total', 'DashboardController@get_order_total')->name('get_order_total');

/**
 * BARANGAY and CITIES DROPDOWN
 */
Route::get('/search-barangay',function(Request $request){
    $query = $request['query'];
    $users = Barangay::where('desc','like','%'.$query.'%')->get();
    return response()->json($users);
   });

Route::get('barangays', 'GenericController@barangays')->name('barangays');
Route::get('cities', 'GenericController@cities')->name('cities');