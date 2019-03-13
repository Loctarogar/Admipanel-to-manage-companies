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

Auth::routes();

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
    Route::get('index', 'EmployeeController@index')->name('index');
    Route::get('create', 'EmployeeController@create')->name('create');
    Route::post('store', 'EmployeeController@store')->name('store');
    Route::get('{employee}/edit', 'EmployeeController@edit')->name('edit');
    Route::patch('update/{employee}', 'EmployeeController@update')->name('update');
    Route::delete('delete/{employee}', 'EmployeeController@destroy')->name('destroy');
});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('index', 'AdminController@index')->name('index');
});
