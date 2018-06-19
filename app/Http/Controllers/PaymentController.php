<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function createPaymentForProduct(Request $request)
    {


        $total_price = 0;
        $discount = 0;
        $cart_items = session()->get('cart.item');


        foreach ($cart_items as $item) {
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
        $delivery_fee = \DB::table('setting')->first()->delivery_fee;
        if ($delivery_fee == -1) {
            ///do somethings
        } else {
            $order->delivery_fee = $delivery_fee;
        }
        $final_price = $this->finalPrice($total_price, $discount, $delivery_fee);
        $order->tax = $this->taxCalculate($total_price);
        $order->discount = $discount;
        $order->total_price = $final_price;

        if ($order->save()) {
            $insertedId = $order->id;
        }
        $cart_item = array_count_values($cart_items);
        foreach ($cart_item as $key => $item) {
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
        $pay_method = \DB::table('setting')->first()->pay_method;
        if (!$pay_method) {
            $payment->amount = $final_price;
            $payment->via = "squerup";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();

        } else {
            return 2;
            $payment->amount = $final_price;
            $payment->via = "IPG";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();
            $zarin = new \ZarinpalC();
            return redirect()->away($zarin->createRequest($payment));
        }
//        session()->forget('cart');

        $squerup = new SquarupController();
        return $squerup->squarup($payment);

    }

    public function createPaymentForData(Request $request)
    {

        $plan_id = $request->plan;
        $device_id = $request->device_id;
        $plan = Product::whereId($plan_id)->first();
        $total_price = $plan->price;


        $order = new Order;
        $order->by_admin = false;
        $order->status = "initializing";
        $order->delivery_fee = 0;
        $order->discount = 0;
        $final_price = $this->finalPrice($total_price, 0, 0);
        $order->total_price = $final_price;
        $order->tax = $this->taxCalculate($total_price);

        if ($order->save()) {
            $insertedId = $order->id;
        }
        $cart = new Cart;
        $cart->order_id = $insertedId;
        $cart->product_id = $plan_id;
        $cart->quantity = 1;
        $cart->device_id = $device_id;
        $cart->save();

        $payment = new Payment();

        $payment->order_id = $insertedId;
        $payment->status = "initializing";
        $pay_method = \DB::table('setting')->first()->pay_method;
        if (!$pay_method) {
            return 1;
            $payment->amount = $final_price;
            $payment->via = "squerup";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();
            $squerup = new SquarupController();
            return $squerup->squarup($payment);

        } else {
            return 2;
            $payment->amount = $final_price;
            $payment->via = "zpal";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();
            $zarin = new \ZarinpalC();
            return redirect()->away($zarin->createRequest($payment));

        }


    }

    public function result(Request $request, $payment_uid)
    {
        $payment = Payment::where('id', Payment::realId($payment_uid))->first();
        $checkout_id = $request->input('checkoutId');
        $order_uid = $request->input('referenceId');
        $transaction_id = $request->input('transactionId');
        $payment->reference = $transaction_id;
        $details = $payment->details();
        $details->reference_id = $checkout_id;
        $payment->setDetails($details);
        $payment->save();

        $payment->setPaid();

        return view('payment_result', ['order_uid' => $order_uid]);
    }

    public function finalPrice($total_price, $discount, $delivery_fee)
    {
        $tax_percentage = \DB::table('setting')->first()->tax_fee;
        $tax = $total_price * ($tax_percentage / 100);
        $final_price = $total_price + $tax + $delivery_fee - $discount;
        return $final_price;
    }

    public function taxCalculate($total_price)
    {
        $tax_percentage = \DB::table('setting')->first()->tax_fee;
        $tax = $total_price * ($tax_percentage / 100);
        return $tax;
    }

}
