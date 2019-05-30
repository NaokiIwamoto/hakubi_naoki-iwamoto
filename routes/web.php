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
Route::get('/admin/add_admin_user', 'UserController@open_add_admin_page')->name('admin_add');
Route::post('/admin/add_admin_user/register', 'UserController@admin_register')->name('admin_register');
Route::get('/admin/category', 'CategoryController@open_category_admin')->name('open_category_admin');
Route::get('/admin/category/add_category', 'CategoryController@add_category_admin')->name('add_category_admin');
Route::post('/admin/category/add_category/store', 'CategoryController@store_category_admin')->name('store_category_admin');
Route::post('/admin/category/{id}/edit', 'CategoryController@store_category_admin')->name('edit_category_admin');
Route::post('/admin/category/{id}/delete', 'CategoryController@store_category_admin')->name('delete_category_admin');
Route::post('/admin/category/{id}/words', 'CategoryController@store_category_admin')->name('words_admin');
