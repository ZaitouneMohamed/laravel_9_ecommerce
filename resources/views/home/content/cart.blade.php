@extends('home.master.master')

@section('content')
    @php
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $after_tomorrow = date('Y-m-d', strtotime('+2 day'));
    @endphp
    <!-- Main Content -->
    </div>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">card</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">

        {{-- @method("post") --}}
        <div class="container">
            <livewire:user.cart.index />
            <form action="{{ route('add_new_order') }}" method="post">
                @csrf
                <div class="row my-5">
                    <div class="col-lg-3 col-sm-12">
                        <div class="order-box">
                            <h3>Delivery Option</h3>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input class="form-check-input delivery_option" type="radio" value="delivery"
                                        name="delivery_option" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Delivery (<span id="d_char">30</span> <span>
                                            MAD</span>)
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $tomorrow }}"
                                            name="delivery_date" id="date2" checked>
                                        <label class="form-check-label" for="date2">
                                            Tommorow
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{ $after_tomorrow }}"
                                            name="delivery_date" id="date3">
                                        <label class="form-check-label" for="date3">
                                            2023-05-18
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 alert fade show border">
                                    @foreach (\App\Models\TimeSlot::where('active', 1)->get() as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="{{ $item->FullTime }}"
                                                name="delivery_time" id="time_slot_1" checked>
                                            <label class="form-check-label" for="time_slot_1">
                                                {{ $item->FullTime }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <livewire:user.cart.order-summuary />
                </div>
                <div class="row my-5">
                    <div class="col-lg-3 col-sm-12">
                        <div class="order-box">
                            <h3>Branch</h3>
                            @foreach (\App\Models\Branch::all() as $item)
                                <div class="form-check">
                                    <input class="form-check-input delivery_option" type="radio"
                                        value="{{ $item->name }}" name="branch" id="{{ $item->name }}"
                                        @if ($loop->first) checked @endif>
                                    <label class="form-check-label" for="{{ $item->name }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                            <hr>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-3 col-sm-12">
                        <div class="order-box">
                            <h3>Payement Methode</h3>
                            <div class="form-check">
                                <input class="form-check-input delivery_option" type="radio" value="delivery"
                                    name="payement_methode" id="delivery" checked>
                                <label class="form-check-label" for="delivery">
                                    Cash On Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input delivery_option" type="radio" value="card"
                                    name="payement_methode" id="card">
                                <label class="form-check-label" for="card">
                                    Cach By Card
                                </label>
                            </div>
                            <hr>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-3 col-sm-12">
                        <div class="order-box">
                            <h3>Adresse</h3>
                            @foreach (\App\Models\Adresse::where('user_id', auth()->user()->id)->get() as $item)
                                <div class="form-check">
                                    <input class="form-check-input delivery_option" type="radio"
                                        value="{{ $item->adresse }}" name="adresse" id="{{ $item->id }}"
                                        @if ($loop->first) checked @endif>
                                    <label class="form-check-label" for="{{ $item->id }}">
                                        {{ $item->adresse }}
                                    </label>
                                </div>
                            @endforeach
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><button class="ml-auto btn hvr-hover">Checkout</button>
                </div>
        </div>
        </form>
    </div>
    <!-- End Cart -->
@endsection
