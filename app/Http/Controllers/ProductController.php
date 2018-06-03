<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product_detail');
    }

    public function cart()
    {
        return view('cart');
    }
}
