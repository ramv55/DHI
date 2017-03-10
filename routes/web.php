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
    return view('login');
});

Route::get('login', array(
  'uses' => 'Auth\LoginController@showLogin'
));

Route::post('login', array(
  'uses' => 'Auth\LoginController@doLogin'
));

Route::get('dashboard',
array('uses' => 'DashboardController@index')
);
//alerts
Route::get('alerts', array(
  'uses'  =>  'AlertsController@index'
));
//companies
Route::get('companies', array(
  'uses'  => 'CompanyController@index'
));

Route::post('searchcompany', array(
  'uses'  => 'CompanyController@index'
));

Route::get('addcompany', array(
  'uses'  => 'CompanyController@addCompany'
));


Route::post('addCompanyDet', array(
  'uses'  => 'CompanyController@store'
));

Route::get('editcompany/{id}', array(
  'uses'  => 'CompanyController@edit'
));

Route::post('updateCompanyDet', array(
  'uses'  => 'CompanyController@update'
));

Route::get('deleteCompany', array(
  'uses'  => 'CompanyController@delete'
));

//properties
Route::get('properties', array(
  'uses'  => 'PropertyController@index'
));

Route::get('addproperty', array(
  'uses'  => 'PropertyController@addProperty'
));

Route::post('addProperty',array(
  'uses'  =>  'PropertyController@add'
));

Route::post('updateproperty',array(
  'uses'  =>  'PropertyController@update'
));

Route::post('addBuilding', array(
  'uses'  => 'BuildingController@add'
));

//inspections
Route::get('inspections', array(
  'uses'  => 'InspectionController@index'
));

//5yr lookback
Route::get('5yrlookback', array(
  'uses'  => 'FiveyrlookbackController@index'
));

Route::get('5yrlookbackinfo', array(
  'uses'  => 'FiveyrlookbackController@fiveYrLookbackInfo'
));

//settings
Route::get('settings/password', array(
  'uses' => 'SettingsPassword@index'
));

//change admin password
Route::post('settings/password', array(
  'uses' => 'SettingsPassword@update'
));

//setting - alerts
Route::get('settings/alerts', array(
  'uses'  => 'SettingsAlerts@index'
));

//setting - Add alerts
Route::post('settings/alerts', array(
  'uses'  => 'SettingsAlerts@addUpdate'
));


//settings - logo
Route::get('settings/logos',array(
  'uses'  => 'SettingsLogo@index'
));

//settings - add logo
Route::post('settings/logos',array(
  'uses'  => 'SettingsLogo@store'
));

//settings - update logo
Route::post('updatelogo',array(
  'uses'  => 'SettingsLogo@update'
));

//settings - Delete logo
Route::get('deleteLogo/{id}',array(
  'uses'  => 'SettingsLogo@delete'
));


//settings - inspectors
Route::get('settings/inspectors',array(
  'uses'  => 'SettingsInspectors@index'
));

//settings - Add inspectors
Route::post('settings/inspectors',array(
  'uses'  => 'SettingsInspectors@store'
));

//settings - update inspectors
Route::post('updateInspectors',array(
  'uses'  => 'SettingsInspectors@update'
));

//settings - delete inspector
Route::get('deleteinspectors/{id}',array(
  'uses'  => 'SettingsInspectors@delete'
));

//settings - users
Route::get('settings/users',array(
  'uses'  => 'SettingsUsers@index'
));

//settings - logs
Route::get('settings/logs',array(
  'uses'  => 'SettingsLogs@index'
));

//add user
Route::post('adduser',array(
  'uses'  => 'SettingsUsers@add'
));

//update user
Route::post('updateuser',array(
  'uses'  => 'SettingsUsers@update'
));

//delete user
Route::get('deleteuser/{id}',array(
  'uses'  => 'SettingsUsers@removeUser'
));

Route::get('checkEmail',array(
  'uses'  =>  'SettingsUsers@checkEmail'
));
