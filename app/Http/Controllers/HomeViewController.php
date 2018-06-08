<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    public function index()
    {
//        session()->put('cart.item','omid');
//        session()->flash('cart');
        $products = Product::whereType('physical')->get();
        return view('welcome',['products'=>$products]);
    }

}
