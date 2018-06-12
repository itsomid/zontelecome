<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function trackOrder()
    {

        return view('tracking_order');
    }


}
