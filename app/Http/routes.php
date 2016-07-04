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

// AUTHENTICATING
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

// DASHBOARD
// Routes Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth'], 'namespace' => 'Dashboard'], function(){

    Route::get('/',      ['uses' => 'DashboardController@index',  'as' => 'home']);

    Route::get('client', ['uses' => 'DashboardController@client', 'as' => 'dashboard_client']);

    Route::get('admin',  ['uses' => 'DashboardController@admin',  'as' => 'dashboard_admin']);

});

// SUPER ADMIN
// Routes Administrator
Route::group(['prefix' => 'administrator', 'middleware' => ['web', 'auth', 'super_admin'], 'namespace' => 'Super'], function(){

    Route::get('/',                    ['uses' => 'AdministratorController@index',   'as' => 'administrator_home']);

    Route::get('create',               ['uses' => 'AdministratorController@create',  'as' => 'administrator_create']);

    Route::post('create',              ['uses' => 'AdministratorController@store',   'as' => 'administrator_create']);

    Route::get('{id}/{people}/edit',   ['uses' => 'AdministratorController@edit',    'as' => 'administrator_edit']);

    Route::put('{id}/{people}/update', ['uses' => 'AdministratorController@update',  'as' => 'administrator_update']);

    Route::get('{id}/{people}',        ['uses' => 'AdministratorController@destroy', 'as' => 'administrator_delete']);
});

// Routes Profiles
Route::group(['prefix' => 'profile', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Super'], function(){

    Route::get('/',           ['uses' => 'ProfileController@index',   'as' => 'profile_home']);

    Route::get('create',      ['uses' => 'ProfileController@create',  'as' => 'profile_create']);

    Route::post('create',     ['uses' => 'ProfileController@store',   'as' => 'profile_create']);

    Route::get('{id}/edit',   ['uses' => 'ProfileController@edit',    'as' => 'profile_edit']);

    Route::put('{id}/update', ['uses' => 'ProfileController@update',  'as' => 'profile_update']);

    Route::get('{id}/config', ['uses' => 'ProfileController@show',    'as' => 'profile_config']);

    Route::put('{id}/assign', ['uses' => 'ProfileController@assign',  'as' => 'profile_assign']);

    Route::get('{id}',        ['uses' => 'ProfileController@destroy', 'as' => 'profile_delete']);
});

// ADMIN
// Routes Employees
Route::group(['prefix' => 'employee', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Admin'], function(){

    Route::get('/',                    ['uses' => 'EmployeeController@index',   'as' => 'employee_home']);

    Route::get('create',               ['uses' => 'EmployeeController@create',  'as' => 'employee_create']);

    Route::post('create',              ['uses' => 'EmployeeController@store',   'as' => 'employee_create']);

    Route::get('{id}/{people}/edit',   ['uses' => 'EmployeeController@edit',    'as' => 'employee_edit']);

    Route::put('{id}/{people}/update', ['uses' => 'EmployeeController@update',  'as' => 'employee_update']);

    Route::get('{id}/{people}',        ['uses' => 'EmployeeController@destroy', 'as' => 'employee_delete']);
});

// Routes Reception Centers
Route::group(['prefix' => 'reception_center', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Admin'], function(){

    Route::get('/',           ['uses' => 'ReceptionCenterController@index',   'as' => 'reception_center_home']);

    Route::get('create',      ['uses' => 'ReceptionCenterController@create',  'as' => 'reception_center_create']);

    Route::post('create',     ['uses' => 'ReceptionCenterController@store',   'as' => 'reception_center_create']);

    Route::get('{id}/edit',   ['uses' => 'ReceptionCenterController@edit',    'as' => 'reception_center_edit']);

    Route::put('{id}/update', ['uses' => 'ReceptionCenterController@update',  'as' => 'reception_center_update']);

    Route::get('{id}',        ['uses' => 'ReceptionCenterController@destroy', 'as' => 'reception_center_delete']);
});

