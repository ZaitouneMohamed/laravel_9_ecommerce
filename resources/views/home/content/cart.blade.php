@extends('home.master.master')

@section('content')
    {{-- <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Shopping Cart</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-12 bg-white py-3 mb-3">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                        <form class="row">
                            <div class="col-12">
                                <table class="table table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>
                                                    <img src="images/image-2.jpg" class="img-fluid">
                                                    {{ Str::limit($item->name, 10, '...') }}
                                                </td>
                                                <td>
                                                    {{ $item->price }}
                                                </td>
                                                <td>
                                                    <input type="number" min="1" value="{{ $item->quantity }}">
                                                </td>
                                                <td>
                                                    {{ $item->price * $item->quantity }}
                                                </td>
                                                @if ($loop->first)
                                                    <td>
                                                        <form action="{{ route('cart.remove.item') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $item->id }}"
                                                                name="id">
                                                            <button class="btn btn-link text-danger"><i
                                                                    class="fas fa-times"></i></button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('cart.remove.item') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $item->id }}"
                                                                name="id">
                                                            <button class="btn btn-link text-danger"><i
                                                                    class="fas fa-times"></i></button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Total</th>
                                            <th>${{ Cart::getTotal() }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-outline-secondary me-3" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 py-3 mb-3">
                <div class="account-card">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="account-title">
                                <h4>delivery option</h4>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-12 alert fade show">
                                        <div class="form-check">
                                            <input class="form-check-input delivery_option" type="radio" value="delivery"
                                                name="delivery_option" id="flexRadioDefault1" checked="">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Delivery (<span id="d_char">30</span> <span>
                                                    MAD</span>)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="account-title">
                                <h4>preference time</h4>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2023-05-15"
                                                name="delivery_date" id="date2">
                                            <label class="form-check-label" for="date2">
                                                Tommorow
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2023-05-16"
                                                name="delivery_date" id="date3">
                                            <label class="form-check-label" for="date3">
                                                2023-05-16
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 alert fade show border">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1"
                                                name="time_slot_id" id="time_slot_1" checked="">
                                            <label class="form-check-label" for="time_slot_1">
                                                4:00 pm -
                                                8:00 pm
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2"
                                                name="time_slot_id" id="time_slot_2" checked="">
                                            <label class="form-check-label" for="time_slot_2">
                                                2:00 pm -
                                                4:00 pm
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="3"
                                                name="time_slot_id" id="time_slot_3" checked="">
                                            <label class="form-check-label" for="time_slot_3">
                                                11:00 am -
                                                12:30 pm
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="account-title">
                                <h4>total amount</h4>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="checkout-charge mt-3">
                                        <ul>
                                            <li><span>Items Price:- </span><span class="float-end"><span
                                                        id="items_price">{{ Cart::getTotal() }}</span>
                                                    MAD</span>
                                            </li>
                                            <input type="hidden" value="54.9" name="items_price">

                                            <li><span>VAT/tax:- </span><span class="float-end">(+) <span id="tax">0
                                                    </span>
                                                    MAD</span>
                                            </li>
                                            <input type="hidden" value="0" name="tax">

                                            <li class="border-top"><b><span>Sub Total:- </span><span
                                                        class="float-end"><span id="subtotal">{{ Cart::getTotal() }} </span>
                                                        MAD</span></b>
                                            </li>
                                            <input type="hidden" value="54.9" name="subtotal">

                                            <li><span>Discount:- </span><span class="float-end">(-) <span
                                                        id="discount">0</span>
                                                    MAD</span>
                                            </li>
                                            <input type="hidden" value="0" name="discount">

                                            <li><span>Coupon Discount:- </span><span class="float-end">(-)
                                                    <span id="coupon_discount">0</span>
                                                    MAD</span>
                                            </li>
                                            <input type="hidden" value="0" name="coupon_discount">

                                            <li><span>Delivery Fee:- </span><span class="float-end">(+) <span
                                                        id="delivery_fee">30
                                                    </span>
                                                    MAD</span>
                                            </li>
                                            <input type="hidden" value="30" name="delivery_fee">

                                            <li class="border-top text-primary"><span>Total:- </span><span
                                                    class="float-end"><span id="total">{{ Cart::getTotal() + 30 }} </span>
                                                    MAD</span>
                                            </li>
                                            <input type="hidden" value="84.9" name="total">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 bg-white">
                <div class="account-card">
                    <div class="account-title">
                        <h4>select branch</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 alert fade show">
                                @foreach (\App\Models\Branch::all() as $item)    
                                    <div class="form-check">
                                        <input class="form-check-input select-branch" data-delivery="30"
                                            data-iframe="#branch-map-1" type="radio" value="1" name="branch"
                                            id="branch-1" @if ($loop->first) checked @endif>
                                        <label class="form-check-label" for="branch-1">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="address-section" class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>delivery address</h4>
                        <a data-bs-toggle="modal" data-bs-target="#address-add">add new address</a>

                    </div>
                    <div class="account-content">
                        <div class="row">
                            @foreach (\App\Models\Adresse::where('user_id', auth()->user()->id)->get() as $item)
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <label class="d-block" for="address-80">
                                        <div class="profile-card address  active ">
                                            <div class="form-check">
                                                <input class="form-check-input select-branch" id="address-80" type="radio"
                                                    value="80" name="address_id" @if ($loop->first) checked @endif >
                                            </div>
                                            <h6>{{ $item->name }}</h6>
                                            <h6>{{$item->phone_number}}</h6>
                                            <p>{{$item->type}}</p>
                                            <p>{{$item->city}}</p>
                                            <p> </p>

                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('add_new_order') }}" class="btn btn-outline-success">Checkout</a>

        </main> --}}

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
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
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
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item )
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('assets/landing/images/img-pro-01.jpg') }}" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ Str::limit($item->name, 10, '...') }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>
                                                {{ $item->price }}
                                            </p>
                                        </td>
                                        <td class="quantity-box"><input type="number" size="4" value="{{ $item->quantity }}"
                                                min="0" step="1" class="c-input-text qty text"></td>
                                        <td class="total-pr">
                                            <p>
                                                {{ $item->price * $item->quantity  }}
                                            </p>
                                        </td>
                                        <td class="remove-pr">
                                            <form action="{{ route('cart.remove.item') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <input type="hidden" value="{{ $item->id }}"
                                                    name="id">
                                                <button class="btn btn-link text-danger">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code"
                                type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> ${{ Cart::getTotal() }} </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 0 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 0 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 0 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ {{ Cart::getTotal() }} </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html"
                        class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
