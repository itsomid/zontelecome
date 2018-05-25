<?php

namespace App\Http\Controllers\Panel;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
          $orders = Order::with('payment','products')->where('by_admin','0')->get();
        return view('panel.payment',['orders'=>$orders]);
    }
}
