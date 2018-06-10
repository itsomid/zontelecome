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

Route::get('/','HomeViewController@index')->name('website/home');

Route::get('/product/{slug}', 'ProductController@getProduct')->name('website/product');


Route::group(['prefix'=>'refill'],function (){
    Route::get('/', 'RefillController@index')->name('website/refill');
});
Route::group(['prefix'=>'order'],function () {
    Route::get('/track', 'OrderController@index')->name('website/order/track');
    Route::get('/cart', 'OrderController@getCart')->name('website/cart');
    Route::get('/cart/item', 'OrderController@cartItem')->name('website/order/cart/item');
    Route::post('/cart/item', 'OrderController@cartItem')->name('website/order/cart/item');

    Route::group(['prefix'=>'remove/product'],function (){
        Route::post('/','OrderController@removeProductFromCart')->name('website/remove/product');
        Route::post('/item','OrderController@removeItemFromCart')->name('website/remove/product/item');
    });
    Route::post('add/product/item','OrderController@addItemToCart')->name('website/add/product/item');
});

Route::get('/payment/result','PaymentController@squareup')->name('website/payment/result');




//panel
Route::group(['prefix' => 'panel', 'middleware' => ['auth']], function () {
    Route::get('/', 'Panel\DashboardController@index')->name('panel');
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'Panel\ProductController@index')->name('panel/product');
        Route::get('/{slug}','Panel\ProductController@getProduct')->name('panel/get/product');
        Route::post('/edit/package/{slug}','Panel\ProductController@editPackage')->name('panel/edit/package');
        Route::post('/edit/package/{id}','Panel\ProductController@deletePackage')->name('panel/delete/package');
        Route::post('/edit/product/{id}','Panel\ProductController@editProduct')->name('panel/edit/product');
        Route::post('/get/info','Panel\ProductController@getproductInfo')->name('panel/product/info');

    });
    Route::group(['prefix'=>'order'],function (){
        Route::get('/','Panel\OrderController@index')->name('panel/get/allorder');
        Route::get('/edit/{uid}','Panel\OrderController@getOrder')->name('panel/get/order');
        Route::post('/edit/{uid}','Panel\OrderController@editOrder')->name('panel/edit/order');
        Route::get('/new','Panel\OrderController@newOrder')->name('panel/get/neworder');
        Route::post('/new','Panel\OrderController@addnewOrder')->name('panel/add/newOrder');

    });
    Route::get('/refill','Panel\RefillController@index')->name('panel/refill');
    Route::get('/payments','Panel\PaymentController@index')->name('panel/payment');
    Route::get('/setting','Panel\SettingController@index')->name('panel/setting');
    Route::post('/setting','Panel\SettingController@edit')->name('panel/change/setting');
});
