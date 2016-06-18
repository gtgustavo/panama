<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication and Password reset Routes...
Route::group(['prefix' => '/', 'middleware' => ['web'], 'namespace' => 'Auth'], function(){

    Route::get('/',             ['uses' => 'AuthController@getLogin',      'as' => 'auth']);

    Route::post('login',        ['uses' => 'AuthController@postLogin',     'as' => 'login']);

    Route::get('logout',        ['uses' => 'AuthController@getLogout',     'as' => 'logout']);

    Route::get('password',      ['uses' => 'PasswordController@getEmail',  'as' => 'password']);

    Route::post('password',     ['uses' => 'PasswordController@postEmail', 'as' => 'password']);

    Route::get('reset/{token}', ['uses' => 'PasswordController@getReset',  'as' => 'reset']);

    Route::post('reset',        ['uses' => 'PasswordController@postReset', 'as' => 'reset']);

    Route::get('create',        ['uses' => 'RegisterController@create',    'as' => 'new_client']);

    Route::post('create',       ['uses' => 'RegisterController@store',     'as' => 'new_client']);
});

// Routes Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth'], 'namespace' => 'Dashboard'], function(){

    Route::get('/',      ['uses' => 'DashboardController@index',  'as' => 'home']);

    Route::get('client', ['uses' => 'DashboardController@client', 'as' => 'dashboard_client']);

    Route::get('admin',  ['uses' => 'DashboardController@admin',  'as' => 'dashboard_admin']);

});

// Routes AJAX
Route::group(['prefix' => 'ajax', 'middleware' => ['web', 'auth'], 'namespace' => 'System'], function(){

    Route::get('client',     ['uses' => 'AjaxController@validate_client',   'as' => 'ajax_dni_client']);

    Route::get('consigning', ['uses' => 'AjaxController@consigning_client', 'as' => 'ajax_consigning_client']);
});

// Routes Profiles
Route::group(['prefix' => 'profile', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Administration'], function(){

    Route::get('/',           ['uses' => 'ProfileController@index',   'as' => 'profile_home']);

    Route::get('create',      ['uses' => 'ProfileController@create',  'as' => 'profile_create']);

    Route::post('create',     ['uses' => 'ProfileController@store',   'as' => 'profile_create']);

    Route::get('{id}/edit',   ['uses' => 'ProfileController@edit',    'as' => 'profile_edit']);

    Route::put('{id}/update', ['uses' => 'ProfileController@update',  'as' => 'profile_update']);

    Route::get('{id}/config', ['uses' => 'ProfileController@show',    'as' => 'profile_config']);

    Route::put('{id}/assign', ['uses' => 'ProfileController@assign',  'as' => 'profile_assign']);

    Route::get('{id}',        ['uses' => 'ProfileController@destroy', 'as' => 'profile_delete']);
});

// Routes Employees
Route::group(['prefix' => 'employee', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Administration'], function(){

    Route::get('/',                    ['uses' => 'EmployeeController@index',   'as' => 'employee_home']);

    Route::get('create',               ['uses' => 'EmployeeController@create',  'as' => 'employee_create']);

    Route::post('create',              ['uses' => 'EmployeeController@store',   'as' => 'employee_create']);

    Route::get('{id}/{people}/edit',   ['uses' => 'EmployeeController@edit',    'as' => 'employee_edit']);

    Route::put('{id}/{people}/update', ['uses' => 'EmployeeController@update',  'as' => 'employee_update']);

    Route::get('{id}/{people}',        ['uses' => 'EmployeeController@destroy', 'as' => 'employee_delete']);
});

// Routes Reception Centers
Route::group(['prefix' => 'reception_center', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Administration'], function(){

    Route::get('/',           ['uses' => 'ReceptionCenterController@index',   'as' => 'reception_center_home']);

    Route::get('create',      ['uses' => 'ReceptionCenterController@create',  'as' => 'reception_center_create']);

    Route::post('create',     ['uses' => 'ReceptionCenterController@store',   'as' => 'reception_center_create']);

    Route::get('{id}/edit',   ['uses' => 'ReceptionCenterController@edit',    'as' => 'reception_center_edit']);

    Route::put('{id}/update', ['uses' => 'ReceptionCenterController@update',  'as' => 'reception_center_update']);

    Route::get('{id}',        ['uses' => 'ReceptionCenterController@destroy', 'as' => 'reception_center_delete']);
});

// Routes Client
Route::group(['prefix' => 'client', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'System'], function(){

    Route::get('/',                    ['uses' => 'ClientController@index',   'as' => 'client_home']);

    Route::get('create',               ['uses' => 'ClientController@create',  'as' => 'client_create']);

    Route::post('create',              ['uses' => 'ClientController@store',   'as' => 'client_create']);

    Route::get('{id}/{people}/edit',   ['uses' => 'ClientController@edit',    'as' => 'client_edit']);

    Route::put('{id}/{people}/update', ['uses' => 'ClientController@update',  'as' => 'client_update']);

    Route::get('{id}/{people}',        ['uses' => 'ClientController@destroy', 'as' => 'client_delete']);
});

// Routes Consigning Client
Route::group(['prefix' => 'consigning/{client}', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'System'], function(){

    Route::get('/',           ['uses' => 'ConsigningController@index',   'as' => 'consigning_home']);

    Route::get('create',      ['uses' => 'ConsigningController@create',  'as' => 'consigning_create']);

    Route::post('create',     ['uses' => 'ConsigningController@store',   'as' => 'consigning_create']);

    Route::get('{id}/edit',   ['uses' => 'ConsigningController@edit',    'as' => 'consigning_edit']);

    Route::put('{id}/update', ['uses' => 'ConsigningController@update',  'as' => 'consigning_update']);

    Route::get('{id}',        ['uses' => 'ConsigningController@destroy', 'as' => 'consigning_delete']);
});

// Routes Package
Route::group(['prefix' => 'package', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'System'], function(){

    Route::get('/',           ['uses' => 'PackageController@index',   'as' => 'package_home']);

    Route::get('create',      ['uses' => 'PackageController@create',  'as' => 'package_create']);

    Route::post('create',     ['uses' => 'PackageController@store',   'as' => 'package_create']);

    Route::get('{id}/edit',   ['uses' => 'PackageController@edit',    'as' => 'package_edit']);

    Route::put('{id}/update', ['uses' => 'PackageController@update',  'as' => 'package_update']);

    Route::get('{id}',        ['uses' => 'PackageController@destroy', 'as' => 'package_delete']);
});

// Language
Route::group(['middleware' => ['web']], function () {

    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
});