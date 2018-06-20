<?php

namespace App\Http\Controllers\API;

use App\Payment;
use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function createPaymentForData(Request $request)
    {

        $package_id = $request->input('package_id');
        $device_id = $request->input('device_id');
        $package = Product::whereId($package_id)->first();
        $total_price = $package->price;


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
        $cart->product_id = $package_id;
        $cart->quantity = 1;
        $cart->device_id = $device_id;
        $cart->save();

        $payment = new Payment();
        $zarin = new \ZarinpalC();
        $payment->order_id = $insertedId;
        $payment->status = "initializing";
        $pay_method = \DB::table('setting')->first()->pay_method;
        if (!$pay_method) {
            $payment->amount = $final_price;
            $payment->via = "squerup";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();
            $squerup = new SquarupController();
            return $squerup->squarup($payment);

        } else {
            $payment->amount = $final_price;
            $payment->via = "IPG";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();

            return response()->json($zarin->createRequest($payment));

        }


    }
    public function mobResult(Request $request, $result, $order_uid)
    {
        $payment_info =  [
            'result' => $result,
            'order_uid' => $order_uid
        ];
        return response()->json($payment_info);

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
