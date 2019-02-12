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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('users', function () {
        return "Hello";
    });
});

Auth::routes();

Route::get('/healthcheck', 'HealthCheckController@index')->name('healthcheck')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

