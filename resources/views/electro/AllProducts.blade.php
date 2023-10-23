@extends('electro.layouts.master')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Shop</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="home.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="shop-v2-sub-category.html">Shop</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Shop-Page -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <div class="row">
                <!-- Shop-Left-Side-Bar-Wrapper -->
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <!-- Filter-Price -->
                    <div class="facet-filter-by-price">
                        <h3 class="title-name">Price</h3>
                        <form class="facet-form" action="#" method="post">
                            <!-- Final-Result -->
                            <div class="amount-result clearfix">
                                <div class="price-from">$0</div>
                                <div class="price-to">$3000</div>
                            </div>
                            <!-- Final-Result /- -->
                            <!-- Range-Slider  -->
                            <div class="price-filter"></div>
                            <!-- Range-Slider /- -->
                            <!-- Range-Manipulator -->
                            <div class="price-slider-range" data-min="0" data-max="5000" data-default-low="0"
                                data-default-high="3000" data-currency="$"></div>
                            <!-- Range-Manipulator /- -->
                            <button type="submit" class="button button-primary">Filter</button>
                        </form>
                    </div>
                    <!-- Filter-Price /- -->
                    <!-- Filters /- -->
                </div>
                <!-- Shop-Left-Side-Bar-Wrapper /- -->
                <!-- Shop-Right-Wrapper -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Page-Bar -->
                    <div class="page-bar clearfix">
                        <div class="shop-settings">
                            <a id="list-anchor" class="active">
                                <i class="fas fa-th-list"></i>
                            </a>
                            <a id="grid-anchor">
                                <i class="fas fa-th"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Page-Bar /- -->
                    <!-- Row-of-Product-Container -->
                    <div class="row product-container list-style">
                        @forelse ($products as $item)
                            <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ route('products.show', $item->id) }}">
                                            <img class="img-fluid" src="{{ $item->FirstImage }}" alt="Product">
                                        </a>
                                        <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                            @auth
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            @endauth
                                            <a class="item-addCart" href="javascript:void(0)" onclick="AddToCart({{ $item->id }})">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li>
                                                    <a href="#">{{ $item->SubCategorie->name }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="{{ route('products.show', $item->id) }}">{{ $item->title }}</a>
                                            </h6>
                                            <div class="item-description">
                                                <p>
                                                    {{ $item->description }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ${{ $item->price }}
                                            </div>
                                            <div class="item-old-price">
                                                ${{ $item->old_price }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Shop-Page -->
                            <div class="page-shop u-s-p-t-80">
                                <div class="container">
                                    <!-- Result-Wrapper -->
                                    <div class="result-wrapper u-s-p-y-80">
                                        <ul class="bread-crumb">
                                            <li class="has-separator">
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="is-marked">
                                                <a href="#">All Categories</a>
                                            </li>
                                        </ul>
                                        <h4>Your search, did not match any products. A partial match of your keywords is
                                            listed below.</h4>
                                        <h1>SORRY</h1>
                                        <form action="{{ route('Search') }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <label class="sr-only" for="search-not-found">Enter Keywords</label>
                                            <input type="text" class="text-field" id="search-not-found" name="word"
                                                placeholder="Search Products...">
                                            <button class="button">Search</button>
                                        </form>
                                    </div>
                                    <!-- Result-Wrapper /- -->
                                </div>
                            </div>
                            <!-- Shop-Page /- -->
                        @endforelse
                    </div>
                    {{ $products->links() }}
                    <!-- Row-of-Product-Container /- -->
                </div>
                <!-- Shop-Right-Wrapper /- -->
            </div>
        </div>
    </div>
    <!-- Shop-Page /- -->
@endsection
