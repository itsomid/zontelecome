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
    public function getDeviceInfo(Request $request)
    {


        $device_id = "KF022496";
        $client = new Client(['base_uri' => 'https://org.sdgtelecom.com/api/']);

//        $r = $client->request('GET', 'org/9179e3d4c94a51f780f4b4ef91eba8b2/devices', ['headers' => \Config::get('keepgo.data')]);
//        return $r->getBody();
        $r = $client->request('GET', "org/9179e3d4c94a51f780f4b4ef91eba8b2/devices?common_filter=$device_id", ['headers' => \Config::get('keepgo.data')]);
//        return $r->getBody();
        $info = json_decode($r->getBody());
        $balance = $info->data[0]->allowance_balance - $info->data[0]->usage->product;
        $history = Cart::with('insideOrder')->whereDeviceId('KF022496')->get();

        if ($info->data[0]->hardware_model->prefix == "KF")
        {
            $image_url = "/img/router.png";
        }
         $all_info = array(
            'product_id'=>$info->data[0]->product_id,
            'usage_unit'=>"MB",
            'allowance_usage'=>$info->data[0]->allowance_balance,
            'balance'=>$balance,
            'image_url'=>$image_url,
            'history'=>$history,
        );

        return response()->json($all_info);
    }
    public function info()
    {




        //$curl = curl_init();



    }
}
