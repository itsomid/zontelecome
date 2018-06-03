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
        $product_id = Cart::whereDeviceId($device_id)->first()->product_id;
        $product_name = Product::whereId(Product::whereId($product_id)->first()->related_product)->first();

        if ($info->data[0]->hardware_model->prefix == "KF") {
            $image_url = $product_name->main_image_url;
            $product_title = $product_name->title;
        }
        $device_info = array(
            'uuid' => $info->data[0]->uuid,
            'product_id' => $info->data[0]->product_id,
            'product_title' => $product_title,
            'usage_unit' => "MB",
            'allowance_usage' => $info->data[0]->allowance_balance,
            'balance' => $balance,
            'image_url' => $image_url,
        );

        return response()->json($device_info);
    }

    public function refillHistory($device_id)
    {
//        $client = new Client(['base_uri' => 'https://org.sdgtelecom.com/api/']);
//////
//        $r = $client->request('GET', "org/9179e3d4c94a51f780f4b4ef91eba8b2/devices?common_filter=$device_id", ['headers' => \Config::get('keepgo.data')]);
//        $r->getBody();
//
//        $info = json_decode($r->getBody());
//        if (empty($info->data))
//            return abort(404);

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

           return $plan = Product::whereRelatedProduct('1')->get();


        }
         return abort(404);
    }
}
