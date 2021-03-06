<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('Admin');

Route::get('scanner-dashboard', function () {
	return view('scanner.scanner-dashboard');
})->name('scanner-dashboard')->middleware('Guard');

Route::get('scanner-entry', function () {
	return view('scanner.scan-entry');
})->name('scanner-entry')->middleware('Guard');

Route::get('employee-profile', function() {
	return view('employee.employee-profile');
})->name('employee-profile')->middleware('Employee');

Route::get('employee-profile-settings', 'ProfileController@index')->name('employee-profile-settings')->middleware('Employee');
Route::get('image/{filename}', 'ProfileController@get_profile_image')->name('image.displayImage')->middleware('Employee');

Route::get('get_by_date', 'VueQrCodeReader@filter_time_sheet_bydate');

Route::get('employee_time', 'ProfileController@employee_time')->name('employee_time');
Route::get('get_user', 'ProfileController@get_user')->name('get_user');

// Admin Routes
Route::group(['middleware' => 'Admin'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	Route::get('scan-entry', function () {
		return view('pages.scan-entry');
	})->name('scan-entry');

	// DEPARTMENTS
	Route::resource('departments', 'DepartmentsController')->middleware('Admin');

	// DESIGNATIONS
	Route::resource('designations', 'DesignationController')->middleware('Admin');

	// USER ACCOUNT TYPES
	Route::resource('user_account_types', 'UserAccountTypeController')->middleware('Admin');

	// USERS TABLE
	Route::get('manage-users', 'UserController@list_user')->name('manage-users');
	Route::get('add-new-users', 'GenericController@getDropDownData')->name('add-new-users');
	Route::post('add-user', 'UserController@store')->name('add-user');
	Route::get('generate/{user}/qr', 'UserController@generate_qr')->name('generate.qr');
	Route::get('generate/{id}/id', 'UserController@generate_ID')->name('generate-id')->middleware('Admin');
	
	// DASHBOARD REPORTS
	Route::get('home', 'DashboardController@reports')->name('home');
	Route::get('get_order_total', 'DashboardController@get_order_total')->name('get_order_total');

	// SCHEDULES
	Route::resource('schedules', 'SchedulesController');
	Route::get('get-schedules/{id}/schedules', 'SchedulesController@schedules')->name('get-schedules');

	Route::get('orderinfo', 'DashboardController@get_order_info')->name('orderinfo');

	Route::get('overall', 'DashboardController@overall_orders')->name('overall');
	Route::get('totalorders', 'DashboardController@get_users_total')->name('totalorders');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
