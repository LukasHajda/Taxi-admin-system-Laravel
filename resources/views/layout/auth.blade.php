<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="DeMi Studio, s.r.o.">

    <title>
        Admin |
        @yield('title')
    </title>

    <link rel="shortcut icon" href="{{ asset('img/admin-favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('css/login.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')

</head>
<body>

@yield('content')

<!-- SCRIPTS -->
<script src="{{ asset('js/login.min.js') }}" type="text/javascript"></script>
@yield('js')

</body>
</html>
