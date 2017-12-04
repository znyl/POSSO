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



Auth::routes();
Route::post('/test','frontController@test');
Route::get('/','frontController@index');
Route::get('/product/category/{id}','frontController@product');
Route::get('/product/detailed/{id}','frontController@productDetailed');
Route::get('/MUA/profile','frontController@mua');
Route::post('/addCart','cartController@addCart');
Route::post('/refreshCart','cartController@refreshCart');
Route::post('/deleteCart','cartController@deleteCart');
Route::get('/cart','cartController@index');

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

Route::get('/admin/discount/index','discountController@index');
Route::get('/admin/discount/addForm', 'discountController@addForm');
Route::get('/admin/discount/addCart/{productId}/{diskon}/{tipe}', 'discountController@addCart');
Route::get('/admin/discount/removeCart/{id}','discountController@removeCart');
Route::post('/admin/discount/insertGroup','discountController@insertGroup');
Route::post('/admin/discount/insertSingle','discountController@insertSingle');

Route::post('/admin/size/insertSize','productSizeController@insert');
Route::get('/admin/size/editForm/{id}','productSizeController@edit');
Route::post('/admin/size/updateSize','productSizeController@update');

Route::get('/admin/order/index','orderController@index');




