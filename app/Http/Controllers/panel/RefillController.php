<?php

namespace App\Http\Controllers\Panel;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefillController extends Controller
{
    public function index()
    {
               $orders = Order::with('virtualProduct')->get();

                 return view('panel.refill',['orders'=>$orders]);
    }
}
