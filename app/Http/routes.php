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

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('admin/companies/', ['as' => 'admin.companies.index', 'uses' => 'Admin\CompanyController@index']);

Route::get('admin/companies/edit/{id}', ['as' => 'admin.companies.edit.get', 'uses' => 'Admin\CompanyController@getEdit']);
Route::post('admin/companies/edit/', ['as' => 'admin.companies.edit.post', 'uses' => 'Admin\CompanyController@postEdit']);

Route::get('admin/companies/add/', 'Admin\CompanyController@getAdd');
Route::post('admin/companies/add/', ['as' => 'admin.companies.add', 'uses' => 'Admin\CompanyController@postAdd']);

Route::delete('admin/companies/delete/', ['as' => 'admin.companies.delete', 'uses' => 'Admin\CompanyController@delete']);
