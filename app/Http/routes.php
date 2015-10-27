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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/companies/', 'Admin\CompanyController@index');
Route::get('admin/companies/edit/{id}', 'Admin\CompanyController@getEdit');
Route::post('admin/companies/edit/', 'Admin\CompanyController@postEdit');
Route::get('admin/companies/add/', 'Admin\CompanyController@getAdd');
Route::post('admin/companies/add/', 'Admin\CompanyController@postAdd');
