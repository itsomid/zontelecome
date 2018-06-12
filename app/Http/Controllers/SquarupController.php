<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SquarupController extends Controller
{
    public function squarup()
    {

//
// HELPER FUNCTION: Repackage the order information as an array
         $orderArray = $this->square_json();

//        return $GLOBALS['LOCATION_ID'];
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
        header("Location: $checkoutUrl");
    }
    public function square_json(){

        $square = array(
            "idempotency_key" => uniqid(),
            "order" => array(
                "reference_id" => (string)'23',

                "line_items" => array(
                    // List each item in the order as an individual line item
                    array(
                        "name" => "Item Name",
                        "quantity" => "3",
                        "base_price_money" => array(
                            "amount" => 5,
                            "currency" => "CAD"
                        ),
                    ),
                    array(
                        "name" => "Item Name 2",
                        "quantity" => "21",
                        "base_price_money" => array(
                            "amount" => 6,
                            "currency" => "CAD"
                        ),
                    ),
                )
            )
        );
        //$json = json_encode($square);
        return $square;
    }
}
