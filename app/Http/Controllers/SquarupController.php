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

        if ($agent == "mobile")
            $redirect_url = route('mobile/payment/result', ['order_uid' => $payment->order->uid]);
        else
            $redirect_url = route('website/payment/result', ['order_uid' => $payment->order->uid]);

        if ($cart_item[0]->product->type == "virtual") {
            $list_item = [
                "name" => $cart_item[0]->product->title,
                "quantity" => (string)$cart_item[0]->quantity,
                "base_price_money" => [
                    "amount" => $cart_item[0]->product->price * 100,
                    "currency" => "CAD"
                ]

            ];
            $square = [
                "idempotency_key" => uniqid(),
                "order" => [
                    "reference_id" => (string)$cart_item[0]->uid,
                    "line_items" => $list_item,
                    "taxes" => [
                        [
                            "name" => "State Sales Tax",
                            "percentage" => "0"
                        ]
                    ]
                ],

                "redirect_url" => $redirect_url,
            ];
        } else {
            $setting = \DB::table('setting')->first();
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
            $shipping = [
                "name" => "Shipping fee",
                "quantity" => "1",
                "base_price_money" => [
                    "amount" => $setting->delivery_fee * 100,
                    "currency" => "CAD"
                ]
            ];

            //Fake Tax
            $item_total_price = 0;
            foreach ($cart_item as $item) {
                $item_total_price = $item_total_price + ($item->product->price * $item->quantity);
            }
            $fakeTax = $this->calculateFakeTax($item_total_price, $setting->tax_fee, $setting->delivery_fee);


            array_push($list_item, $shipping);
            if ($agent == "mobile")
                $redirect_url = route('mobile/payment/result', ['order_uid' => $payment->order->uid]);
            else
                $redirect_url = route('website/payment/result', ['order_uid' => $payment->order->uid]);

            if ($setting->discount > 0) {
                $square = [
                    "idempotency_key" => uniqid(),
                    "order" => [
                        "reference_id" => (string)$cart_item[0]->uid,
                        "line_items" => $list_item,

                        "taxes" => [
                            [
                                "name" => "State Sales Tax",
                                "percentage" => (string)$fakeTax
                            ]
                        ],
                        "discounts" => [
                            [
                                "name" => "Opening Deals $setting->discount% OFF",
                                "percentage" => (string)$setting->discount
                            ],
                        ]
                    ],

                    "redirect_url" => $redirect_url,
                ];
            } else {
                $square = [
                    "idempotency_key" => uniqid(),
                    "order" => [
                        "reference_id" => (string)$cart_item[0]->uid,
                        "line_items" => $list_item,
                        "taxes" => [
                            [
                                "name" => "State Sales Tax",
                                "percentage" => (string)number_format($fakeTax, 3)
                            ]
                        ]
                    ],

                    "redirect_url" => $redirect_url,
                ];
            }
        }

        //$json = json_encode($square);
        return $square;
    }

    function calculateFakeTax($items_total, $taxPercent, $shipping)
    {

        $realTax = $items_total * ($taxPercent / 100);
        return $fakeTax = ($realTax / ($items_total + $shipping)) * 100;
    }
}
