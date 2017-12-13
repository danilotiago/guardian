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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/', 'AdminController@index')->name('index');
    Route::get('guardian', 'GuardianController@index')->name('guardian');

    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
});

Auth::routes();


