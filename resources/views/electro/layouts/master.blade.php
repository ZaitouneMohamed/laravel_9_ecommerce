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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/electro/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    @yield('scripts')
    <script>
        function AddToCart(id) {
            $.ajax({
                type: 'GET',
                url: "{{ route('addProdustToCart') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'product added successfully'
                    })
                },
                error: function() {
                    alert('An error occurred .');
                }
            })
            allFunctions();
        }

        function getcartCount() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getCartCount') }}",
                success: function(response) {
                    console.log("cart count " + response.count);
                    document.getElementById('count').innerHTML = response.count
                    document.getElementById('total').innerHTML = response.total
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
        }

        function getCartContent() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getCartContent') }}",
                success: function(response) {
                    var cart = "";
                    var total = 0;
                    if (response.length > 0) {
                        response.forEach(function(item) {
                            total += item.price * item.quantity
                            cart +=
                                `
                                <li class="clearfix">
                                    <a href="#">
                                        <img src="` + item.image + `" alt="Product">
                                        <span class="mini-item-name">` + item.title + `</span>
                                        <span class="mini-item-price">` + item.price + `</span>
                                        <span class="mini-item-quantity"> x ` + item.quantity + ` </span>
                                    </a>
                                </li>
                                `
                        });
                        document.getElementById('cart_content').innerHTML = cart;
                        document.getElementById('total_content').innerHTML = "$" + total;
                    } else {
                        cart = "<li>Your cart is empty</li>";
                        // document.getElementById('cart_content').innerHTML = cart;
                    }
                },
                error: function() {
                    console.log('An error occurred.');
                }
            });
        }

        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
        function  allFunctions() {
            getcartCount();
            getCartContent();
        }
        allFunctions();
    </script>

    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <!-- Modernizr-JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
