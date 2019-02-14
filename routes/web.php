<?php
use App\User;
use App\Role;
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

Route::get('/product', function () {
    return view('Product.index');
})->name('product');


Route::get('/user', function () {
    return view('User.index');
})->name('user');

Route::get('/report', function () {
    return view('Report.index');
})->name('report');

Route::get('/product/create', function () {
    return view('Category.create');
});

Route::get('/product/update', function () {
    return view('Category.update');
});

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::resource('category','CategoryController');
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
});

Auth::routes();

Route::get('/healthcheck', 'HealthCheckController@index')->name('healthcheck')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

