<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// / -->
// /admin
//


Route::middleware(['auth'])->namespace('Users')->group(function() {

    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
    Route::get('/overview', ['as' => 'dashboard.overview', 'uses' => 'DashboardController@overview']);
    Route::get('/settings/edit', ['as' => 'settings.edit', 'uses' => 'SettingsController@edit']);
    Route::post('settings/update', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
    Route::get('/settings/password', ['as' => 'settings.password', 'uses' => 'SettingsController@password']);
    Route::post('settings/change', ['as' => 'settings.change', 'uses' => 'SettingsController@change']);

    // Username check
    Route::post('/get-username',['as' => 'users.ajax', 'uses' => 'AjaxController@getUserName']);
    Route::post('/overview/get-donut-data', ['as' => 'dashboard.ajax', 'uses' => 'AjaxController@getDonutData']);
    Route::post('/overview/get-best-drivers', ['as' => 'dashboard.best.ajax', 'uses' => 'AjaxController@getBestDrivers']);
    Route::post('/overview/get-most-used-cars', ['as' => 'dashboard.cars.ajax', 'uses' => 'AjaxController@getMostUsedCars']);


    // correct
    Route::get('/users/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
    Route::post('/users', ['as' => 'users.store', 'uses' => 'UsersController@store']);
    Route::get('/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    Route::post('/users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    Route::get('/users/gallery/{id}', ['as' => 'users.gallery', 'uses' => 'UsersController@gallery']);


    // Users
    Route::get('/users/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
    Route::post('/users', ['as' => 'users.store', 'uses' => 'UsersController@store']);
    Route::get('/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    Route::post('/users/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    Route::post('/users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);

    //Cars
    Route::get('/cars/index', ['as' => 'cars.index', 'uses' => 'CarsController@index']);
    Route::get('/cars/create', ['as' => 'cars.create', 'uses' => 'CarsController@create']);
    Route::post('/cars', ['as' => 'cars.store', 'uses' => 'CarsController@store']);
    Route::get('/cars/edit/{id}', ['as' => 'cars.edit', 'uses' => 'CarsController@edit']);
    Route::post('/cars/{id}', ['as' => 'cars.update', 'uses' => 'CarsController@update']);
    Route::post('/cars/delete/{id}', ['as' => 'cars.delete', 'uses' => 'CarsController@delete']);

    //Drives
    Route::get('/drives/index', ['as' => 'drives.index', 'uses' => 'DrivesController@index']);
    Route::get('/drives/create', ['as' => 'drives.create', 'uses' => 'DrivesController@create']);
    Route::post('/drives', ['as' => 'drives.store', 'uses' => 'DrivesController@store']);
    Route::get('/drives/edit/{id}', ['as' => 'drives.edit', 'uses' => 'DrivesController@edit']);
    Route::post('/drives/{id}', ['as' => 'drives.update', 'uses' => 'DrivesController@update']);
    Route::post('/drives/delete/{id}', ['as' => 'drives.delete', 'uses' => 'DrivesController@delete']);

    //Shifts
    Route::get('/shifts/index', ['as' => 'shifts.index', 'uses' => 'ShiftsController@index']);
    Route::get('/shifts/create', ['as' => 'shifts.create', 'uses' => 'ShiftsController@create']);
    Route::post('/shifts', ['as' => 'shifts.store', 'uses' => 'ShiftsController@store']);
    Route::get('/shifts/edit/{id}', ['as' => 'shifts.edit', 'uses' => 'ShiftsController@edit']);
    Route::post('/shifts/{id}', ['as' => 'shifts.update', 'uses' => 'ShiftsController@update']);
    Route::post('/shifts/delete/{id}', ['as' => 'shifts.delete', 'uses' => 'ShiftsController@delete']);


    Route::post('/images/delete/{id}', ['as' => 'images.delete', 'uses' => "ImagesController@delete"]);
});

Auth::routes([
    'register' => false,
    'reset' => true,
    'confirm' => false,
    'verify' => false
]);
