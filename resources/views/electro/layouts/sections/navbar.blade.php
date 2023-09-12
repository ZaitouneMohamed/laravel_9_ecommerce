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
                                    <a href="cart.html">
                                        <i class="fas fa-cog u-s-m-r-9"></i>
                                        My Cart</a>
                                </li>
                                <li>
                                    <a href="checkout.html">
                                        <i class="far fa-check-circle u-s-m-r-9"></i>
                                        Checkout</a>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <i class="far fa-heart u-s-m-r-9"></i>
                                        My Wishlist</a>
                                </li>
                            @else
                                <li>
                                    <a href="account.html">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Login / Signup</a>
                                </li>
                            @endauth


                        </ul>
                    </li>
                    <li>
                        <a>USD
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">($) USD</a>
                            </li>
                            <li>
                                <a href="#">(£) GBP</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>ENG
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">ARB</a>
                            </li>
                        </ul>
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
                    <form class="form-searchbox">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Search everything">
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label>
                                <select class="select-box" id="select-category">
                                    <option selected="selected" value="">
                                        All
                                    </option>
                                    <option value="">Men's Clothing</option>
                                    <option value="">Women's Clothing
                                    </option>
                                    <option value="">Toys Hobbies & Robots
                                    </option>
                                    <option value="">Mobiles & Tablets
                                    </option>
                                    <option value="">Consumer Electronics
                                    </option>
                                    <option value="">Books & Audible
                                    </option>
                                    <option value="">Beauty & Health
                                    </option>
                                    <option value="">Furniture Home & Office
                                    </option>
                                </select>
                            </div>
                        </div>
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
                            @include('electro.cart.navbar.count')
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
                                                                    <a
                                                                        href="shop-v2-sub-category.html">{{ $item->name }}</a>
                                                                    <ul>
                                                                        @foreach ($item->products as $item)
                                                                            <li>
                                                                                <a
                                                                                    href="shop-v3-sub-sub-category.html">{{ $item->title }}</a>
                                                                            </li>
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
                            <a href="custom-deal-page.html">New Arrivals
                                <span class="superscript-label-new">NEW</span>
                            </a>
                        </li>
                        <li>
                            <a href="custom-deal-page.html">Exclusive Deals
                                <span class="superscript-label-hot">HOT</span>
                            </a>
                        </li>
                        <li>
                            <a href="custom-deal-page.html">Flash Deals
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>Pages
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">Home & Static Pages</li>
                                    <li>
                                        <a href="home.html" class="u-c-brand">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html">About</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="store-directory.html">Store Directory</a>
                                    </li>
                                    <li>
                                        <a href="terms-and-conditions.html">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="404.html">404</a>
                                    </li>
                                    <li class="menu-title">Single Product Page</li>
                                    <li>
                                        <a href="single-product.html">Single Product Fullwidth</a>
                                    </li>
                                    <li class="menu-title">Blog</li>
                                    <li>
                                        <a href="blog.html">Blog Page</a>
                                    </li>
                                    <li>
                                        <a href="blog-detail.html">Blog Details</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">Ecommerce Pages</li>
                                    <li>
                                        <a href="shop-v2-sub-category.html">Shop</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">Cart</a>
                                    </li>
                                    <li>
                                        <a href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a href="account.html">My Account</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="track-order.html">Track your Order</a>
                                    </li>
                                    <li class="menu-title">Cart Variations</li>
                                    <li>
                                        <a href="cart-empty.html">Cart Ver 1 Empty</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">Cart Ver 2 Full</a>
                                    </li>
                                    <li class="menu-title">Wishlist Variations</li>
                                    <li>
                                        <a href="wishlist-empty.html">Wishlist Ver 1 Empty</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">Wishlist Ver 2 Full</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">Shop Variations</li>
                                    <li>
                                        <a href="shop-v1-root-category.html">Shop Ver 1 Root Category</a>
                                    </li>
                                    <li>
                                        <a href="shop-v2-sub-category.html">Shop Ver 2 Sub Category</a>
                                    </li>
                                    <li>
                                        <a href="shop-v3-sub-sub-category.html">Shop Ver 3 Sub Sub Category</a>
                                    </li>
                                    <li>
                                        <a href="shop-v4-filter-as-category.html">Shop Ver 4 Filter as Category</a>
                                    </li>
                                    <li>
                                        <a href="shop-v5-product-not-found.html">Shop Ver 5 Product Not Found</a>
                                    </li>
                                    <li>
                                        <a href="shop-v6-search-results.html">Shop Ver 6 Search Results</a>
                                    </li>
                                    <li class="menu-title">My Account Variation</li>
                                    <li>
                                        <a href="lost-password.html">Lost Your Password ?</a>
                                    </li>
                                    <li class="menu-title">Checkout Variation</li>
                                    <li>
                                        <a href="confirmation.html">Checkout Confirmation</a>
                                    </li>
                                    <li class="menu-title">Custom Deals Page</li>
                                    <li>
                                        <a href="custom-deal-page.html">Custom Deal Page</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="custom-deal-page.html">Super Sale
                                <span class="superscript-label-discount">-15%</span>
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
