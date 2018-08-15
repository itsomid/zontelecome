<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use MongoDB\BSON\Timestamp;
use GuzzleHttp\Client;

class RefillController extends Controller
{
    public function index()
    {

        return view(config('app.locale').'.refill');
    }

    public function refillBalance(Request $request)
    {
        if ($request->isMethod('get'))
            return redirect()->route('website/refill');
         $device_id = $request->device_id;
        if (empty($device_id))
            return \Redirect::back()->with('message', "Device not Exist!");

        $client = new Client(['base_uri' => 'https://org.sdgtelecom.com/api/']);
        $r = $client->request('GET', "org/9179e3d4c94a51f780f4b4ef91eba8b2/devices?common_filter=$device_id", ['headers' => \Config::get('keepgo.data')]);

        $info = json_decode($r->getBody());

        if (empty($info->data))
            return \Redirect::back()->with('message', "Device not Exist!");

//         $info->data;
        $balance = $info->data[0]->allowance_balance - $info->data[0]->usage->product;
        $allowance_usage = $info->data[0]->allowance_balance;

        $balance_perc = ($balance * 100) / $allowance_usage;

        if ($info->data[0]->hardware_model->prefix == "KF") {
            $product = Product::whereSlug("zonfi-global-modem")->first();
            $image_url = $product->main_image_url;
            $product_title = $product->title;
            $product_slug = $product->slug;

        }
        $refill_history = Cart::with('insideOrder', 'insideProduct')->whereDeviceId($device_id)->get();

         $device_info = array(
            'uuid' => $info->data[0]->uuid,
            'product_id' => $info->data[0]->product_id,
            'product_title' => $product_title,
            'product_slug' =>$product_slug,
            'usage_unit' => "MB",
            'balance' => $balance,
            'balance_perc' => $balance_perc,
            'allowance_usage' => $allowance_usage,
            'image_url' => $image_url,
        );
        $device_info = (object) $device_info;

        return view(config('app.locale').'.refill_balance', ['device_info' => $device_info, 'refill_history' => $refill_history]);
    }

    public function dataPlan(Request $request,$slug)
    {
        $device_id = $request->device_id;

        $product = Product::whereSlug($slug)->first();
        $plans = Product::whereRelatedProduct($product->id)->get();

        return view(config('app.locale').'.refill_plan',['device_id'=>$device_id,'product'=>$product,'plans'=>$plans]);
    }

}
