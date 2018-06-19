<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function trackOrder()
    {

        return view(config('app.locale').'.order_track');
    }

    public function getOrderSituation(Request $request)
    {
        $order_uid = Order::realId($request->order_uid);
        $order = Order::with('products','payment')->whereId($order_uid)->first();

        return view(config('app.locale').'.order_situation',['order'=>$order]);

    }



}
