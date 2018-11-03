<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;

class PdfController extends Controller
{
    public function pdfCreator($order_uid)
    {

        $cart = Order::with('products')->whereId(Order::realId($order_uid))->first();
        $file_path = storage_path() . '/pdf/';
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'Vertical');

        $image = base64_encode(file_get_contents('img/pdf-header.png',public_path()));

        $pdf->loadView('en.pdf.pdf',compact('image','order_uid','cart'));

        $file_name = "OrderDetails-$order_uid.pdf";
        $path = storage_path('pdf/' . $file_name);
        if ($cart->products[0]->type != "virtual"){
            \Mail::send('en.emails.test', [],function ($message) use ($cart,$path) {
                $message
                    ->from('info@zontelecom.ca', 'Zontelecom')
                    ->to($cart->c_mail, $cart->c_name)
                    ->subject('Your Order Has Been Success')
                    ->attachData($path,'Order Invoice');
            });
        }


        $pdf->save($file_path . $file_name);
    }

    public function getPdf($order_uid)
    {
        $file_name = "OrderDetails-$order_uid.pdf";
        $path = storage_path('pdf/' . $file_name);
        return response()->download($path);
    }
}
