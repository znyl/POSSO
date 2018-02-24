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
Route::get('/contactUs','frontController@contactUs');
Route::post('/contactUs/submit','frontController@contactSubmit');
//shopping cart
Route::post('/addCart','cartController@addCart');
Route::post('/refreshCart','cartController@refreshCart');
Route::get('/deleteCart/{tipe}/{product}/{size}/{warna}','cartController@deleteCart');
Route::get('/cart','cartController@index');
//shopping cart end

//checkout order
Route::get('/formCheckout','frontController@checkOutForm');
Route::post('/checkout','checkOutController@orderCheckout');

Route::post('/customOrder/insert','checkOutController@customOrderCheckout');
Route::get('/formCustom','frontController@customOrderForm');
//checkout order end

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'adminController@index');
Route::get('/admin/category/index', 'categoryController@index');
Route::get('/admin/category/edit/{id}', 'categoryController@editForm');
Route::get('/admin/category/detailed/{id}','categoryController@detailed');
Route::post('/admin/category/insert', 'categoryController@insert');
Route::post('/admin/category/update', 'categoryController@update');
Route::post('/admin/category/setGambar', 'fileController@categoryPicture');

Route::get('/admin/product/index','productController@index');
Route::get('/admin/product/detailed/{id}','productController@detailed');
Route::get('/admin/product/edit/{id}','productController@editForm');
Route::post('/admin/product/insert','productController@insert');
Route::post('/admin/product/update','productController@update');
Route::post('/admin/product/setDiscount','productController@setDiscount');
Route::get('/admin/product/enable/{id}','productController@enable');
Route::get('/admin/product/disable/{id}','productController@disable');
Route::post('/admin/product/insertGambar','fileController@insert');
Route::get('/admin/product/setMainPicture/{id}','productController@setMainPicture');

Route::get('/admin/file/product/delete/{id}','fileController@delete');

Route::get('/admin/discount/index','discountController@index');
Route::get('/admin/discount/addForm', 'discountController@addForm');
Route::get('/admin/discount/addCart/{productId}/{diskon}/{tipe}', 'discountController@addCart');
Route::get('/admin/discount/removeCart/{id}','discountController@removeCart');
Route::post('/admin/discount/insertGroup','discountController@insertGroup');
Route::post('/admin/discount/insertSingle','discountController@insertSingle');

Route::post('/admin/size/insertSize','productSizeController@insert');
Route::get('/admin/size/editForm/{id}','productSizeController@edit');
Route::post('/admin/size/updateSize','productSizeController@update');
Route::get('/admin/size/setStatus/{id}','productSizeController@setStatus');
Route::get('/admin/size/delete/{id}','productSizeController@delete');

Route::post('/admin/color/insert','productColorController@insert');
Route::post('/admin/color/update','productColorController@update');
Route::get('/admin/color/editForm/{id}','productColorController@edit');
Route::get('/admin/color/setStatus/{id}/{status}','productColorController@setStatus');
Route::get('/admin/color/delete/{id}','productColorController@delete');

Route::get('/admin/order/index','orderController@index');
Route::get('/admin/order/delivered','orderController@delivered');
Route::get('/admin/order/rent','orderController@rent');
Route::get('/admin/order/all','orderController@all');
Route::get('/admin/order/{id}','orderController@detailed');
Route::get('/admin/order/{id}/{status}','orderController@statusChange');
Route::get('/admin/order/delete/{id}','orderController@deleteItem');
Route::get('/admin/order/deleteOrder/{id}','orderController@deleteOrder');
Route::get('/admin/order/rent/sent/{id}','orderController@rentSent');
Route::get('/admin/order/rent/returned/{id}','orderController@rentReturned');
Route::get('/admin/order/invoice/view/{id}','orderController@invoiceView');

Route::get('/admin/orderCustom/index','customOrderController@index');
Route::get('/admin/orderCustom/detailed/{id}','customOrderController@detailed');

Route::get('/admin/setting/email/index','settingEmailController@index');
Route::post('/admin/setting/email/update','settingEmailController@update');
Route::get('/sendMail','settingEmailController@send');

Route::get('/admin/data/export/excell/category','exportDataController@category');




