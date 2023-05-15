<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/landing/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/landing/images/apple-touch-icon.png') }}">
    <link rel="stylesheet" href=" {{ asset('assets/landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/landing/css/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/landing/css/responsive.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/landing/css/custom.css') }} ">
</head>

<body>

    @include('home.layouts.navbar')
    @yield('content')
    @include('home.layouts.footer')



    

    
    <script src="{{ asset('assets/landing/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/landing/js/inewsticker.js') }}"></script>
    <script src="{{ asset('assets/landing/js/bootsnav.js.') }}"></script>
    <script src="{{ asset('assets/landing/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets/landing/js/custom.js') }}"></script>
</body>

</html>
