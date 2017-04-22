<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('/') }}images/ico.png">
{{-- bootsrap --}}
<link href="{{ asset('/') }}css/bootstrap.css" rel="stylesheet" type="text/css">
{{-- jquery animate --}}
<link href="{{ asset('/') }}css/animate.css" rel="stylesheet" type="text/css">
{{-- font awesome --}}
<link href="{{ asset('/') }}assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
{{-- main csss --}}
<link href="{{ asset('/') }}css/style.css" rel="stylesheet" type="text/css">
<link href="{{ asset('/') }}css/responsive.css" rel="stylesheet" type="text/css">
@yield('css')
</head>
<body>
{{-- @if (count($office['data']) > 0) --}}
@include('include.header')
@yield('content')
@if (Request::path() != "/")
@include('include.footer')
@endif
{{-- @endif --}}
<script src="{{ asset('/') }}js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('/') }}js/bootstrap.js"></script>
<script src="{{ asset('/') }}js/jquery.appear.js"></script> 
<script src="{{ asset('/') }}js/jquery.mixitup.min.js"></script> 
<script src="{{ asset('/') }}js/scripts.js"></script>
@yield("javascript")
</body>
</html>
