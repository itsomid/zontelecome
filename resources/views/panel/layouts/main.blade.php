<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="/css/panel/bootstrap.min.css" rel="stylesheet">
    <link href="/css/panel/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/panel/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- FooTable -->
    <link href="/css/panel/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="/css/panel/animate.css" rel="stylesheet">
    <link href="/css/panel/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/css/panel.css") }}">
    <link href="/css/panel/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="/css/panel/plugins/select2/select2.min.css" rel="stylesheet">


</head>

<body>

<div id="wrapper">


    @include('panel.layouts.sidenav')
    <div id="page-wrapper" class="gray-bg" style="min-height: 925px;">
        @include('panel.layouts.header')
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('panel.layouts.footer')
    </div>
</div>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>
<script src="/js/inspinia.js"></script>
@yield('script')

</body>

</html>