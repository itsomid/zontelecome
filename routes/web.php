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
Route::get('/contact','HomeViewController@contact')->name('website/contact');
Route::get('/privacy','HomeViewController@privacy');

Route::get('/product/{slug}', 'ProductController@getProduct')->name('website/product');
Route::get('/spark',function (){
    Mail::send('en.emails.test', [], function ($message) {
        $message
            ->from('info@zontelecom.ca', 'Your Name')
      ->to('o.shabani@hotmail.com', 'Receiver Name')
      ->subject('From SparkPost with');
  });
});


Route::group(['prefix'=>'refill'],function (){
    Route::get('/', 'RefillController@index')->name('website/refill');
    Route::get('/balance', 'RefillController@refillBalance')->name('website/refill/balance');
    Route::post('/balance', 'RefillController@refillBalance')->name('website/refill/balance');
    Route::get('/plan/{slug}', 'RefillController@dataPlan')->name('website/refill/plan');

});
Route::group(['prefix'=>'order'],function () {
    Route::get('/track', 'OrderController@trackOrder')->name('website/order/track');
    Route::post('/track/situation','OrderController@getOrderSituation')->name('website/order/track/situation');

    Route::group(['prefix'=>'cart'],function (){
        Route::get('/', 'CartController@getCart')->name('website/cart');
        Route::get('/item', 'CartController@cartItem')->name('website/order/cart/item');
        Route::post('/item', 'CartController@cartItem')->name('website/order/cart/item');
    });


    Route::group(['prefix'=>'product'],function (){
        Route::post('remove/','CartController@removeProductFromCart')->name('website/remove/product');
        Route::post('remove/item','CartController@removeItemFromCart')->name('website/remove/product/item');
        Route::post('add/item','CartController@addItemToCart')->name('website/add/product/item');
    });


});
Route::group(['prefix'=>'payment'],function () {
    Route::post('/product/createpayment', 'PaymentController@createPaymentForProduct')->name('website/product/payment/create');
    Route::post('/data/createpayment', 'PaymentController@createPaymentForData')->name('website/data/payment/create');
    Route::get('/result/{order_uid}', 'PaymentController@webResult')->name('website/payment/result');
});
Route::group(['prefix' => 'bank'], function () {

    Route::group(['prefix' => 'zpal'], function () {
        Route::get('/callback', 'ZarinPalController@webCallback')->name('web/zarinpal/callback');
        Route::get('redirect/{token}', 'ZarinPalController@redirectToBank');
    });
    Route::get('/redirect/{token}', '\ZarinpalC@redirectToBank')->name('bank/redirect');
    Route::get('/pay/result/{result}/{order_uid}', 'PaymentController@zarinPalWebResult')->name('website/bank/result');

});
Route::group(['prefix'=>'pdf'],function (){
    Route::get('/1',function (){
       return view('en.pdf.pdf');
    });
    Route::post('/create','PdfController@pdfCreator')->name('pdf/create');
    Route::get('/{file_name}','PdfController@getPdf')->name('pdf/get');
});



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
        Route::get('/get/{uid}','Panel\OrderController@getOrder')->name('panel/get/order');
        Route::post('/edit/{uid}','Panel\OrderController@editOrder')->name('panel/edit/order');
        Route::get('/new','Panel\OrderController@newOrder')->name('panel/get/neworder');
        Route::post('/new','Panel\OrderController@addnewOrder')->name('panel/add/newOrder');

    });
    Route::get('/refill','Panel\RefillController@index')->name('panel/refill');
    Route::get('/payments','Panel\PaymentController@index')->name('panel/payment');
    Route::get('/setting','Panel\SettingController@index')->name('panel/setting');
    Route::post('/setting','Panel\SettingController@edit')->name('panel/change/setting');
});
