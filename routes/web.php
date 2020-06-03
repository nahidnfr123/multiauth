<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

// Show Customer Profile ....
Route::get('/profile', 'Customer\ProfileController@index')->middleware('auth');


/// Admin routes ...
Route::prefix('adm')->name('admin.')->group(function(){

    // Admin login routes ...
    Route::namespace('Admin\Auth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');
    });


    // If admin has logged in with verified account ....
    Route::group(['namespace'=>'Admin', 'middleware' => ['checkAdmin']], function () {
        Route::resource('/', 'DashboardController');

        Route::middleware( 'can:manage-users')->group(function () {
            Route::resource('/users', 'UsersController', ['except' => ['create', 'store']]);
        });
    });
});