// Routes Support Tickets
Route::group(['prefix' => 'ticket', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Support'], function(){

    Route::get('/',           ['uses' => 'TicketsController@index',   'as' => 'ticket_home']);

    Route::get('create',      ['uses' => 'TicketsController@create',  'as' => 'ticket_create']);

    Route::post('create',     ['uses' => 'TicketsController@store',   'as' => 'ticket_create']);

    Route::get('{id}/edit',   ['uses' => 'TicketsController@edit',    'as' => 'ticket_edit']);

    Route::put('{id}/update', ['uses' => 'TicketsController@update',  'as' => 'ticket_update']);

    Route::get('{id}',        ['uses' => 'TicketsController@destroy', 'as' => 'ticket_delete']);
});

// Routes Support Answer
Route::group(['prefix' => 'answer', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Support'], function(){

    Route::get('/',            ['uses' => 'AnswerController@index',  'as' => 'answer_home']);

    Route::get('{id}/create',  ['uses' => 'AnswerController@create', 'as' => 'answer_create']);

    Route::post('{id}/create', ['uses' => 'AnswerController@store',  'as' => 'answer_create']);
});

// Routes Roads
Route::group(['prefix' => 'road', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Admin'], function(){

    Route::get('/',           ['uses' => 'RoadController@index',   'as' => 'road_home']);

    Route::get('create',      ['uses' => 'RoadController@create',  'as' => 'road_create']);

    Route::post('create',     ['uses' => 'RoadController@store',   'as' => 'road_create']);

    Route::get('{id}/edit',   ['uses' => 'RoadController@edit',    'as' => 'road_edit']);

    Route::put('{id}/update', ['uses' => 'RoadController@update',  'as' => 'road_update']);

    Route::get('{id}',        ['uses' => 'RoadController@destroy', 'as' => 'road_delete']);
});

// Routes Box
Route::group(['prefix' => 'box', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'Admin'], function(){

    Route::get('/',           ['uses' => 'BoxController@index',   'as' => 'box_home']);

    Route::get('create',      ['uses' => 'BoxController@create',  'as' => 'box_create']);

    Route::post('create',     ['uses' => 'BoxController@store',   'as' => 'box_create']);

    Route::get('{id}/status', ['uses' => 'BoxController@show',    'as' => 'box_status']);

    Route::get('{id}/edit',   ['uses' => 'BoxController@edit',    'as' => 'box_edit']);

    Route::put('{id}/update', ['uses' => 'BoxController@update',  'as' => 'box_update']);

    Route::get('{id}',        ['uses' => 'BoxController@destroy', 'as' => 'box_delete']);
});

// CLIENT
// Routes Client
Route::group(['prefix' => 'client', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'System\Client'], function(){

    Route::get('/',                    ['uses' => 'ClientController@index',   'as' => 'client_home']);

    Route::get('create',               ['uses' => 'ClientController@create',  'as' => 'client_create']);

    Route::post('create',              ['uses' => 'ClientController@store',   'as' => 'client_create']);

    Route::get('{id}/{people}/edit',   ['uses' => 'ClientController@edit',    'as' => 'client_edit']);

    Route::put('{id}/{people}/update', ['uses' => 'ClientController@update',  'as' => 'client_update']);

    Route::get('{id}/{people}',        ['uses' => 'ClientController@destroy', 'as' => 'client_delete']);
});

// Routes Consigning Client
Route::group(['prefix' => 'consigning/{client}', 'middleware' => ['web', 'auth'], 'namespace' => 'System\Client'], function(){

    Route::get('/',           ['uses' => 'ConsigningController@index',   'as' => 'consigning_home']);

    Route::get('create',      ['uses' => 'ConsigningController@create',  'as' => 'consigning_create']);

    Route::post('create',     ['uses' => 'ConsigningController@store',   'as' => 'consigning_create']);

    Route::get('{id}/edit',   ['uses' => 'ConsigningController@edit',    'as' => 'consigning_edit']);

    Route::put('{id}/update', ['uses' => 'ConsigningController@update',  'as' => 'consigning_update']);

    Route::get('{id}',        ['uses' => 'ConsigningController@destroy', 'as' => 'consigning_delete']);
});

