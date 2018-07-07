<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/payment.css">
</head>
<body>

    <p class="" style="font-size: 30px;color: green">Successful</p>

    @if($user_agent == "ios")
        <a href="zontelecom://pay/?status=true&orderId={{$order->uid}}&price={{$order->total_price}}&dataplan={{$order->products[0]->title}}" style="font-size: 20px; width: 50%">Return to app</a>
    @elseif($user_agent == "android")
        <a href="zontelecom://success/{{$order->uid}}/{{$order->total_price}}/dataplan={{$order->products[0]->title}}" style="font-size: 20px; width: 50%">Return to app</a>
        @endif
</body>
</html>
