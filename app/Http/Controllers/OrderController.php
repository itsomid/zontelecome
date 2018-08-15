<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use p3ym4n\JDate\JDate;

class OrderController extends Controller
{
    public function trackOrder()
    {

        return view(config('app.locale').'.order_track');
    }

    public function getOrderSituation(Request $request)
    {

         $order_uid = Order::realId($request->order_uid);
        if (!$order_uid)
            return \Redirect::back()->with('message', "Order not exist!");
        $order = Order::with('products','allPayments')->whereId($order_uid)->first();
        $pay = $order->allPayments()->orderBy('created_at', 'desc')->first();
//        return JDate::createFromCarbon(Carbon::now());

//        if ($order->by_admin == 1)
//            return \Redirect::back()->with('message', "Order not exist!");
        return view(config('app.locale').'.order_situation',['order'=>$order,'pay'=>$pay]);

    }



}
