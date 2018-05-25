<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'en'))">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Atnic">

  <meta id="token" name="token" content="{{ csrf_token() }}">


  <script src="/js/jquery-3.1.1.min.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js" type="text/javascript"></script>

  <title>@yield('title', config('app.name', 'ZonTelecom'))</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Styles -->
  @section('styles')
    <link href="{{ mix('/css/inspinia.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/css/panel.css") }}">
    <link href="{{asset("/css/plugins/footable/footable.core.css")}}" rel="stylesheet">
  @show
  <script type="text/javascript" src="{{'/js/plugins/pace/pace.min.js'}}"></script>
  <script type="text/javascript" src="{{ '/js/bootstrap.min.js' }}"></script>
  <script type="text/javascript" src="{{'/js/plugins/metisMenu/jquery.metisMenu.js' }}"></script>
  <script type="text/javascript" src="{{ '/js/plugins/slimscroll/jquery.slimscroll.min.js' }}"></script>
  <script type="text/javascript" src="{{'/js/plugins/footable/footable.all.min.js' }}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>


  <![endif]-->
  @stack('head')
</head>

<body class="body-small {{ config('inspinia.skin', '') }}">
  <div id="wrapper ">
    @include('inspinia::layouts.sidebar.main')
    @include('inspinia::layouts.main-panel.main')
  </div>

  @section('scripts')
  <script src="{{ mix('/js/manifest.js') }}" charset="utf-8"></script>
  <script src="{{ mix('/js/vendor.js') }}" charset="utf-8"></script>
	<script src="{{ mix('/js/inspinia.js') }}" charset="utf-8"></script>


	@show
	@stack('body')
</body>

</html>
