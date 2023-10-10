@extends('home.master.master')

@section('content')
    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay"
        style="background-image: url(assets/landing/img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Ravi</h6>
                        <h2>Spring Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <h1 class="text text-center">Shop By Categories</h1><br>
            <div class="row justify-content-center">
                @if ($categories)
                    @foreach ($categories as $item)
                        <!-- Single Catagory -->
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
                                style="background-image: url({{ asset('images/categories') }}/{{ $item->image->url }});">
                                <div class="catagory-content">
                                    <a href="#">{{ $item->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->


    <!-- ##### New Arrivals Area Start ##### -->
    {{-- <livewire:user.products.latest /> --}}
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Latest Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @if ($products)
                            @foreach ($products as $item)
                                <!-- Single Product -->
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        {{-- <img src="{{ asset('assets/landing/img/product-img/product-1.jpg') }}" alt=""> --}}
                                        <img src="{{ asset('images/products') }}/{{ $item->images->first()->url }}"
                                            alt="">
                                        {{-- <img src="{{$item->image}}" alt=""> --}}
                                        <!-- Hover Thumb -->
                                        <img class="hover-img"
                                            src="{{ asset('images/products') }}/{{ $item->images->last()->url }}"
                                            alt="">
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{ $item->subcategorie->categorie->name }}</span>
                                        <a href="{{route('GetProduct',$item->id)}}">
                                            <h6>{{ Str::limit($item->title, 15, '...') }}</h6>
                                        </a>
                                        <p class="product-price">${{ $item->price }}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <button onclick="AddToCart({{ $item->id }})"
                                                    class="btn essence-btn">Add
                                                    to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('ProductList') }}" class="btn essence-btn">
                    <i class="fa fa-eye"></i>
                    SHOW MORE
                </a>
            </div>

        </div>
    </section>

    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### latest products Area Start ##### -->
    <livewire:user.products.popular />
    <!-- ##### latest product Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/landing/img/core-img/brand1.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/landing/img/core-img/brand2.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/landing/img/core-img/brand3.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/landing/img/core-img/brand4.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/landing/img/core-img/brand5.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('assets/landing/img/core-img/brand6.png') }}" alt="">
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function AddToCart(id) {
            $.ajax({
                type: 'GET',
                url: "AddToCart/" + id,
                success: function(response) {
                    // cardCount();
                    // $('#success-message').show();
                    // setTimeout(() => {
                    //     $('#success-message').hide();
                    // }, 3000);
                    console.log('product added to cart')
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
        }

        // function test() {
        //     $.ajax({
        //         type: 'GET',
        //         url: "/GetProducts",
        //         success: function(response) {
        //             var products = "";
        //             response.forEach(function(product) {
        //                 products +=
        //                     `
    //                         <div class="col mb-5">
    //                             <div class="card h-100">
    //                                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
    //                                 </div>
    //                                 <img class="card-img-top" src="` + product.image + `" alt="..." />
    //                                 <div class="card-body p-4">
    //                                     <div class="text-center">
    //                                         <h5 class="fw-bolder">` + product.title + `</h5>
    //                                         <div class="d-flex justify-content-center small text-warning mb-2">
    //                                             <div class="bi-star-fill"></div>
    //                                             <div class="bi-star-fill"></div>
    //                                             <div class="bi-star-fill"></div>
    //                                             <div class="bi-star-fill"></div>
    //                                             <div class="bi-star-fill"></div>
    //                                         </div>
    //                                         <span class="text-muted text-decoration-line-through">$` + product
        //                     .old_price + `</span>$` + product.new_price + `
    //                                     </div>
    //                                 </div>
    //                                 <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
    //                                     <div class="text-center"><button class="btn btn-outline-dark mt-auto"
    //                                         onclick="AddToCart(` + product.id + `)">Add to cart</a>
    //                                     </div>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     `
        //                 document.getElementById('test').innerHTML = products;
        //             });
        //         },
        //         error: function() {
        //             console.log('An error occurred .');
        //         }
        //     })
        // }

        // document.querySelector('body').onload = test();
        // document.querySelector('body').onload = cardCount();

        // function cardCount() {
        //     var cartCount = {{ count((array) session('cart')) }};
        //     // if (cartCount == 0) {
        //     //     var a = 0;
        //     // } else {
        //     //     var a = cardCount;
        //     // }

        //     document.getElementById('cardCount').innerHTML = cardCount;
        //     console.log(cardCount)
        // }
    </script>
@endsection
