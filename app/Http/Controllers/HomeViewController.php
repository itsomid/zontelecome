<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    public function index()
    {

        $products = Product::whereType('physical')->get();
        return view('welcome',['products'=>$products]);
    }

}
