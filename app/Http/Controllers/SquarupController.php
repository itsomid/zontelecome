<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;

class SquarupController extends Controller
{
    public function squarup($payment, $agent)
    {

//
// HELPER FUNCTION: Repackage the order information as an array

        $orderArray = $this->square_json($payment, $agent);


// CONFIG FUNCTION: Create a Square Checkout API client if needed
        initApiClient();
// Create a new API object to send order information to Square Checkout

        $checkoutClient = new \SquareConnect\Api\CheckoutApi();

        try {
//        dd($checkoutClient);
            // Send the order array to Square Checkout
            $apiResponse = $checkoutClient->createCheckout(
                $GLOBALS['LOCATION_ID'],
                $orderArray
            );


            // Grab the redirect url and checkout ID sent back
            $checkoutUrl = $apiResponse['checkout']['checkout_page_url'];
            $checkoutID = $apiResponse['checkout']['id'];
            // HELPER FUNCTION: save the checkoutID so it can be used to confirm the
            // transaction after payment processing


//            saveCheckoutId($orderArray['order']['reference_id'], $checkoutID);
        } catch (Exception $e) {
            echo "The SquareConnect\Configuration object threw an exception while " .
                "calling CheckoutApi->createCheckout: ", $e->getMessage(), PHP_EOL;
            exit();
        }
// Redirect the customer to Square Checkout
        if ($agent == "mobile")
            return ['redirect_url' => $checkoutUrl];
        else
            header("Location: $checkoutUrl");

    }

    public function square_json($payment, $agent)
    {


        $cart_item = Cart::with('product')->where('order_id', $payment->order_id)->get();


        foreach ($cart_item as $key => $item) {
            $list_item[$key] = [
                "name" => $item->product->title,
                "quantity" => (string)$item->quantity,
                "base_price_money" => [
                    "amount" => $item->product->price * 100,
                    "currency" => "CAD"
                ]

            ];
        }
        if ($agent == "mobile")
            $redirect_url = route('mobile/payment/result', ['order_uid' => $payment->order->uid]);
        else
            $redirect_url = route('website/payment/result', ['order_uid' => $payment->order->uid]);


        $square = array(

            "idempotency_key" => uniqid(),
            "order" => array(
                "reference_id" => (string)$cart_item[0]->uid,
                "line_items" => $list_item,
                "total_tax_money"=> array(
                    "amount"=> 823,
                    "currency" => "CAD"
                ),
            ),

            "redirect_url" => $redirect_url,
        );
        //$json = json_encode($square);
        return $square;
    }
}
