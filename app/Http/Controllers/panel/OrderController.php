<?php

namespace App\Http\Controllers\Panel;

use App\Cart;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get();
        $tax = \DB::table('setting')->pluck('tax_fee')->first();

        return view('panel.order',['orders'=>$orders,'tax'=>$tax]);
    }

    public function getOrder($uid)
    {
       $id = Order::realId($uid);
       $order = Order::whereId($id)->with('products')->first();

        return view('panel.order_edit',['order'=>$order]);
    }

    public function editOrder(Request $request,$uid)
    {
        $id = Order::realId($uid);
        $order = Order::whereId($id)->with('products')->first();
        $order->c_name = $request->c_name;
        $order->c_city = $request->city;
        $order->c_zip= $request->zipcode;
        $order->c_state= $request->c_state;
        $order->status = $request->status;
        $order->c_mail = $request->c_mail;
        $order->c_address = $request->c_address;
        $order->c_country = $request->c_country;
        $order->description = $request->input('order_description');

        $order->save();
        foreach ($order->products as $product)
        {

            $product->description = $request->p_description[$product->id];
            $product->save();
        }

        return \Redirect::back();
    }
    public function newOrder()
    {

        $products =  Product::whereType('physical')->get();
        $tax = \DB::table('setting')->pluck('tax_fee')->first();
        return view('panel.order_new',['products'=>$products,'tax'=>$tax]);
    }

    public function addnewOrder(Request $request)
    {
        $order = new Order;
        $order->by_admin = true;
        $order->c_mail = $request->c_mail;
        $order->c_name = $request->c_name;
        $order->c_address = $request->c_address;
        $order->c_state = $request->c_state;
        $order->c_city = $request->city;
        $order->c_country = $request->c_country;
        $order->c_zip = $request->zipcode;
        $order->total_price = $request->c_country;
        $order->description = $request->c_country;
        $order->status = "ready to deliver";

        if($order->save()) {
//
            $insertedId = $order->id;

        }

        foreach ($request->p_name as $key=>$item){


            $cart = new Cart;

            $product = Product::whereSlug($item)->first();
            $cart->product_id = $product->id;
            $cart->quantity = $request->p_quantity[$key];
            $cart->description = $request->p_description[$key];
            $cart->order_id = $insertedId;
            $cart->save();

        }
        return \Redirect::back();

    }


    
}
