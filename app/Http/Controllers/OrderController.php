<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        return view('tracking_order');
    }

    public function getCartItem(Request $request)
    {
        if ($request->isMethod('post')){
            $product = Product::whereSlug($request->name)->first();
            session()->push('cart.item',$product->slug);
            return count(session()->get('cart.item'));
        }
        elseif($request->isMethod('get')){
            if (session()->has('cart.item'))
            {
                $cart_item = session()->get('cart.item');
                return count($cart_item);
            }
            else{
                return 0;
            }
        }

    }
}
