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
    return view('admin/admin-layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'adminController@index');
Route::get('/admin/category/index', 'categoryController@index');
Route::get('/admin/category/edit/{id}', 'categoryController@editForm');
Route::post('/admin/category/insert', 'categoryController@insert');
Route::post('/admin/category/update', 'categoryController@update');

Route::get('/admin/product/index','productController@index');
Route::get('/admin/product/detailed/{id}','productController@detailed');
Route::get('/admin/product/edit/{id}','productController@editForm');
Route::post('/admin/product/insert','productController@insert');
Route::post('/admin/product/update','productController@update');
Route::post('/admin/product/setDiscount','productController@setDiscount');
Route::get('/admin/product/enable/{id}','productController@enable');
Route::get('/admin/product/disable/{id}','productController@disable');
Route::post('/admin/product/insertGambar','productController@insertGambar');
Route::get('/admin/product/setMainPicture/{id}','productController@setMainPicture');

Route::get('/admin/order/index','orderController@index');




