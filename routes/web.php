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

Route::post('post-login', 'GenericController@postLogin')->name('post-login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('Admin');

Route::get('scanner-dashboard', function () {
	return view('scanner.scanner-dashboard');
})->name('scanner-dashboard')->middleware('Guard');

Route::get('scanner-entry', function () {
	return view('scanner.scan-entry');
})->name('scanner-entry')->middleware('Guard');

// Search User
Route::get('/search_user', 'VueQrCodeReader@search_user');

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

	// USERS TABLE
	Route::get('manage-users', 'UserController@list_user')->name('manage-users');
	Route::get('add-new-users', 'GenericController@getDropDownData')->name('add-new-users');
	Route::post('add-user', 'UserController@store')->name('add-user');

	Route::get('generate/{user}/qr', 'UserController@generate_qr')->name('generate.qr');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
