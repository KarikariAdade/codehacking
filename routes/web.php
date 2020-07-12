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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return view('admin.index'); 
});

//ADMIN USERS

// Route::resource('admin/users', 'AdminUsersController');
Route::get('admin/users', 'AdminUsersController@index')->name('admin-users');
Route::get('admin/users/create', 'AdminUsersController@create')->name('create-admin-users');
Route::post('admin/users/store', 'AdminUsersController@store')->name('store-admin-users');
Route::get('admin/users/edit/{id}', 'AdminUsersController@edit')->name('admin-users-edit');
Route::patch('admin/users/update/{id}', 'AdminUsersController@update')->name('admin-users-update');

