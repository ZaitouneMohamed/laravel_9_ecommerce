<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Template</title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }} ">
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">

            @include('home.layouts.navbar')

            @yield('content')

            @include('home.layouts.footer')

        </div>
    </div>aaqq

    <script type="text/javascript" src="{{ asset('assets/landing/js/jquery.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('assets/landing/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/landing/js/script.js') }}"></script>
</body>

</html>
