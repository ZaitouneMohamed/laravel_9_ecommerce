@extends('electro.layouts.master')

@section('content')
    <!-- Main-Slider -->
    <div class="default-height ph-item">
        <div class="slider-main owl-carousel">
            <div class="bg-image one">
                <div class="slide-content slide-animation">
                    <h1>Casual Clothing</h1>
                    <h2>lifestyle / clothing / hype</h2>
                </div>
            </div>
            <div class="bg-image two">
                <div class="slide-content-2 slide-animation">
                    <h2 class="slide-2-h2-a">Hiking</h2>
                    <h2 class="slide-2-h2-b">Collection</h2>
                    <h1>2018</h1>
                </div>
            </div>
            <div class="bg-image three">
                <div class="slide-content slide-animation">
                    <h1>Tech
                        <span style="color:#333">Deals</span>
                    </h1>
                    <h2 style="color:#333"># shopping</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Main-Slider /- -->
    <!-- Banner-Layer -->
    <div class="banner-layer">
        <div class="container">
            <div class="image-banner">
                <a href="#" class="mx-auto banner-hover effect-dark-opacity">
                    <img class="img-fluid" src="{{ asset('assets/electro/images/banners/bannerlayer-1.jpg') }} "
                        alt="Winter Season Banner">
                </a>
            </div>
        </div>
    </div>
    <!-- Banner-Layer /- -->
    <!-- Men-Clothing -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">Top Categorie</h3>
                <h3 class="sec-maker-h3">{{ $topcategorie->categorie->name }}</h3>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="men-latest-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    @foreach ($topcategorie->products as $item)
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
                                                    <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                        Wishlist</a>
                                                    <a class="item-addCart" onclick="AddToCart({{ $item->id }})">Add to
                                                        Cart</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Men-Clothing-Timing-Section -->
    {{-- <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <span class="sec-maker-span-text">Men's Clothing</span>
                <h3 class="sec-maker-h3 u-s-m-b-22">Hot Deals</h3>
                <span class="sec-maker-span-text">Ends in</span>
                <!-- Timing-Box -->
                <div class="section-timing-wrapper dynamic">
                    <span class="fictitious-seconds" style="display:none;">18000</span>
                    <div class="section-box-wrapper box-days">
                        <div class="section-box">
                            <span class="section-key">120</span>
                            <span class="section-value">Days</span>
                        </div>
                    </div>
                    <div class="section-box-wrapper box-hrs">
                        <div class="section-box">
                            <span class="section-key">54</span>
                            <span class="section-value">HRS</span>
                        </div>
                    </div>
                    <div class="section-box-wrapper box-mins">
                        <div class="section-box">
                            <span class="section-key">3</span>
                            <span class="section-value">MINS</span>
                        </div>
                    </div>
                    <div class="section-box-wrapper box-secs">
                        <div class="section-box">
                            <span class="section-key">32</span>
                            <span class="section-value">SEC</span>
                        </div>
                    </div>
                </div>
                <!-- Timing-Box /- -->
            </div>
            <!-- Carousel -->
            <div class="slider-fouc">
                <div class="products-slider owl-carousel" data-item="4">
                    <div class="item">
                        <div class="image-container">
                            <a class="item-img-wrapper-link" href="single-product.html">
                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
                            </a>
                            <div class="item-action-behaviors">
                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="what-product-is">
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="shop-v1-root-category.html">Men's</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="shop-v2-sub-category.html">Outwear</a>
                                    </li>
                                    <li>
                                        <a href="shop-v3-sub-sub-category.html">Jackets</a>
                                    </li>
                                </ul>
                                <h6 class="item-title">
                                    <a href="single-product.html">Maire Battlefield Jeep Men's Jacket</a>
                                </h6>
                                <div class="item-stars">
                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                        <span style='width:0'></span>
                                    </div>
                                    <span>(0)</span>
                                </div>
                            </div>
                            <div class="price-template">
                                <div class="item-new-price">
                                    $55.00
                                </div>
                                <div class="item-old-price">
                                    $60.00
                                </div>
                            </div>
                        </div>
                        <div class="tag hot">
                            <span>HOT</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image-container">
                            <a class="item-img-wrapper-link" href="single-product.html">
                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
                            </a>
                            <div class="item-action-behaviors">
                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="what-product-is">
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="shop-v1-root-category.html">Men's</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="shop-v2-sub-category.html">Outwear</a>
                                    </li>
                                    <li>
                                        <a href="shop-v3-sub-sub-category.html">Jackets</a>
                                    </li>
                                </ul>
                                <h6 class="item-title">
                                    <a href="single-product.html">Fern Green Men's Jacket</a>
                                </h6>
                                <div class="item-stars">
                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                        <span style='width:0'></span>
                                    </div>
                                    <span>(0)</span>
                                </div>
                            </div>
                            <div class="price-template">
                                <div class="item-new-price">
                                    $55.00
                                </div>
                                <div class="item-old-price">
                                    $60.00
                                </div>
                            </div>
                        </div>
                        <div class="tag hot">
                            <span>HOT</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image-container">
                            <a class="item-img-wrapper-link" href="single-product.html">
                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
                            </a>
                            <div class="item-action-behaviors">
                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="what-product-is">
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="shop-v1-root-category.html">Men's</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="shop-v2-sub-category.html">Sunglasses</a>
                                    </li>
                                    <li>
                                        <a href="shop-v3-sub-sub-category.html">Round</a>
                                    </li>
                                </ul>
                                <h6 class="item-title">
                                    <a href="single-product.html">Brown Dark Tan Round Double Bridge Sunglasses</a>
                                </h6>
                                <div class="item-stars">
                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                        <span style='width:0'></span>
                                    </div>
                                    <span>(0)</span>
                                </div>
                            </div>
                            <div class="price-template">
                                <div class="item-new-price">
                                    $55.00
                                </div>
                                <div class="item-old-price">
                                    $60.00
                                </div>
                            </div>
                        </div>
                        <div class="tag hot">
                            <span>HOT</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image-container">
                            <a class="item-img-wrapper-link" href="single-product.html">
                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
                            </a>
                            <div class="item-action-behaviors">
                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="what-product-is">
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="shop-v1-root-category.html">Men's</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="shop-v2-sub-category.html">Sunglasses</a>
                                    </li>
                                    <li>
                                        <a href="shop-v3-sub-sub-category.html">Round</a>
                                    </li>
                                </ul>
                                <h6 class="item-title">
                                    <a href="single-product.html">Black Round Double Bridge Sunglasses</a>
                                </h6>
                                <div class="item-stars">
                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                        <span style='width:0'></span>
                                    </div>
                                    <span>(0)</span>
                                </div>
                            </div>
                            <div class="price-template">
                                <div class="item-new-price">
                                    $55.00
                                </div>
                                <div class="item-old-price">
                                    $60.00
                                </div>
                            </div>
                        </div>
                        <div class="tag hot">
                            <span>HOT</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel /- -->
        </div>
    </section> --}}
    <!-- Men-Clothing-Timing-Section /- -->
    <!-- Banner-Image & View-more -->
    <div class="banner-image-view-more">
        <div class="container">
            <div class="image-banner u-s-m-y-40">
                <a href="#" class="mx-auto banner-hover effect-dark-opacity">
                    <img class="img-fluid" src="{{ asset('assets/electro/images/banners/ban-men.jpg') }} "
                        alt="Banner Image">
                </a>
            </div>
            <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
                <a class="redirect-link" href="#">
                    <span>View more on this category</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Banner-Image & View-more /- -->
    <!-- Men-Clothing /- -->
    <!-- Women-Clothing -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">Collected New Items</h3>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="women-latest-products">
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
                        <div class="tab-pane fade" id="women-best-selling-products">
                            <!-- Product Not Found -->
                            <div class="product-not-found">
                                <div class="not-found">
                                    <h2>SORRY!</h2>
                                    <h6>There is not any product in specific catalogue.</h6>
                                </div>
                            </div>
                            <!-- Product Not Found /- -->
                        </div>
                        <div class="tab-pane fade" id="women-top-rating-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="single-product.html">
                                                <img class="img-fluid" src="images/product/product@3x.jpg"
                                                    alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="#">Women's</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Dresses</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="#">Grey Nickel Special Occasion Dress</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $55.00
                                                </div>
                                                <div class="item-old-price">
                                                    $60.00
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag sale">
                                            <span>SALE</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="#">
                                                <img class="img-fluid" src="images/product/product@3x.jpg"
                                                    alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="#">Women's</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Dresses</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="#">Red Carmine Winter Special Occasion
                                                        Dress
                                                    </a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $55.00
                                                </div>
                                                <div class="item-old-price">
                                                    $60.00
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="#">
                                                <img class="img-fluid" src="images/product/product@3x.jpg"
                                                    alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="#">Women's</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="#">Bottoms</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Shoes</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="#">Wax Flower with Corn Silk Heel</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $55.00
                                                </div>
                                                <div class="item-old-price">
                                                    $60.00
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="single-product.html">
                                                <img class="img-fluid" src="images/product/product@3x.jpg"
                                                    alt="Product">
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop-v1-root-category.html">Women's</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="shop-v2-sub-category.html">Intimates</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">Bras</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="single-product.html">Red Wild Bra</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    $55.00
                                                </div>
                                                <div class="item-old-price">
                                                    $60.00
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tag discount">
                                            <span>-15%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="women-featured-products">
                            <!-- Product Not Found -->
                            <div class="product-not-found">
                                <div class="not-found">
                                    <h2>SORRY!</h2>
                                    <h6>There is not any product in specific catalogue.</h6>
                                </div>
                            </div>
                            <!-- Product Not Found /- -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
                <a class="redirect-link" href="store-directory.html">
                    <span>View more on this category</span>
                </a>
            </div>
        </div>
    </section>
    <!-- Women-Clothing /- -->
    <!-- Toys-Hobbies-&-Robots -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">Prenium Products</h3>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="toys-latest-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    @foreach ($prenium_products as $item)
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link"
                                                    href="{{ route('products.show', $item->id) }}">
                                                    <img class="img-fluid" src="{{ $item->FirstImage }}" alt="Product"
                                                        width="120px" height="120px">
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal"
                                                        href="#quick-view">Quick
                                                        Look
                                                    </a>
                                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                        Wishlist</a>
                                                    <a class="item-addCart" onclick="AddToCart({{ $item->id }})">Add
                                                        to Cart</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li class="has-separator">
                                                            <a href="shop-v1-root-category.html">Men's</a>
                                                        </li>
                                                        <li class="has-separator">
                                                            <a href="shop-v2-sub-category.html">Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-v3-sub-sub-category.html">Hoodies</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="single-product.html">{{ $item->title }}</a>
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
                    </div>
                </div>
            </div>
            <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
                <a class="redirect-link" href="store-directory.html">
                    <span>View more on this category</span>
                </a>
            </div>
        </div>
    </section>
    <!-- Toys-Hobbies-&-Robots /- -->
    <!-- Continue-Link -->
    <div class="continue-link-wrapper u-s-p-b-80">
        <a class="continue-link" href="store-directory.html" title="View all products on site">
            <i class="ion ion-ios-more"></i>
        </a>
    </div>
    <!-- Continue-Link /- -->
    <!-- Brand-Slider -->
    <div class="brand-slider u-s-p-b-80">
        <div class="container">
            <div class="brand-slider-content owl-carousel" data-item="5">
                @foreach ($categories as $item)
                    <div class="brand-pic">
                        <a href="#">
                            <img src="{{ $item->CategorieImage }}" alt="Brand Logo 7">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Brand-Slider /- -->
    <!-- Site-Priorities -->
    <section class="app-priority">
        <div class="container">
            <div class="priority-wrapper u-s-p-b-80">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-star"></i>
                            </div>
                            <h2>
                                Great Value
                            </h2>
                            <p>We offer competitive prices on our 100 million plus product range</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-cash"></i>
                            </div>
                            <h2>
                                Shop with Confidence
                            </h2>
                            <p>Our Protection covers your purchase from click to delivery</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-ios-card"></i>
                            </div>
                            <h2>
                                Safe Payment
                            </h2>
                            <p>Pay with the world’s most popular and secure payment methods</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-contacts"></i>
                            </div>
                            <h2>
                                24/7 Help Center
                            </h2>
                            <p>Round-the-clock assistance for a smooth shopping experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Site-Priorities /- -->

    <!-- Dummy Selectbox -->
    <div class="select-dummy-wrapper">
        <select id="compute-select">
            <option id="compute-option">All</option>
        </select>
    </div>
    <!-- Dummy Selectbox /- -->
    <!-- Responsive-Search -->
    <div class="responsive-search-wrapper">
        <button type="button" class="button ion ion-md-close" id="responsive-search-close-button"></button>
        <div class="responsive-search-container">
            <div class="container">
                <p>Start typing and press Enter to search</p>
                <form class="responsive-search-form">
                    <label class="sr-only" for="search-text">Search</label>
                    <input id="search-text" type="text" class="responsive-search-field" placeholder="PLEASE SEARCH">
                    <i class="fas fa-search"></i>
                </form>
            </div>
        </div>
    </div>
    <!-- Responsive-Search /- -->
    <!-- Quick-view-Modal -->
    <div id="quick-view" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="button dismiss-button ion ion-ios-close" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <!-- Product-zoom-area -->
                            <div class="zoom-area">
                                <img id="zoom-pro-quick-view" class="img-fluid" src="images/product/product@4x.jpg"
                                    data-zoom-image="images/product/product@4x.jpg" alt="Zoom Image">
                                <div id="gallery-quick-view" class="u-s-m-t-10">
                                    <a class="active" data-image="images/product/product@4x.jpg"
                                        data-zoom-image="images/product/product@4x.jpg">
                                        <img src="images/product/product@2x.jpg" alt="Product">
                                    </a>
                                    <a data-image="images/product/product@4x.jpg"
                                        data-zoom-image="images/product/product@4x.jpg">
                                        <img src="images/product/product@2x.jpg" alt="Product">
                                    </a>
                                    <a data-image="images/product/product@4x.jpg"
                                        data-zoom-image="images/product/product@4x.jpg">
                                        <img src="images/product/product@2x.jpg" alt="Product">
                                    </a>
                                    <a data-image="images/product/product@4x.jpg"
                                        data-zoom-image="images/product/product@4x.jpg">
                                        <img src="images/product/product@2x.jpg" alt="Product">
                                    </a>
                                    <a data-image="images/product/product@4x.jpg"
                                        data-zoom-image="images/product/product@4x.jpg">
                                        <img src="images/product/product@2x.jpg" alt="Product">
                                    </a>
                                    <a data-image="images/product/product@4x.jpg"
                                        data-zoom-image="images/product/product@4x.jpg">
                                        <img src="images/product/product@2x.jpg" alt="Product">
                                    </a>
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
                                            <a href="single-product.html">Casual Hoodie Full Cotton</a>
                                        </h1>
                                    </div>
                                    <ul class="bread-crumb">
                                        <li class="has-separator">
                                            <a href="home.html">Home</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="shop-v1-root-category.html">Men's Clothing</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="shop-v2-sub-category.html">Tops</a>
                                        </li>
                                        <li class="is-marked">
                                            <a href="shop-v3-sub-sub-category.html">Hoodies</a>
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
                                    <p>This hoodie is full cotton. It includes a muff sewn onto the lower front, and
                                        (usually) a drawstring to adjust the hood opening. Throughout the U.S., it is common
                                        for middle-school, high-school, and college students to wear this sweatshirts—with
                                        or without hoods—that display their respective school names or mascots across the
                                        chest, either as part of a uniform or personal preference.
                                    </p>
                                </div>
                                <div class="section-3-price-original-discount u-s-p-y-14">
                                    <div class="price">
                                        <h4>$55.00</h4>
                                    </div>
                                    <div class="original-price">
                                        <span>Original Price:</span>
                                        <span>$60.00</span>
                                    </div>
                                    <div class="discount-price">
                                        <span>Discount:</span>
                                        <span>8%</span>
                                    </div>
                                    <div class="total-save">
                                        <span>Save:</span>
                                        <span>$5</span>
                                    </div>
                                </div>
                                <div class="section-4-sku-information u-s-p-y-14">
                                    <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                                    <div class="availability">
                                        <span>Availability:</span>
                                        <span>In Stock</span>
                                    </div>
                                    <div class="left">
                                        <span>Only:</span>
                                        <span>50 left</span>
                                    </div>
                                </div>
                                <div class="section-5-product-variants u-s-p-y-14">
                                    <h6 class="information-heading u-s-m-b-8">Product Variants:</h6>
                                    <div class="color u-s-m-b-11">
                                        <span>Available Color:</span>
                                        <div class="color-variant select-box-wrapper">
                                            <select class="select-box product-color">
                                                <option value="1">Heather Grey</option>
                                                <option value="3">Black</option>
                                                <option value="5">White</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sizes u-s-m-b-11">
                                        <span>Available Size:</span>
                                        <div class="size-variant select-box-wrapper">
                                            <select class="select-box product-size">
                                                <option value="">Male 2XL</option>
                                                <option value="">Male 3XL</option>
                                                <option value="">Kids 4</option>
                                                <option value="">Kids 6</option>
                                                <option value="">Kids 8</option>
                                                <option value="">Kids 10</option>
                                                <option value="">Kids 12</option>
                                                <option value="">Female Small</option>
                                                <option value="">Male Small</option>
                                                <option value="">Female Medium</option>
                                                <option value="">Male Medium</option>
                                                <option value="">Female Large</option>
                                                <option value="">Male Large</option>
                                                <option value="">Female XL</option>
                                                <option value="">Male XL</option>
                                            </select>
                                        </div>
                                    </div>
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
                                                <input type="text" class="quantity-text-field" value="1">
                                                <a class="plus-a" data-max="1000">&#43;</a>
                                                <a class="minus-a" data-min="1">&#45;</a>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="button button-outline-secondary" type="submit">Add to
                                                cart</button>
                                            <button
                                                class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                            <button
                                                class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Product-details /- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
