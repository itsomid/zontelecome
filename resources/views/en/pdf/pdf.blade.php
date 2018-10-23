<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zontelecom</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
{{--<link href="css/bootstrap.min.css" rel="stylesheet">--}}
<!-- Styles -->

    <style type="text/css">

        @page {
            margin: 2cm;
        }

        body {
            font-family: sans-serif;

        }

        .watermark {
            position: fixed;
            left: -20px;
            top: -40px;
        }

        td {
            padding-top: 5pt;
            font-family: sans-serif;
            font-size: 10pt;
        }

        tr {
            padding-right: 100px;
        }

        table {
            padding-top: 10px;
            width: 53%;
            margin-left: 140px;
        }


    </style>
</head>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true" class="watermark">
<div class="watermark">
    <div>
        <img src="data:image/png;base64, {{$image}}" height="50%" width="12%" class="watermark">
        <p style="text-align: center; ">Order Details</p>
        <hr noshade="" align="" width="60%" style="background-color: black;  height: 0.5pt;border: none;">

        <table align="center">
            <tbody>
            <tr align="left">
                <td style=" font-weight:600;">Order Number</td>
                <td><strong>{{$order_uid}}</strong></td>
            </tr>
            <tr align="left">
                <td style=" font-weight:600;">Order Email</td>
                <td>{{$cart->c_mail}}</td>
            </tr>
            <tr align="left">
                <td style=" font-weight:600;">Date</td>
                <td>{{$cart->created_at->format('d-m-Y')}}</td>
            </tr>
            <tr align="left">
                <td style=" font-weight:600;">Amount</td>
                <td>{{$cart->final_price}}$</td>
            </tr>
            </tbody>
        </table>

    </div>
    <div style="margin-top: 300px">
        <p style="text-align: center;">Order Items</p>
        <hr noshade="" align="" width="60%" style="background-color: black;  height: 0.5pt;border: none;">

        <table align="center">
            <tbody>
            @foreach($cart->products as $product)
                <tr align="left">
                    <td style="font-weight:600; width: 300px">{{$product->title}} X{{$product->pivot->quantity}}</td>
                    <td>{{number_format($product->price * $product->pivot->quantity,2)}}$</td>
                </tr>
            @endforeach
            <tr align="left">
                <td style=" font-weight:600;">Tax</td>
                <td>{{$cart->tax_price}}$</td>
            </tr>
            <tr align="left">
                <td style=" font-weight:600;">Shipment</td>
                <td>{{$cart->delivery_fee}}$</td>
            </tr>
            <tr align="left">
                <td style=" font-weight:600;">Total Amount</td>
                <td>{{$cart->final_price}}$</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="margin-top: 380px; margin-left: 450px">

        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/img/logo-3.jpg', .1)->size(200)->generate('https://zontelecom.ca/order/track')) !!}">
    </div>

    <p style="text-align: right; padding-top: -40px">Scan me to return to the order track</p>
</div>


</body>
</html>
