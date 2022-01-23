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

Route::group(['middleware' => 'auth', 'middleware' => 'isAdmin'], function () {
    Route::get('/reports', 'ReportsController@index');
    Route::get('/reports/create', 'ReportsController@create');
    Route::post('/reports', 'ReportsController@store');
});

Route::get('/home', 'HomeController@index')->name('home');
