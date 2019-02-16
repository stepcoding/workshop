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

Route::get('/report', function () {
    return view('Report.index');
})->name('report');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::get('product/orderby/{id}', 'ProductController@orderby');
});

Auth::routes();

Route::get('/healthcheck', 'HealthCheckController@index')->name('healthcheck')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

/// for debug
Route::get('db', function () {
    if (DB::connection()->getDatabaseName()) {
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});

// middleware Auth::user() ;
Route::get('user-middleware', function () {
    //

    return Auth::user()->with('roles')->get();

})->middleware('auth');
