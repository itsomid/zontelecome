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

    public function cartItem(Request $request)
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
    public function getCart()
    {
        $cart_item = session()->get('cart.item');
//        $cart_item = ['zonetel-modem','zonetel-modem','zonetel-modem','zonefi-global-modem','zone-global-modem'];
        if (!empty($cart_item)>0)
        {
            foreach ($cart_item as $key=>$item)
                $products[$item][]= Product::whereSlug($item)->first();
        }
        else{
            $products = [];
        }

        return view('cart',['products'=>$products]);
    }

    public function removeProductFromCart(Request $request)
    {
         $cart_items =  session()->get('cart.item');

        foreach ($cart_items as $key => $cart_item) {

            if($cart_item == $request->slug) {
                unset($cart_items[$key]);
            }
        }
         session()->put('cart.item',$cart_items);


        return $cart_items;
    }

    public function removeItemFromCart(Request $request)
    {
        $cart_items =  session()->get('cart.item');
        foreach ($cart_items as $key => $cart_item) {
            if($cart_item == $request->slug) {
                unset($cart_items[$key]);
                break;
            }
        }
        session()->put('cart.item',$cart_items);

        return  $cart_items;
    }

    public function addItemToCart(Request $request)
    {
        $cart_items =  session()->get('cart.item');
        array_push($cart_items,$request->slug);
        session()->put('cart.item',$cart_items);

        return  $cart_items;
    }
}
