<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct($slug)
    {
        $product =  Product::whereSlug($slug)->first();
        return view('product_detail', ['product'=>$product]);
    }


}
