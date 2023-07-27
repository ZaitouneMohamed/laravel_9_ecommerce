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
                @foreach (\App\Models\Categorie::latest()->take(3)->get() as $item)
                    <!-- Single Catagory -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
                            style="background-image: url({{ asset('images/categories') }}/{{$item->image}});">
                            <div class="catagory-content">
                                <a href="#">{{ $item->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->


    <!-- ##### New Arrivals Area Start ##### -->
    <livewire:user.products.latest />
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
