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
    <img src="/img/OK.png" >
    <p class="res ture">Successful</p>
@else
    <img src="/img/NOK.png" >
    <p class="res false">Unsuccessful</p>
@endif

@if(false)
    <p class="code">شماره پیگیری : </p>
@endif
<a href="persiaticket://order?uid={{$order_uid}}">بازگشت به اپلیکیشن</a>
</body>
</html>
