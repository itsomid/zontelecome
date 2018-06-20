<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('header')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>


    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/simple-sidebar.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/chart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script data-main="js/main" src="js/require.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body data-gr-c-s-loaded="true" style="" cz-shortcut-listen="true">

@yield('content')
@if(Request::url() !== url("/"))
    @include('landing.footer')
@endif
</body>
</html>
