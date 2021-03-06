<?php

namespace App\Http\Controllers;

use App\Classes\Abstracts\AbstractIPG;
use App\Payment;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class ZarinPalController extends Controller implements AbstractIPG
{
    public $fake = true;

    public function createRequest($payment, $agent)
    {

        if ($agent == "web")
            $result = \Zarinpal::request(route('web/zarinpal/callback'), $payment->amount, 'testing');
        else
            $result = \Zarinpal::request(route('mobile/zarinpal/callback'), $payment->amount, 'testing');

        $payment->reference = $result['Authority'];
        $payment->save();
        $url = 'https://www.zarinpal.com/pg/StartPay/' . $result['Authority'] . '/ZarinGate';
        if ($agent == "web")
            return $url;
        else
            return ['redirect_url' => 'https://www.zarinpal.com/pg/StartPay/' . $result['Authority'] . '/ZarinGate'];


    }

    public function redirectToBank($token)
    {
        return view('payments.saman.redirect', ['token' => $token]);
    }

    public function mobCallback(Request $request)
    {

        \Log::debug("payment callback: " . json_encode($request->all()));

        $reference = $request->input('Authority');
        $status = $request->input('Status');
        $payment = Payment::where('reference', $reference)->firstOrFail();

        $failed = "http://buyfailed";
        $success = "http://buysuccessful";

        // temporary

        $failed = route('mobile/bank/result', ['result' => 0, 'order_uid' => $payment->order->uid]);
        $success = route('mobile/bank/result', ['result' => 1, 'order_uid' => $payment->order->uid]);


        if ($this->fake) {
            $details = $payment->details();
            $details->reference_id = 'fake-' . rand(1000, 2000);
            $payment->setDetails($details);
            $payment->save();
            $payment->setPaid();
            return redirect($success);

        }
        if ($status == "NOK") {
            $payment->status = 'failed';
            $payment->save();
            return redirect($failed);
        }
        // seems to be ok
        $result = \Zarinpal::verify('OK', $payment->amount, $reference);
        \Log::debug("payment callback verify result: " . json_encode($result));
        if ($result['Status'] == "success") {
            $details = $payment->details();
            $details->reference_id = $result["RefID"];
            $payment->setDetails($details);
            $payment->save();
            $payment->setPaid();
            return redirect($success);
        }
        return redirect($failed);

    }

    public function webCallback(Request $request)
    {

        \Log::debug("payment callback: " . json_encode($request->all()));

        $reference = $request->input('Authority');
        $status = $request->input('Status');
         $payment = Payment::where('reference', $reference)->firstOrFail();

        $failed = "http://buyfailed";
        $success = "http://buysuccessful";

        // temporary


        $failed = route('website/bank/result', ['result' => 0, 'order_uid' => $payment->order->uid]);
        $success = route('website/bank/result', ['result' => 1, 'order_uid' => $payment->order->uid]);


        if ($this->fake) {
            $details = $payment->details();
            $details->reference_id = 'fake-' . rand(1000, 2000);
            $payment->setDetails($details);
            $payment->save();
            $payment->setPaid();
            return redirect($success);

        }
        if ($status == "NOK") {
            $payment->status = 'failed';
            $payment->save();
            return redirect($failed);
        }
        // seems to be ok
        $result = \Zarinpal::verify('OK', $payment->amount, $reference);
        \Log::debug("payment callback verify result: " . json_encode($result));
        if ($result['Status'] == "success") {
            $details = $payment->details();
            $details->reference_id = $result["RefID"];
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
