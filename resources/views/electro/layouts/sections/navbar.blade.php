<!-- Header -->
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+111444989">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            Telephone:+111-444-989</a>
                    </li>
                    <li>
                        <a href="mailto:contact@domain.com">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            E-mail: contact@domain.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a>My Account
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            @auth
                                <li>
                                    <a href="{{ route('user.profile') }}">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('cart.list') }}">
                                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        My Cart</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-heart u-s-m-r-9"></i>
                                        My Wishlist</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Login / Signup</a>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/electro/images/main-logo/groover-branding-1.png') }} "
                                alt="Groover Brand Logo" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    <form class="form-searchbox" action="{{ route('Search') }}" method="POST">
                        @csrf
                        @method('GET')
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" name="word"
                            placeholder="Search everything">
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="home.html">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li class="u-d-none-lg">
                                <a href="wishlist.html">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter" id="count"></span>
                                    <span class="item-price" id="total"><span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="wishlist.html">
                <i class="far fa-heart"></i>
                <span class="fixed-item-counter">4</span>
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->
    <!-- Mini Cart -->
    {{-- <livewire:cart.cart-content /> --}}
    @include('electro.cart.navbar.content')
    <!-- Mini Cart /- -->
    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu @if (\Route::currentRouteName() != 'home') v-close @endif">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            All Categories
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    @foreach (\App\Models\Categorie::all() as $item)
                                        <li class="js-backdrop">
                                            <a href="shop-v1-root-category.html">
                                                {{-- <i class="ion ion-md-shirt"></i> --}}
                                                {{ $item->name }}
                                                <i class="ion ion-ios-arrow-forward"></i>
                                            </a>
                                            <button class="v-button ion ion-md-add"></button>
                                            <div class="v-drop-right" style="width: 700px;">
                                                <div class="row">
                                                    @foreach ($item->subcategories as $item)
                                                        <div class="col-lg-4">
                                                            <ul class="v-level-2">
                                                                <li>
                                                                    <a href="#">{{ $item->name }}</a>
                                                                    <ul>
                                                                        @foreach ($item->products as $item)
                                                                            @if ($item->active)
                                                                                <li>
                                                                                    <a
                                                                                        href="{{ route('products.show', $item->id) }}">{{ $item->title }}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{-- <li>
                                        <a class="v-more">
                                            <i class="ion ion-md-add"></i>
                                            <span>View More</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{ route('home') }}">Home
                                {{-- <span class="superscript-label-new">NEW</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('shop.AllProduct') }}">products
                                {{-- <span class="superscript-label-hot">HOT</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About
                                {{-- <span class="superscript-label-hot">HOT</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="#">Contact
                                {{-- <span class="superscript-label-hot">HOT</span> --}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->
