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

Route::middleware('auth')->prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('guardian', 'GuardianController@index')->name('guardian');

    Route::post('guardian/roles/store', 'GuardianController@roleStore')->name('guardian.roles.store');
    Route::post('guardian/users/store', 'GuardianController@userStore')->name('guardian.users.store');
    Route::post('guardian/permissions/store', 'GuardianController@permissionStore')->name('guardian.permissions.store');

});

Auth::routes();


