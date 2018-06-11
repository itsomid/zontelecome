<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
        //get total price
        $tax = \DB::table('setting')->first();

        return view('cart',['products'=>$products,'tax'=>$tax]);
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
        ///total_
        $cart_item = array_count_values($cart_items);
        if ($cart_item[$request->slug] < 1)
            return 0;

        $product_price = Product::whereSlug($request->slug)->first()->price;
        $total_price= $cart_item[$request->slug] * $product_price;


        return \Response::json([
            'product_count' => $cart_item[$request->slug],
            'total_count' => count($cart_items),
            'total_price'=>$total_price
        ]);
    }

    public function addItemToCart(Request $request)
    {
        $cart_items =  session()->get('cart.item');

        array_push($cart_items,$request->slug);
        session()->put('cart.item',$cart_items);
        $cart_item = array_count_values($cart_items);
        $product_price = Product::whereSlug($request->slug)->first()->price;
        $total_price= $cart_item[$request->slug] * $product_price;
        return \Response::json([
            'product_count' => $cart_item[$request->slug],
            'total_count' => count($cart_items),
            'total_price'=> $total_price
        ]);
    }
}
