<?php

namespace App\Http\Controllers;
use App\Classes\Abstracts\AbstractIPG;
use Illuminate\Http\Request;

class ZarinPalController extends Controller implements AbstractIPG
{

    public function createRequest($payment)
    {
        $result  = \Zarinpal::request(route('zarinpal/callback'),$payment->amount,'testing');
        $payment->authority = $result['Authority'];
        $payment->save();
        return ['redirect_url' => 'https://www.zarinpal.com/pg/StartPay/'.$result['Authority'].'/ZarinGate'];
    }

    public function redirectToBank($token)
    {
        return view('payments.saman.redirect',['token' => $token]);
    }

    public function callback(Request $request)
    {

        \Log::debug("payment callback: ".json_encode($request->all()));
        $authority = $request->input('Authority');
        $status = $request->input('Status');
        $payment = Payment::where('authority',$authority)->firstOrFail();

        $failed = "http://buyfailed";
        $success = "http://buysuccessful";

        // temporary
        $agent = new Agent();
        if ($agent->isDesktop())
        {

            $failed = route('website/bank/result',['result' => 0, 'order_uid' => $payment->order->uid]);
            $success = route('website/bank/result',['result' => 1, 'order_uid' => $payment->order->uid]);
        }
        else{
            $failed = route('bank/result',['result' => 0, 'order_uid' => $payment->order->uid]);
            $success = route('bank/result',['result' => 1, 'order_uid' => $payment->order->uid]);
        }




        if(isset($payment->details()->external) && $payment->details()->external)
        {
            $failed = $payment->details()->scheme."://buyfailed";
            $success = $payment->details()->scheme."://buysuccessful";
            //$failed = $success;
        }else {

        }
        if($this->fake)
        {
            $details = $payment->details();
            $details->reference_id = 'fake-'.rand(1000,2000);
            $payment->setDetails($details);
            $payment->save();
            $payment->setPaid();
            return redirect($success);

        }
        if($status == "NOK")
        {
            $payment->status = 'failed';
            $payment->save();
            return redirect($failed);
        }
        // seems to be ok
        $result = \Zarinpal::verify('OK',$payment->amount,$authority);
        \Log::debug("payment callback verify result: ".json_encode($result));
        if($result['Status'] == "success")
        {
            $details = $payment->details();
            $details['reference_id'] = $result["RefID"];
            $payment->setDetails($details);
            $payment->save();
            $payment->setPaid();
            return redirect($success);
        }
        return redirect($failed);

    }
    public function getStatus($payment_id)
    {
        return "yeah :) $payment_id";
    }
}
