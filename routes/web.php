<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'impersonate'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('impersonate', 'ImpersonateController@index')->name('impersonate.index');
    Route::get('/users/{id}/impersonate', 'ImpersonateController@impersonate')->name('impersonate.impersonate');
    Route::get('/users/stop', 'ImpersonateController@stopImpersonating')->name('impersonate.stop');

    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
    });

    Route::resource('setting', 'SettingController');
});
