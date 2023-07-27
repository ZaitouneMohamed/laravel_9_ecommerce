<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="/"><img src="{{ asset('assets/landing/img/core-img/logo.png') }}" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="#">Shop</a>
                            <div class="megamenu">
                                @foreach (\App\Models\Categorie::all() as $item)
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">{{$item->name}}</li>
                                        @foreach ($item->subcategories as $item)
                                            <li><a href="shop.html">{{$item->name}}</a></li>
                                        @endforeach
                                    </ul>
                                @endforeach
                                <div class="single-mega cn-col-4">
                                    <img src="{{ asset('assets/landing/img/bg-img/bg-6.jpg') }}" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="single-product-details.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="regular-page.html">Regular Page</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="#" method="post">
                    <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area">
                <a href="#"><img src="{{ asset('assets/landing/img/core-img/heart.svg') }}" alt=""></a>
            </div>
            <!-- User Login Info -->
            <div class="user-login-info">
                <a href="#"><img src="{{ asset('assets/landing/img/core-img/user.svg') }}" alt=""></a>
            </div>
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="{{ asset('assets/landing/img/core-img/bag.svg') }}" alt=""> <livewire:user.cart.cart-count /></a>
            </div>
        </div>

    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="{{ asset('assets/landing/img/core-img/bag.svg') }}" alt="">
            <livewire:user.cart.cart-count />
        </a>
    </div>
    <livewire:user.cart.nav-cart />


</div>
