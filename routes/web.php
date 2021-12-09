<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/chokri', function () {
    return view('choko');
});
Route::get('/miloud', 'HomeController@index');

Route::get('/home', 'HomeController@index');

//Employee route
Route::get('/employee', 'EmployeeController@index');

Route::get('add-employee', 'EmployeeController@create');

Route::post('add-employee', 'EmployeeController@store');	

Route::get('edit-employee/{id}', 'EmployeeController@edit');

Route::put('update-employee/{id}', 'EmployeeController@update');

Route::get('delete-employee/{id}', 'EmployeeController@destry');
//statistics
Route::get('/stat', 'EmployeeController@Stat');