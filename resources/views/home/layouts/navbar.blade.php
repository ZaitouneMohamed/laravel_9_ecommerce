<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="/"><img src="{{ asset('assets/landing/img/core-img/logo.png') }}"
                    alt=""></a>
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
                        <li><a href="/">Welcome</a></li>
                        <li><a href="#">Shop</a>
                            <div class="megamenu">
                                @foreach (\App\Models\Categorie::all() as $item)
                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a
                                                href="{{ route('shop.categorie', $item->id) }}">{{ $item->name }}</a>
                                        </li>
                                        @foreach ($item->subcategories as $item)
                                            <li><a
                                                    href="{{ route('shop.subcategorie', $item->id) }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                                <div class="single-mega cn-col-4">
                                    <img src="{{ asset('assets/landing/img/bg-img/bg-6.jpg') }}" alt="">
                                </div>
                            </div>
                        </li>
                        @guest
                            <li><a href="#">account</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </li>
                        @endguest
                        @auth
                            <li><a href="#">{{ Auth::user()->FullName }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                    <li><a href="{{ route('MyOrdersList') }}">orders</a></li>
                                    <li><a href="{{ route('logout') }}">Log Out</a></li>
                                </ul>
                            </li>
                        @endauth
                        {{-- <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li> --}}
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
            <div class="user-login-info profile-image">
                @auth
                    @if (Auth::user()->image)
                        <a href="{{ route('user.profile') }}"><img
                                src="{{ asset('images/profiles') }}/{{ Auth::user()->image->url }}" alt=""
                                style="border-radius: 50%"></a>
                    @else
                        <a href="{{ route('user.profile') }}"><img src="{{ asset('assets/landing/img/core-img/user.svg') }}"
                                alt=""></a>
                    @endif

                @endauth
                @guest
                    <a href="{{ route('login') }}"><img src="{{ asset('assets/landing/img/core-img/user.svg') }}"
                            alt=""></a>
                @endguest
            </div>
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="{{ asset('assets/landing/img/core-img/bag.svg') }}"
                        alt="">
                    <span class="cartCount"></span>
                </a>
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
        <a href="#" id="rightSideCart"><img src="{{ asset('assets/landing/img/core-img/bag.svg') }}"
                alt="">
            <span id="cartCount">
            </span>
        </a>
    </div>
    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <ul class="summary-table">
                <li><span>subtotal:</span> <span id="total">$</span></li>
                <li><span>delivery:</span> <span>30</span></li>
                <li><span>discount:</span> <span>0%</span></li>
                <li><span>total:</span> <span id="subtotal"></span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="{{ route('cart.list') }}" class="btn essence-btn">check out</a>
            </div>
        </div>
    </div>


</div>
