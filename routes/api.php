<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'org'],function (){

   Route::get('/device/{device_id}','API\RefillController@getDeviceInfo');
   Route::get('/refill/history/{device_id}','API\RefillController@refillHistory');

   Route::get('/plan/{device_id}','API\RefillController@getDataPlan');

//   Route::post('/pay/')
    Route::get('/order/{uid}','API\TrackController@getOrder');
    Route::get('/tax','API\SettingController@getSetting');
    Route::group(['prefix'=>'payment'],function () {
        Route::post('/data/createpayment', 'API\PaymentController@createPaymentForData')->name('website/data/payment/create');
        Route::get('/result/{uid}', 'API\PaymentController@squareMobResult')->name('mobile/payment/result');
    });
    Route::group(['prefix' => 'bank'], function () {

        Route::group(['prefix' => 'zpal'], function () {
            Route::get('/callback', 'ZarinPalController@callback')->name('zarinpal/callback');
            Route::get('redirect/{token}', 'ZarinPalController@redirectToBank');
        });
        Route::get('/redirect/{token}', '\ZarinpalC@redirectToBank')->name('bank/redirect');


    });

});
