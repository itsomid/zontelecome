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
@if($result == 1)
    <img src="/img/OK.png">
    <p class="res ture">تراکنش شما با موفقیت انجام شد</p>
@else
    <img src="/img/NOK.png">
    <p class="res false">تراکنش شما ناموفق بود</p>
@endif

@if(false)
    <p class="code">شماره پیگیری : </p>
@endif
@if($user_agent == "ios")
    <a href="irzontelecom://pay/?status=true&orderId={{$order->id}}&price={{$order->total_price}}&dataplan={{$order->products[0]->title}}">بازگشت
        به اپلیکیشن</a>
@elseif($user_agent == "android")
    <a href="zontelecom://success/{{$order->uid}}/{{$order->total_price}}/dataplan={{$order->products[0]->title}}">بازگشت
        به اپلیکیشن</a>
@endif
</body>
</html>
