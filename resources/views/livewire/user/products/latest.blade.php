{{-- <div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Latest Products {{$product_id}} </h1>
                </div>
            </div>
        </div>
        <div class="row special-list">
            @foreach ($this->Products as $item)
                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">New</p>
                            </div>
                            <img src="{{ asset('assets/landing/images/img-pro-02.jpg') }}" class="img-fluid"
                                alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <button class="cart" wire:click="AddToCard({{ $item->id }})">Add to Cart</button>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>{{ $item->title }}</h4>
                            <h5> ${{ $item->price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div> --}}



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
                    @foreach ($this->Products as $item)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('assets/landing/img/product-img/product-1.jpg') }}" alt="">
                                {{-- <img src="{{$item->image}}" alt=""> --}}
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ asset('assets/landing/img/product-img/product-2.jpg') }}"
                                    alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{ $item->subcategorie->categorie->name }}</span>
                                <a href="single-product-details.html">
                                    <h6>{{ Str::limit($item->title, 15, '...') }}</h6>
                                </a>
                                <p class="product-price">${{ $item->price }}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <button wire:click="AddToCard({{ $item->id }})" class="btn essence-btn">Add
                                            to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{route('ProductList')}}" class="btn essence-btn">
                <i class="fa fa-eye" ></i>
                SHOW MORE
            </a>
        </div>

    </div>
</section>
