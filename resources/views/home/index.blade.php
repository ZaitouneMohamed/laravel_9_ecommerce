@extends('home.master.master')

@section('content')
    <div class="col-12">
        <!-- Main Content -->
        <main class="row">

            <!-- Slider -->
            <div class="col-12 px-0">
                <div id="slider" class="carousel slide w-100" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                        <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src=" {{ asset('assets/landing/images/slider-1.jpg') }} " class="slider-img">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/landing/images/slider-2.jpg') }}" class="slider-img">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/landing/images/slider-3.jpg') }}" class="slider-img">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Slider -->

            <!-- Featured Products -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Featured Products</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (\App\Models\Product::where("prenium",1)->take(4)->get() as $item)
                                <!-- Product -->
                                <div class="col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a href="#">
                                                    <img src="{{ asset('assets/landing/images/image-4.jpg') }}"
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="product.html"
                                                    class="product-name">{{ Str::limit($item->title, 20, '') }}</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="product-price-old">
                                                    {{ $item->old_price }}
                                                </span>
                                                <br>
                                                <span class="product-price">
                                                    {{ $item->price }}
                                                </span>
                                            </div>
                                            <div class="col-12 mb-3 align-self-end">
                                                <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method("post")
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <input type="hidden" value="{{ $item->title }}" name="name">
                                                    <input type="hidden" value="{{ $item->price }}" name="price">
                                                    <input type="hidden" value="{{ $item->image }}" name="image">
                                                    <input type="hidden" value="3" name="quantity">
                                                    <button class="btn btn-outline-dark"><i
                                                            class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Products -->

            <div class="col-12">
                <hr>
            </div>

            <!-- Latest Product -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Latest Products</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (\App\Models\Product::latest()->take(4)->get() as $item)    
                                <!-- Product -->
                                <div class="col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <span class="new">New</span>
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a href="#">
                                                    <img src="{{ asset('assets/landing/images/image-1.jpg') }}"
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="#" class="product-name">{{ Str::limit($item->title, 20, '') }}</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="product-price-old">
                                                    {{ $item->old_price }}
                                                </span>
                                                <br>
                                                <span class="product-price">
                                                    {{ $item->price }}
                                                </span>
                                            </div>
                                            <div class="col-12 mb-3 align-self-end">
                                                <button class="btn btn-outline-dark" type="button"><i
                                                        class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Products -->

            <div class="col-12">
                <hr>
            </div>

            <!-- Top Selling Products -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Top Selling Products</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (\App\Models\Product::orderBy("price",'asc')->take(4)->get() as $item)
                                <!-- Product -->
                                <div class="col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a href="#">
                                                    <img src="{{ asset('assets/landing/images/image-4.jpg') }}"
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="#" class="product-name">Dell Alienware Area 51</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <span class="product-price">
                                                    {{ $item->price }}
                                                </span>
                                            </div>
                                            <div class="col-12 mb-3 align-self-end">
                                                <button class="btn btn-outline-dark" type="button"><i
                                                        class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Selling Products -->

            <div class="col-12 py-3 bg-light d-sm-block d-none">
                <div class="row">
                    <div class="col-lg-3 col ms-auto large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Best Price
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-truck-moving"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Fast Delivery
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col me-auto large-holder">
                        <div class="row">
                            <div class="col-auto ms-auto large-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="col-auto me-auto large-text">
                                Genuine Products
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content -->
    </div>
@endsection
