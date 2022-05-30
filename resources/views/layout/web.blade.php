<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('captcha')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="index,follow">
    <meta name="description" content="">
    <meta name="author" content="DeMi Studio, s.r.o.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('og_tags')

    <title>
        {{ env('APP_NAME') }}
        @yield('title')
    </title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')

</head>
<body>

@include('web._partials._preloader')
@include('web._partials._menu')

@yield('content')

@include('web._partials._footer')

<!-- SCRIPTS -->
<script src="{{ asset('js/script.min.js') }}" type="text/javascript"></script>
@yield('js')

</body>
</html>
