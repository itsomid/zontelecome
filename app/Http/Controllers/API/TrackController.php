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
        return $order = Order::whereId($id)->with('products')->first();

    }


}
