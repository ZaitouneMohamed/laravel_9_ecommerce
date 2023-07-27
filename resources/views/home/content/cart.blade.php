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
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $item)
                                        <tr rowId="{{ $id }}">
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid"
                                                        src="{{ asset('assets/landing/images/img-pro-01.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="#">
                                                    {{ Str::limit($item['title'], 10, '...') }}
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>
                                                    {{ $item['price'] }}
                                                </p>
                                            </td>
                                            <td class="quantity-box">
                                                <input min="1" type="number" id="{{ $item['id'] }}"
                                                    value="{{ $item['quantity'] }}"
                                                    onblur="edit({{ $item['id'] }},{{ $item['price'] }})">
                                            </td>
                                            <td class="total-pr">
                                                <p id="total{{ $id }}">
                                                    {{ $item['price'] * $item['quantity'] }}
                                                </p>
                                            </td>
                                            <td class="remove-pr">
                                                <button class="btn btn-link text-danger delete-product">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $total += $item['price'] * $item['quantity'];
                                        @endphp
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right">
                                                <a href="/" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                                <button class="btn btn-danger">Checkout</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                @else
                                    <h1>your card is empty</h1>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <form
            {{-- action="{{ route('add_new_order') }}" --}}
            method="post">
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
                    <div class="col-lg-3 col-sm-12">
                        <div class="order-box">
                            <h3>Order summary</h3>
                            <div class="d-flex">
                                <h4>Total</h4>
                                <div class="ml-auto font-weight-bold"><span id="total"></span></div>
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
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5" id="grandtotal"> $  </div>
                            </div>
                            <hr>
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

@section('scripts')
    <script>
        function getCartCount() {
            total = document.getElementById('total');
            grandtotal = document.getElementById('grandtotal');
            $.ajax({
                type: 'get',
                url: "/getCartCount",
                success: function(response) {
                    var a = response.total
                    total.innerHTML = "$" + a;
                    grandtotal.innerHTML = "$" + response.subtotal;
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
        }

        // document.querySelector('body').onload =
        setInterval(() => {
            getCartCount();
        }, 500);

        function edit(id, price) {
            quantity = document.getElementById(id).value;
            $.ajax({
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity,
                },
                url: "/updateCart",
                success: function(response) {
                    $('#success-message').show();
                    $('#total' + id).text(quantity * price);
                    setTimeout(() => {
                        $('#success-message').hide();
                    }, 3000);
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
        }

        $(".delete-product").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('deleteProduct') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
