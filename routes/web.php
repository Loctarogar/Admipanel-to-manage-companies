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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('company')->name('company.')->group(function(){
    Route::get('index', 'CompanyController@index');
    Route::get('create', 'CompanyController@create');
    Route::post('store', 'CompanyController@store')->name('store');
    Route::get('{company}/edit', 'CompanyController@edit')->name('edit');
    Route::patch('update/{company}', 'CompanyController@update')->name('update');
    Route::delete('delete/{company}', 'CompanyController@destroy')->name('destroy');
});

Route::prefix('employee')->name('employee.')->group(function (){
    Route::get('index',  'EmployeeController@index')->name('index');
    Route::get('create', 'EmployeeController@create')->name('create');
    Route::post('store', 'EmployeeController@store')->name('store');
    Route::get('{employee}/edit',      'EmployeeController@edit')->name('edit');
    Route::patch('update/{employee}',  'EmployeeController@update')->name('update');
    Route::delete('delete/{employee}', 'EmployeeController@destroy')->name('destroy');
});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('login',           'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('login',          'Auth\AdminLoginController@login')->name('login.submit');
    Route::get('logout',          'Auth\AdminLoginController@logout')->name('logout');

    Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset',  'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\AdminResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('password.reset');

    Route::get('dashboard',       'AdminController@index')->name('dashboard');
    Route::get('profile',         'AdminController@getUser')->name('profile');
    Route::get('companies',       'AdminController@getCompanies')->name('companies')->middleware('lastEnter');
    Route::get('employees',       'AdminController@getEmployees')->name('employees')->middleware('lastEnter');
    Route::get('company/{id}',  'AdminController@singleCompany')->name('company');
    Route::get('employee/{id}', 'AdminController@singleEmployee')->name('employee');
});


Route::post('userlogout', 'Auth\LoginController@userLogout')->name('userLogout');
Auth::routes();
