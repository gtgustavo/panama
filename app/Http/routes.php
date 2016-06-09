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

// Language
Route::group(['middleware' => 'language'], function () {
    Route::get('language/{language}', function ($language) {
        Session::set('lang', $language);
        return Redirect::back();
    });
});

// Authentication and Password reset Routes...
Route::group(['prefix' => '/', 'namespace' => 'Auth'], function(){

    Route::get('/',             ['uses' => 'AuthController@getLogin',      'as' => 'auth']);

    Route::post('login',        ['uses' => 'AuthController@postLogin',     'as' => 'login']);

    Route::get('logout',        ['uses' => 'AuthController@getLogout',     'as' => 'logout']);

    Route::post('password',     ['uses' => 'PasswordController@postEmail', 'as' => 'password']);

    Route::get('reset/{token}', ['uses' => 'PasswordController@getReset',  'as' => 'reset']);

    Route::post('reset',        ['uses' => 'PasswordController@postReset', 'as' => 'reset']);
});

// Routes Dashboard
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function(){

    Route::get('/', ['uses' => 'DashboardController@admin',   'as' => 'home']);
});

// Routes Profiles
Route::group(['prefix' => 'profile', 'namespace' => 'Administration'], function(){

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
Route::group(['prefix' => 'employee', 'namespace' => 'Administration'], function(){

    Route::get('/',            ['uses' => 'EmployeeController@index',   'as' => 'employee_home']);

    Route::get('create',       ['uses' => 'EmployeeController@create',  'as' => 'employee_create']);

    Route::post('create',      ['uses' => 'EmployeeController@store',   'as' => 'employee_create']);

    Route::get('{id}/edit',    ['uses' => 'EmployeeController@edit',    'as' => 'employee_edit']);

    Route::put('{id}/update',  ['uses' => 'EmployeeController@update',  'as' => 'employee_update']);

    Route::get('{id}',         ['uses' => 'EmployeeController@destroy', 'as' => 'employee_delete']);
});