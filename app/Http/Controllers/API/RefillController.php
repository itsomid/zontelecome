<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\BSON\Timestamp;
use GuzzleHttp\Client;

class RefillController extends Controller
{
    public function getDeviceInfo(Request $request, $device_id)
    {

//        $device_id = "KF022496";
//        $icc_id = "kf300977";
        $client = new Client(['base_uri' => 'https://org.sdgtelecom.com/api/']);
////
//         $r = $client->request('GET', 'org/9179e3d4c94a51f780f4b4ef91eba8b2/devices', ['headers' => \Config::get('keepgo.data')]);
        //        return $r->getBody();

        $r = $client->request('GET', "org/9179e3d4c94a51f780f4b4ef91eba8b2/devices?common_filter=$device_id", ['headers' => \Config::get('keepgo.data')]);

        $info = json_decode($r->getBody());
        if (empty($info->data))
            return abort(404);

        $balance = $info->data[0]->allowance_balance - $info->data[0]->usage->product;
//        $product_id = Cart::whereDeviceId($device_id)->first()->product_id;
//        $product_name = Product::whereId(Product::whereId($product_id)->first()->related_product)->first();

        ////Get Last Refill


        $last_refill = Cart::whereDeviceId($device_id)->orderBy('created_at', 'desc')->first();
        if (empty($last_refill))
            $last_refill = "";

        if ($info->data[0]->hardware_model->prefix == "KF") {
            $product = Product::whereSlug("zonfi-global-modem")->first();
            $image_url = $product->main_image_url;
            $product_title = $product->title;
            $product_slug = $product->slug;

        }
        if ($info->data[0]->hardware_model->prefix == "KH") {
            $product = Product::whereSlug("zonfi-v2-global-modem")->first();
            $image_url = $product->main_image_url;
            $product_title = $product->title;
            $product_slug = $product->slug;
        }
        if (empty($last_refill)){
            $device_info = array(
                'uuid' => $info->data[0]->uuid,
                'product_id' => $info->data[0]->product_id,
                'product_title' => $product_title,
                'usage_unit' => "MB",
                'allowance_usage' => $info->data[0]->allowance_balance,
                'balance' => $balance,
                'image_url' => $image_url,
                'last_refill_date' => "",
                'last_refill' => ""
            );
        }
        else{
            $device_info = array(
                'uuid' => $info->data[0]->uuid,
                'product_id' => $info->data[0]->product_id,
                'product_title' => $product_title,
                'usage_unit' => "MB",
                'allowance_usage' => $info->data[0]->allowance_balance,
                'balance' => $balance,
                'image_url' => $image_url,
                'last_refill_date' => $last_refill->order->created_at->toDateTimeString(),
                'last_refill' => $last_refill->order->created_at->diffForHumans(Carbon::now())
            );
        }



        return response()->json($device_info);
    }

    public function refillHistory($device_id)
    {

        $refill_history = Cart::with('insideOrder', 'insideProduct')->whereDeviceId($device_id)->get();

        if (!count($refill_history))
            return abort(404);

        return $refill_history;
    }

    public function getDataPlan($device_id)
    {

        $client = new Client(['base_uri' => 'https://org.sdgtelecom.com/api/']);
        $r = $client->request('GET', "org/9179e3d4c94a51f780f4b4ef91eba8b2/devices?common_filter=$device_id", ['headers' => \Config::get('keepgo.data')]);

        $info = json_decode($r->getBody());

        if (empty($info->data))
            return abort(404);

        if ($info->data[0]->hardware_model->prefix == "KF") {

           return $plan = Product::whereRelatedProduct('1')->get()->makeVisible('id');

        }
        elseif ($info->data[0]->hardware_model->prefix == "KH"){
            return $plan = Product::whereRelatedProduct('2')->get()->makeVisible('id');
        }
         return abort(404);
    }

}
