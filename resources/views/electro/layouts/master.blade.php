<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    @livewireStyles

    <!-- Google font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/electro/css/bootstrap.min.css') }} " />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/electro/css/slick.css') }} " />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/electro/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/electro/css/nouislider.min.css') }} " />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/electro/css/font-awesome.min.css') }} ">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/electro/css/style.css') }}" />
</head>

<body>


    @include("electro.layouts.sections.navbar")

    @yield("BREADCRUMB")
    {{-- <!--  -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Regular Page</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Blank</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB --> --}}

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @yield("content")
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    @include("electro.layouts.sections.footer")


    <script type="text/javascript">
        alert('ghj')
        function getCartCountNavbar() {
            cart = document.querySelector(".cartcount");
            total = document.querySelector("#total");
            subtotal = document.querySelector("#subtotal");
            $.ajax({
                type: 'get',
                url: "/getCartCount",
                success: function(response) {
                    cart.innerHTML = response.count;
                    total.innerHTML = "$" + response.total;
                    subtotal.innerHTML = "SUBTOTAL : " response.subtotal;
                    console.log(response.count)
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
            alert("gjw9")
        }

            getCartCountNavbar();
        // setInterval(() => {
        //     getCartCountNavbar();
        // }, 500);
    </script>
    @yield("scripts")
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- jQuery Plugins -->
    <script src="{{ asset('assets/electro/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/electro/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/electro/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/electro/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/electro/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/electro/js/main.js') }}"></script>
</body>

</html>
