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

Route::get('/', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout')->name('logout');

// Route::get('/home', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     return view('tes', ['pesan' => 'ini pesan dari route']);
// });

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('admin/category/create', 'CategoryController@create');

    Route::post('admin/category/store', 'CategoryController@store');

    Route::get('admin/category', 'CategoryController@index');
    Route::get('admin/category/continue-destroy/{id}', 'CategoryController@destroy2');

    Route::get('admin/category/{id}', 'CategoryController@show')->where('id', '[0-9]+');
    Route::get('admin/category/{id}/edit', 'CategoryController@edit')->where('id', '[0-9]+');
    Route::put('admin/category/{id}', 'CategoryController@update')->where('id', '[0-9]+');
    Route::delete('admin/category/{id}', 'CategoryController@destroy')->where('id', '[0-9]+');

    Route::resource('admin/product', 'ProductController');
    Route::get('product/export', 'ProductController@export');

    Route::get('admin/transaction/create', 'TransactionController@create');
    Route::post('admin/transaction/import', 'TransactionController@import');
    Route::get('admin/transaction', 'TransactionController@index');
});