// PACKAGE
// Routes Package
Route::group(['prefix' => 'package', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'System\Package'], function(){

    Route::get('/',           ['uses' => 'PackageController@index',        'as' => 'package_home']);

    Route::get('create',      ['uses' => 'PackageController@create',       'as' => 'package_create']);

    Route::post('create',     ['uses' => 'PackageController@store',        'as' => 'package_create']);

    Route::get('{id}/edit',   ['uses' => 'PackageController@edit',         'as' => 'package_edit']);

    Route::put('{id}/update', ['uses' => 'PackageController@update',       'as' => 'package_update']);

    Route::post('status',     ['uses' => 'StatusPackageController@status', 'as' => 'package_change_status']);
});

// Routes Shipment
Route::group(['prefix' => 'shipment', 'middleware' => ['web', 'auth', 'admin'], 'namespace' => 'System\Package'], function(){

    Route::get('/',           ['uses' => 'ShipmentController@index',  'as' => 'shipment_home']);

    Route::get('create',      ['uses' => 'ShipmentController@create', 'as' => 'shipment_create']);

    Route::post('create',     ['uses' => 'ShipmentController@store',  'as' => 'shipment_create']);

    Route::get('{id}/edit',   ['uses' => 'ShipmentController@edit',   'as' => 'shipment_edit']);

    Route::put('{id}/update', ['uses' => 'ShipmentController@update', 'as' => 'shipment_update']);
});

// PANEL
// Routes Profile Panel
Route::group(['prefix' => 'panel', 'middleware' => ['web', 'auth'], 'namespace' => 'System\Panel'], function(){

    Route::get('/',                    ['uses' => 'AccountController@index',  'as' => 'panel_home']);

    Route::get('password',             ['uses' => 'AccountController@create', 'as' => 'panel_password']);

    Route::post('password',            ['uses' => 'AccountController@store',  'as' => 'panel_password']);

    Route::get('personal',             ['uses' => 'AccountController@edit',   'as' => 'panel_personal']);

    Route::put('{id}/{people}/update', ['uses' => 'AccountController@update', 'as' => 'panel_update']);

    Route::get('image_profile',        ['uses' => 'AccountController@show',   'as' => 'panel_image']);

    Route::post('image_profile',       ['uses' => 'AccountController@file',   'as' => 'panel_image']);
});

// Routes Panel Package Client
Route::group(['prefix' => 'my_package', 'middleware' => ['web', 'auth'], 'namespace' => 'System\Panel'], function(){

    Route::get('/',           ['uses' => 'PackageController@index',   'as' => 'my_package_home']);

    Route::get('create',      ['uses' => 'PackageController@create',  'as' => 'my_package_create']);

    Route::post('create',     ['uses' => 'PackageController@store',   'as' => 'my_package_create']);

    Route::get('{id}/edit',   ['uses' => 'PackageController@edit',    'as' => 'my_package_edit']);

    Route::put('{id}/update', ['uses' => 'PackageController@update',  'as' => 'my_package_update']);

    Route::get('{id}',        ['uses' => 'PackageController@destroy', 'as' => 'my_package_delete']);
});

// Routes Support
Route::group(['prefix' => 'support', 'middleware' => ['web', 'auth'], 'namespace' => 'Support'], function(){

    Route::get('/',           ['uses' => 'SupportController@index',   'as' => 'support_home']);

    Route::get('create',      ['uses' => 'SupportController@create',  'as' => 'support_create']);

    Route::post('create',     ['uses' => 'SupportController@store',   'as' => 'support_create']);

    Route::get('{id}/answer', ['uses' => 'SupportController@view',    'as' => 'support_answer']);
});

// AJAX
// Routes AJAX
Route::group(['prefix' => 'ajax', 'middleware' => ['web', 'auth'], 'namespace' => 'System'], function(){

    Route::get('client',     ['uses' => 'AjaxController@validate_client',   'as' => 'ajax_dni_client']);

    Route::get('consigning', ['uses' => 'AjaxController@consigning_client', 'as' => 'ajax_consigning_client']);
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