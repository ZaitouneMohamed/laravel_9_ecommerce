@extends('electro.layouts.master')

@section('contentt')
    @php
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $after_tomorrow = date('Y-m-d', strtotime('+2 day'));
    @endphp
    <!-- Main Content -->

    <!-- Start Cart  -->
    @if (session('cart'))
        <div class="cart-box-main">
            <div class="container">
                <div class="alert alert-primary alert-dismissible fade show" id="success-message" style="display: none;"
                    role="alert">
                    qty updated successfly
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach (session('cart') as $id => $item)
                                        <tr rowId="{{ $id }}">
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid" width="50px" height="50px"
                                                        src="{{ $item['image'] }}" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="#">
                                                    {{ $item['title'] }}
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>
                                                    {{ $item['price'] }}
                                                </p>
                                            </td>
                                            <td class="quantity-box">
                                                {{ $item['quantity'] }}
                                            </td>
                                            <td class="total-pr">
                                                <p id="total{{ $id }}">
                                                    {{ $item['price'] * $item['quantity'] }}
                                                </p>
                                            </td>
                                        </tr>
                                        @php
                                            $total += $item['price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <a href="/" class="btn btn-primary"><i class="fa fa-angle-left"></i>
                                                Continue
                                                Shopping</a>
                                            <button class="btn btn-danger">Checkout</button>
                                        </td>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <form action="{{ route('add_new_order') }}" method="post">
                    @csrf
                    <!-- SECTION -->
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">

                                <div class="col-md-7">


                                    <div class="row my-5">
                                        <div class="col-lg-3 col-sm-12">
                                            <div class="order-box">
                                                <h3>Delivery Option</h3>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input delivery_option" type="radio"
                                                            value="delivery" name="delivery_option" id="flexRadioDefault1"
                                                            checked>
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
                                                            <input class="form-check-input" type="radio"
                                                                value="{{ $tomorrow }}" name="delivery_date"
                                                                id="date2" checked>
                                                            <label class="form-check-label" for="date2">
                                                                Tommorow
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                value="{{ $after_tomorrow }}" name="delivery_date"
                                                                id="date3">
                                                            <label class="form-check-label" for="date3">
                                                                2023-05-18
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 alert fade show border">
                                                        @foreach (\App\Models\TimeSlot::where('active', 1)->get() as $item)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="{{ $item->FullTime }}" name="delivery_time"
                                                                    id="time_slot_1" checked>
                                                                <label class="form-check-label" for="time_slot_1">
                                                                    {{ $item->FullTime }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-5">
                                        <div class="col-lg-3 col-sm-12">
                                            <div class="order-box">
                                                <h3>Branch</h3>
                                                @foreach (\App\Models\Branch::all() as $item)
                                                    <div class="form-check">
                                                        <input class="form-check-input delivery_option" type="radio"
                                                            value="{{ $item->name }}" name="branch"
                                                            id="{{ $item->name }}"
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
                                                    <input class="form-check-input delivery_option" type="radio"
                                                        value="delivery" name="payement_methode" id="delivery" checked>
                                                    <label class="form-check-label" for="delivery">
                                                        Cash On Delivery
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input delivery_option" type="radio"
                                                        value="card" name="payement_methode" id="card">
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
                                                @auth
                                                    @if (Auth::user()->adresses->count() !== 0)
                                                        @foreach (\App\Models\Adresse::where('user_id', auth()->user()->id)->get() as $item)
                                                            <div class="form-check">
                                                                <input class="form-check-input delivery_option" type="radio"
                                                                    value="{{ $item->adresse }}" name="adresse"
                                                                    id="{{ $item->id }}"
                                                                    @if ($loop->first) checked @endif>
                                                                <label class="form-check-label" for="{{ $item->id }}">
                                                                    {{ $item->adresse }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add New
                                                            Adresse</button>
                                                    @else
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add New
                                                            Adresse</button>
                                                    @endif
                                                @endauth
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Order notes -->
                                    <div class="order-notes">
                                        <textarea class="input" placeholder="Order Notes"></textarea>
                                    </div>
                                    <!-- /Order notes -->
                                </div>

                                <!-- Order Details -->
                                <livewire:user.cart.order-summuary />
                                <!-- /Order Details -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->
                </form>
            </div>
        @else
            <h1 class="text text-center">your card is empty</h1>
    @endif
    <!-- End Cart -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Adresse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.createadresse') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            {{-- <label for="recipient-name" class="form-label">type :</label> --}}
                            <select class="form-select" name="type">
                                <option selected>shose a type</option>
                                <option value="Home">Home</option>
                                <option value="office">office</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="name">
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"
                                placeholder="phone number">
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <select class="form-select" name="city">
                                <option selected>shose a type</option>
                                <option value="Agadir">Agadir</option>
                                <option value="Al Hoceima">Al Hoceima</option>
                                <option value="Azilal">Azilal</option>
                                <option value="Beni Mellal">Beni Mellal</option>
                                <option value="Ben Slimane">Ben Slimane</option>
                                <option value="Boulemane">Boulemane</option>
                                <option value="Casablanca">Casablanca</option>
                                <option value="Chaouen">Chaouen</option>
                                <option value="El Jadida">El Jadida</option>
                                <option value="El Kelaa des Sraghna">El Kelaa des Sraghna</option>
                                <option value="Er Rachidia">Er Rachidia</option>
                                <option value="Essaouira">Essaouira</option>
                                <option value="Fes">Fes</option>
                                <option value="Figuig">Figuig</option>
                                <option value="Guelmim">Guelmim</option>
                                <option value="Ifrane">Ifrane</option>
                                <option value="Kenitra">Kenitra</option>
                                <option value="Khemisset">Khemisset</option>
                                <option value="Khenifra">Khenifra</option>
                                <option value="Khouribga">Khouribga</option>
                                <option value="Laayoune">Laayoune</option>
                                <option value="Larache">Larache</option>
                                <option value="Marrakech">Marrakech</option>
                                <option value="Meknes">Meknes</option>
                                <option value="Nador">Nador</option>
                                <option value="Ouarzazate">Ouarzazate</option>
                                <option value="Oujda">Oujda</option>
                                <option value="Rabat-Sale">Rabat-Sale</option>
                                <option value="Safi">Safi</option>
                                <option value="Settat">Settat</option>
                                <option value="Sidi Kacem">Sidi Kacem</option>
                                <option value="Tangier">Tangier</option>
                                <option value="Tan-Tan">Tan-Tan</option>
                                <option value="Taounate">Taounate</option>
                                <option value="Taroudannt">Taroudannt</option>
                                <option value="Tata">Tata</option>
                                <option value="Taza">Taza</option>
                                <option value="Tetouan">Tetouan</option>
                                <option value="Tiznit">Tiznit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <textarea class="form-control" name="adresse" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Checkout</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="home.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="checkout.html">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Checkout-Page -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-checkout u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form action="{{route('add_new_order')}}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="group-inline u-s-m-b-13">
                                            <h4 class="section-h4">Delivery Time</h4>
                                            <div class="order-table">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="u-s-m-b-13">
                                                            <input type="radio" class="radio-box" name="delivery_date"
                                                                value="{{ now() }}" id="delivery_date_today"
                                                                checked>
                                                            <label class="label-text"
                                                                for="delivery_date_today">Today</label>
                                                        </div>
                                                        <div class="u-s-m-b-13">
                                                            <input type="radio" class="radio-box" name="delivery_date"
                                                                id="delivery_date_tomorrow">
                                                            <label class="label-text"
                                                                for="delivery_date_tomorrow">{{ $tomorrow }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h4 class="section-h4">Delivery Time</h4>
                                                        @foreach (\App\Models\TimeSlot::all() as $item)
                                                            <div class="u-s-m-b-13">
                                                                <input type="radio" class="radio-box"
                                                                    name="delivery_time" value="{{ $item->FullTime }}"
                                                                    id="delivery_time{{ $item->id }}" checked>
                                                                <label class="label-text"
                                                                    for="delivery_time{{ $item->id }}">{{ $item->FullTime }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="group-inline u-s-m-b-13">
                                            <h4 class="section-h4">Adresse</h4>
                                            @auth
                                                @if (Auth::user()->adresses->count() > 0)
                                                    <div class="order-table">
                                                        @foreach (Auth::user()->adresses as $item)
                                                            <div class="u-s-m-b-13">
                                                                <input type="radio" class="radio-box" name="adresse"
                                                                    id="cash-on-delivery">
                                                                <label class="label-text"
                                                                    for="cash-on-delivery">{{ $item->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        Please Add Adresse
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('user.createadresse') }}" method="POST">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            New Adresse</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        @method('post')
                                                                        <div class="mb-3">
                                                                            {{-- <label for="recipient-name" class="form-label">type :</label> --}}
                                                                            <select class="form-select" name="type">
                                                                                <option selected>shose a type</option>
                                                                                <option value="Home">Home</option>
                                                                                <option value="office">office</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                                                                            <input type="text" name="name"
                                                                                class="form-control"
                                                                                id="exampleFormControlInput1"
                                                                                placeholder="name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                                                                            <input type="text" name="phone"
                                                                                class="form-control"
                                                                                id="exampleFormControlInput1"
                                                                                placeholder="phone number">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                                                                            <select class="form-select" name="city">
                                                                                <option selected>shose a type</option>
                                                                                <option value="Agadir">Agadir</option>
                                                                                <option value="Al Hoceima">Al Hoceima</option>
                                                                                <option value="Azilal">Azilal</option>
                                                                                <option value="Beni Mellal">Beni Mellal
                                                                                </option>
                                                                                <option value="Ben Slimane">Ben Slimane
                                                                                </option>
                                                                                <option value="Boulemane">Boulemane</option>
                                                                                <option value="Casablanca">Casablanca</option>
                                                                                <option value="Chaouen">Chaouen</option>
                                                                                <option value="El Jadida">El Jadida</option>
                                                                                <option value="El Kelaa des Sraghna">El Kelaa
                                                                                    des Sraghna</option>
                                                                                <option value="Er Rachidia">Er Rachidia
                                                                                </option>
                                                                                <option value="Essaouira">Essaouira</option>
                                                                                <option value="Fes">Fes</option>
                                                                                <option value="Figuig">Figuig</option>
                                                                                <option value="Guelmim">Guelmim</option>
                                                                                <option value="Ifrane">Ifrane</option>
                                                                                <option value="Kenitra">Kenitra</option>
                                                                                <option value="Khemisset">Khemisset</option>
                                                                                <option value="Khenifra">Khenifra</option>
                                                                                <option value="Khouribga">Khouribga</option>
                                                                                <option value="Laayoune">Laayoune</option>
                                                                                <option value="Larache">Larache</option>
                                                                                <option value="Marrakech">Marrakech</option>
                                                                                <option value="Meknes">Meknes</option>
                                                                                <option value="Nador">Nador</option>
                                                                                <option value="Ouarzazate">Ouarzazate</option>
                                                                                <option value="Oujda">Oujda</option>
                                                                                <option value="Rabat-Sale">Rabat-Sale</option>
                                                                                <option value="Safi">Safi</option>
                                                                                <option value="Settat">Settat</option>
                                                                                <option value="Sidi Kacem">Sidi Kacem</option>
                                                                                <option value="Tangier">Tangier</option>
                                                                                <option value="Tan-Tan">Tan-Tan</option>
                                                                                <option value="Taounate">Taounate</option>
                                                                                <option value="Taroudannt">Taroudannt</option>
                                                                                <option value="Tata">Tata</option>
                                                                                <option value="Taza">Taza</option>
                                                                                <option value="Tetouan">Tetouan</option>
                                                                                <option value="Tiznit">Tiznit</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                                                                            <textarea class="form-control" name="adresse" id="message-text"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Send
                                                                            message</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="group-inline u-s-m-b-13">
                                            <h4 class="section-h4">Payement Method</h4>
                                            <div class="order-table">
                                                    <div class="u-s-m-b-13">
                                                        <input type="radio" class="radio-box" name="payement_methode"
                                                            value="livraison" id="livraison" checked >
                                                        <label class="label-text"
                                                            for="livraison">A LA LIVRAISON</label>
                                                    </div>
                                                    <div class="u-s-m-b-13">
                                                        <input type="radio" class="radio-box" name="payement_methode"
                                                            value="cart" id="cart" >
                                                        <label class="label-text"
                                                            for="cart">CART</label>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="group-inline u-s-m-b-13">
                                            <h4 class="section-h4">Branch</h4>
                                            <div class="order-table">
                                                @foreach ($branches as $item)
                                                    <div class="u-s-m-b-13">
                                                        <input type="radio" class="radio-box" name="branch"
                                                            value="{{ $item->id }}" id="{{ $item->id }}"
                                                            @if ($loop->first) checked @endif>
                                                        <label class="label-text"
                                                            for="{{ $item->id }}">{{ $item->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form-Fields -->
                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">
                                <h4 class="section-h4">Your Order</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $item)
                                                    @php $total += $item['quantity'] * $item['price']  @endphp
                                                    <tr>
                                                        <td>
                                                            <h6 class="order-h6">{{ $item['title'] }}</h6>
                                                            <span class="order-span-quantity">x
                                                                {{ $item['quantity'] }}</span>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">${{ $item['quantity'] * $item['price'] }}
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">${{ $total }}</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">delivery price</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">$30</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">${{ $total + 30 }}</h3>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <button type="submit" class="button button-outline-secondary">Place Order</button>
                                </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection
