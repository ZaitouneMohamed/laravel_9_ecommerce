<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>

    <link rel="icon" href="{{ asset('assets/landing/img/core-img/favicon.ico') }}">
    @livewireStyles
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/core-style.css') }}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    @include('home.layouts.navbar')
    @include('messages.success')
    @include('messages.error')
    @include('messages.any')
    @yield('content')
    @include('home.layouts.footer')

    @livewireScripts
    @yield('scripts')
    <script src="{{ asset('assets/landing/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    {{-- <script src="{{ asset('assets/landing/js/jquery/popper.min.js') }}"></script> --}}
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/landing/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/landing/js/plugins.js') }}"></script>
    <!-- Classy Nav js -->
    <script src="{{ asset('assets/landing/js/classy-nav.min.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/landing/js/active.js') }}"></script>

</body>

</html>
