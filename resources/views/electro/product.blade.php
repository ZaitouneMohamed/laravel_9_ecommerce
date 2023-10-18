@extends('electro.layouts.master')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detail</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-zoom-area -->
                    <div class="zoom-area">
                        <img id="zoom-pro" class="img-fluid" src="{{ $product->FirstImage }}"
                            data-zoom-image="{{ $product->FirstImage }}" alt="Zoom Image">
                        <div id="gallery" class="u-s-m-t-10">
                            @foreach ($product->Images as $item)
                                <a class="active" data-image="{{ asset('images/products') }}/{{ $item->url }}"
                                    data-zoom-image="{{ asset('images/products') }}/{{ $item->url }}">
                                    <img src="{{ asset('images/products') }}/{{ $item->url }}" alt="Product">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">
                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a>{{ $product->title }}</a>
                                </h1>
                            </div>
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="#">Home</a>
                                </li>
                                <li class="has-separator">
                                    <a href="#">Men's Clothing</a>
                                </li>
                                <li class="has-separator">
                                    <a href="#">Tops</a>
                                </li>
                                <li class="is-marked">
                                    <a href="#">Hoodies</a>
                                </li>
                            </ul>
                            <div class="product-rating">
                                <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                    <span style='width:67px'></span>
                                </div>
                                <span>(23)</span>
                            </div>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Description:</h6>
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">
                            <div class="price">
                                <h4>${{ $product->price }}</h4>
                            </div>
                            <div class="original-price">
                                <span>Original Price:</span>
                                <span>${{ $product->old_price }}</span>
                            </div>
                            {{-- <div class="discount-price">
                                <span>Discount:</span>
                                <span>8%</span>
                            </div>
                            <div class="total-save">
                                <span>Save:</span>
                                <span>$5</span>
                            </div> --}}
                        </div>
                        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                            <form action="#" class="post-form">
                                <div class="quick-social-media-wrapper u-s-m-b-22">
                                    <span>Share:</span>
                                    <ul class="social-media-list">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-rss"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        <input type="text" class="quantity-text-field" value="1" id="{{$product->id}}">
                                        <a class="plus-a" data-max="1000">&#43;</a>
                                        <a class="minus-a" data-min="1">&#45;</a>
                                    </div>
                                </div>
                                <div>
                                    <a class="button button-outline-secondary"
                                        onclick="AddToCart({{ $product->id }})">Add to cart</a>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Similar-Products -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Similar Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach ($latest_products as $item)
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link"
                                                    href="{{ route('GetProduct', $item->id) }}">
                                                    <img class="img-fluid" src="{{ $item->FirstImage }}" alt="Product"
                                                        width="120px" height="120px">
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                        Look
                                                    </a>
                                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                        Wishlist</a>
                                                    <a class="item-addCart" href="javascript:void(0)"
                                                        onclick="AddToCart({{ $item->id }})">Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li class="has-separator">
                                                            <a href="#">Men's</a>
                                                        </li>
                                                        <li class="has-separator">
                                                            <a href="#">Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Hoodies</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a
                                                            href="{{ route('GetProduct', $item->id) }}">{{ $item->title }}</a>
                                                    </h6>
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
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
@endsection
