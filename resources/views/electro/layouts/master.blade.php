<!DOCTYPE html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Groover - Online Shopping for Electronics, Apparel, Computers, Books, DVDs & more</title>
    <!-- Standard Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/fontawesome.min.css') }}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/ionicons.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/animate.min.css') }}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/owl.carousel.min.css') }}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/jquery-ui-range-slider.min.css') }}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/utility.css') }}">
    <!-- Main -->
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('assets/electro/css/bundle.css') }}">
</head>

<body>

    <!-- app -->
    <div id="app">
        <!-- Header -->
        @include('electro.layouts.sections.navbar')
        <!-- Header /- -->

        @yield('content')

        @include('electro.layouts.sections.footer')
        <!-- Quick-view-Modal /- -->
    </div>
    <!-- app /- -->
    <!--[if lte IE 9]>
<div class="app-issue">
    <div class="vertical-center">
        <div class="text-center">
            <h1>You are using an outdated browser.</h1>
            <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
        </div>
    </div>
</div>
<style> #app {
    display: none;
} </style>
<![endif]-->
    <!-- NoScript -->
    <noscript>
        <div class="app-issue">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>JavaScript is disabled in your browser.</h1>
                    <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser to
                        register for Groover.</span>
                </div>
            </div>
        </div>
        <style>
            #app {
                display: none;
            }
        </style>
    </noscript>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    @livewireScripts
    @yield("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <!-- Modernizr-JS -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/vendor/modernizr-custom.min.js') }} "></script>
    <!-- NProgress -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/nprogress.min.js') }}"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/bootstrap.min.js') }}"></script>
    <!-- Popper -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/popper.min.js') }}"></script>
    <!-- ScrollUp -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Elevate Zoom -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.elevatezoom.min.js') }}"></script>
    <!-- jquery-ui-range-slider -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery-ui.range-slider.min.js') }}"></script>
    <!-- jQuery Slim-Scroll -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.slimscroll.min.js') }}"></script>
    <!-- jQuery Resize-Select -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.resize-select.min.js') }}"></script>
    <!-- jQuery Custom Mega Menu -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.custom-megamenu.min.js') }}"></script>
    <!-- jQuery Countdown -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/jquery.custom-countdown.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/owl.carousel.min.js') }}"></script>
    <!-- Main -->
    <script type="text/javascript" src="{{ asset('assets/electro/js/app.js') }}"></script>
</body>

</html>
