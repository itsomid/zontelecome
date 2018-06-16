<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function create(Request $request)
    {

        $total_price = 0;
        $discount = 0;
        $cart_items = session()->get('cart.item');


        foreach ($cart_items as $item){
            $total_price += Product::whereSlug($item)->first()->price;
        }
//        $cart_item = array_count_values($cart_items);
//        return $cart_item['zonefi-global-modem'];



        $order = new Order;
        $order->by_admin = false;
        $order->c_mail = $request->c_mail;
        $order->c_name = $request->c_name;
        $order->c_address = $request->c_address;
        $order->c_state = $request->c_state;
        $order->c_city = $request->c_city;
        $order->c_country = $request->c_country;
        $order->c_zip = $request->c_zipcode;

        $order->status = "initializing";
        $delivery_fee =  \DB::table('setting')->first()->delivery_fee;
        if($delivery_fee == -1){
            ///do somethings
        }
        else{
            $order->delivery_fee = $delivery_fee;
        }
        $final_price = $this->finalPrice($total_price,$discount,$delivery_fee);
        $order->tax = $this->taxCalculate($total_price);
        $order->discount = $discount;
        $order->total_price = $final_price;

        if($order->save()) {
            $insertedId = $order->id;
        }
        $cart_item = array_count_values($cart_items);
        foreach ($cart_item as $key=>$item)
        {
            $cart = new Cart;
            $cart->order_id = $insertedId;
            $product = Product::whereSlug($key)->first();
            $cart->product_id = $product->id;
            $cart->quantity = $item;
//          $cart->description;
            $cart->save();
        }

        $payment = new Payment;
        $payment->order_id = $insertedId;
        $payment->status = "initializing";
        $pay_method= \DB::table('setting')->first()->pay_method;
        if (!$pay_method)
        {
            $payment->amount = $final_price;
            $payment->via = "squerup";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();

        }
        else{
            $payment->via = "zpal";
        }
        $squerup = new SquarupController();
        return $squerup->squarup($payment);


        return ;

    }
    public function result(Request $request)
    {
        return $request->all();
        return view('payment_result');
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
