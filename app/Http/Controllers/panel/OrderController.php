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
    public $delivary = false;

    public function index()
    {
         $orders = Order::with('products')->get();


        return view('panel.order',['orders'=>$orders]);
    }

    public function getOrder($uid)
    {
       $id = Order::realId($uid);
       $order = Order::whereId($id)->with('products','cart')->first();
        $item = Cart::whereOrderId($order->id)->get();
        return view('panel.order_edit',['order'=>$order,'item'=>$item]);
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

         $items = Cart::whereOrderId($order->id)->get();
        foreach ($items as $item)
        {

            $item->description = $request->p_description[$item->product_id];
            $item->save();
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

        $total_price = 0;
        $order = new Order;
        $order->by_admin = true;
        $order->c_mail = $request->c_mail;
        $order->c_name = $request->c_name;
        $order->c_address = $request->c_address;
        $order->c_state = $request->c_state;
        $order->c_city = $request->city;
        $order->c_country = $request->c_country;
        $order->c_zip = $request->zipcode;

        $order->status = "ready to deliver";
        foreach ($request->p_name as $key=>$item)
        {
            $price = Product::whereSlug($item)->first()->price;
            $quantity = $request->p_quantity[$key];
            $total_price += $price * $quantity;
        }

          $delivery_fee =  \DB::table('setting')->first()->delivery_fee;
        if($delivery_fee == -1){
            ///do somethings
        }
        else{
            $order->delivery_fee = $delivery_fee;
        }
        $final_price = $this->finalPrice($total_price,$request->discount,$delivery_fee);
        $order->tax = $this->taxCalculate($total_price);
        $order->discount = $request->discount;
        $order->total_price = $final_price;

        if($order->save()) {
            $insertedId = $order->id;
        }

        foreach ($request->p_name as $key=>$item){

            $cart = new Cart;
            $product = Product::whereSlug($item)->first();
            $cart->product_id = $product->id;
            $cart->quantity = $request->p_quantity[$key];
            $cart->description = $request->item_description[$key];
            $cart->order_id = $insertedId;
            $cart->save();

        }
        $new_order= Order::whereId($insertedId)->first();
        return \Redirect::route('panel/get/order',['uid'=>$new_order->uid]);

    }

    public function finalPrice($total_price,$discount,$delivery_fee)
    {
        $tax_percentage =  \DB::table('setting')->first()->tax_fee;
        $tax = $total_price * ($tax_percentage/100);
        $final_price = $total_price + $tax + $delivery_fee  - $discount;
        return $final_price;
    }

    public function taxCalculate($total_price)
    {
        $tax_percentage =  \DB::table('setting')->first()->tax_fee;
        $tax = $total_price * ($tax_percentage/100);
        return $tax;
    }


    
}
