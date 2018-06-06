<?php

namespace App\Http\Controllers\API;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackController extends Controller
{
    public function getOrder($uid)
    {

        $id = Order::realId($uid);
        if (empty($id))
            return abort(404);
       $order = Order::whereId($id)->with('products','payment')->first()->makeHidden('tax');
       if($order->status != 'initializing' && $order->status != 'canceled')
            return $order;
        else
            return abort(404);


    }


}
