<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $pdf_creator;

    public function __construct()
    {
        $this->pdf_creator = new PdfController();
    }
    public function createPaymentForProduct(Request $request)
    {


        $total_price = 0;

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
        $discount = $this->discountCalculate($total_price);
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
            return $squerup->squarup($payment,"web");

        } else {
            $payment->amount = $final_price;
            $payment->via = "IPG";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();

            return redirect($zarin->createRequest($payment,"web"));

        }
//        session()->forget('cart');



    }

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

        $payment->order_id = $insertedId;
        $payment->status = "initializing";
        $pay_method = \DB::table('setting')->first()->pay_method;
        if (!$pay_method) {
            $payment->amount = $final_price;
            $payment->via = "squerup";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();
            $squerup = new SquarupController();
            return $squerup->squarup($payment,"web");

        } else {
            $zarin = new \ZarinpalC();
            $payment->amount = $final_price;
            $payment->via = "IPG";
            $payment->setDetails(['scheme' => 'ZonTelecom']);
            $payment->save();

            return redirect()->away($zarin->createRequest($payment,"web"));

        }


    }

    public function webResult(Request $request, $order_uid)
    {
         $order = Order::whereId(Order::realId($order_uid))->first();
        $payment = Payment::where('order_id', $order->id)->first();
        $checkout_id = $request->input('checkoutId');
//         $order_uidd = $request->input('referenceId');

        $transaction_id = $request->input('transactionId');
        $payment->reference = $transaction_id;
        $details = $payment->details();
        $details->reference_id = $checkout_id;
        $payment->setDetails($details);
        $payment->save();

        $payment->setPaid();

        session()->forget('cart.item');

        $this->pdf_creator->pdfCreator($order_uid);


        return view('en.payment_result', ['order_uid' => $order_uid,'order'=>$order]);
    }

    public function zarinPalWebResult(Request $request, $result, $order_uid)
    {
        $order = Order::whereId(Order::realId($order_uid))->first();

        return view('fa.payment_result', ['order_uid' => $order_uid,'order'=>$order]);

    }

    public function zarinPalmobResult(Request $request, $result, $order_uid)
    {
        return view('fa.mobile_payresult',['result' => $result, 'order_uid' => $order_uid]);
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

    public function discountCalculate($total_price)
    {
        $discount = \DB::table('setting')->first()->discount;
        $discount = $total_price * ($discount / 100);
        return $discount;
    }

}
