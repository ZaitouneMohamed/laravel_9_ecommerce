    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{ asset('assets/electro/img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option>All Categories</option>
                                    @foreach (\App\Models\Categorie::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty cartcount"></div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <livewire:user.cart.nav-cart />
                                    </div>
                                    {{-- <div class="cart-summary">
                                        <small>3 Item(s) selected</small>
                                        <h5 id="subtotal"></h5>
                                    </div> --}}
                                    <div class="cart-btns">
                                        <a href="{{ route('cart.list') }}">View Cart</a>
                                        <a href="{{ route('checkout') }}">Checkout <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav"
                    style="
                display: flex;
                flex-direction: row;
            ">
                    <li class=""><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    @foreach (app\Models\Categorie::take(3)->get() as $item)
                        <li><a href="#">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
    <script type="text/javascript">
        function getCartCountNavbar() {
            cart = document.querySelector(".cartcount");
            subtotal = document.querySelector("#subtotal");
            $.ajax({
                type: 'get',
                url: "/getCartCount",
                success: function(response) {
                    cart.innerHTML = `<div class="qty cartcount">`+1+`</div>` ;
                    subtotal.innerHTML = "SUBTOTAL : "
                    response.subtotal;
                    console.log(response.count)
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
        }

        setInterval(() => {
            getCartCountNavbar();
        }, 500);
    </script>
