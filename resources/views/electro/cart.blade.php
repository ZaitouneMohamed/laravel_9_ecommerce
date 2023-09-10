@extends('electro.layouts.master')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="home.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="cart.html">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Products-List-Wrapper -->
                    <div class="table-wrapper u-s-m-b-60">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>total</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>@php $total = 0 @endphp
                                @foreach (session('cart') as $id => $item)
                                    @php
                                        $total += $item['price'] * $item['quantity'];
                                    @endphp
                                    <tr class="delete-product">
                                        <td>
                                            <div class="cart-anchor-image">
                                                <a href="single-product.html">
                                                    <img src="{{ $item['image'] }}" alt="Product">
                                                    <h6>{{ $item['title'] }}</h6>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-price" id="prix">
                                                ${{ $item['price'] }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-quantity">
                                                <div class="quantity">
                                                    <input type="text" class="quantity-text-field"
                                                        id="{{ $item['id'] }}" value="{{ $item['quantity'] }}"
                                                        oninput="edit({{ $item['id'] }})">
                                                    <a class="plus-a" data-max="1000">&#43;</a>
                                                    <a class="minus-a" data-min="1">&#45;</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-total">
                                                <span>
                                                    {{ $item['price'] * $item['quantity'] }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-wrapper">
                                                <button class="button button-outline-secondary fas fa-sync"></button>
                                                <button class="button button-outline-secondary fas fa-trash"
                                                    onclick="deleteProduct({{ $item['id'] }})"></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Products-List-Wrapper /- -->
                    <!-- Coupon -->
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6>Enter your coupon code if you have one.</h6>
                            <div class="coupon-field">
                                <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                <input id="coupon-code" type="text" class="text-field" placeholder="Coupon Code">
                                <button type="submit" class="button">Apply Coupon</button>
                            </div>
                        </div>
                        <div class="button-area">
                            <a href="shop-v1-root-category.html" class="continue">Continue Shopping</a>
                            <a href="checkout.html" class="checkout">Proceed to Checkout</a>
                        </div>
                    </div>
                    <!-- Coupon /- -->
                    <!-- Billing -->
                    <div class="calculation u-s-m-b-60">
                        <div class="table-wrapper-2">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Cart Totals</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>
                                        </td>
                                        <td>
                                            <span class="calc-text">$222.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 class="calc-h3 u-s-m-b-8">Shipping</h3>
                                            <div class="calc-choice-text u-s-m-b-4">Flat Rate: Not Available</div>
                                            <div class="calc-choice-text u-s-m-b-4">Free Shipping: Not Available</div>
                                            <a data-toggle="collapse" href="#shipping-calculation"
                                                class="calc-anchor u-s-m-b-4">Calculate Shipping
                                            </a>
                                            <div class="collapse" id="shipping-calculation">
                                                <form>
                                                    <div class="select-country-wrapper u-s-m-b-8">
                                                        <div class="select-box-wrapper">
                                                            <label class="sr-only" for="select-country">Choose your country
                                                            </label>
                                                            <select class="select-box" id="select-country">
                                                                <option selected="selected" value="">Choose your
                                                                    country...
                                                                </option>
                                                                <option value="">United Kingdom (UK)</option>
                                                                <option value="">United States (US)</option>
                                                                <option value="">United Arab Emirates (UAE)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="select-state-wrapper u-s-m-b-8">
                                                        <div class="select-box-wrapper">
                                                            <label class="sr-only" for="select-state">Choose your state
                                                            </label>
                                                            <select class="select-box" id="select-state">
                                                                <option selected="selected" value="">Choose your
                                                                    state...
                                                                </option>
                                                                <option value="">Alabama</option>
                                                                <option value="">Alaska</option>
                                                                <option value="">Arizona</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="town-city-div u-s-m-b-8">
                                                        <label class="sr-only" for="town-city"></label>
                                                        <input type="text" id="town-city" class="text-field"
                                                            placeholder="Town / City">
                                                    </div>
                                                    <div class="postal-code-div u-s-m-b-8">
                                                        <label class="sr-only" for="postal-code"></label>
                                                        <input type="text" id="postal-code" class="text-field"
                                                            placeholder="Postcode / Zip">
                                                    </div>
                                                    <div class="update-totals-div u-s-m-b-8">
                                                        <button class="button button-outline-platinum">Update
                                                            Totals</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">Tax</h3>
                                            <span> (estimated for your country)</span>
                                        </td>
                                        <td>
                                            <span class="calc-text">$0.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 class="calc-h3 u-s-m-b-0">Total</h3>
                                        </td>
                                        <td>
                                            <span class="calc-text">$220.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Billing /- -->
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection

@section('scripts')
    <script>
        // function getCartCount() {
        //     total = document.getElementById('total');
        //     grandtotal = document.getElementById('grandtotal');
        //     $.ajax({
        //         type: 'get',
        //         url: "/getCartCount",
        //         success: function(response) {
        //             var a = response.total
        //             total.innerHTML = "$" + a;
        //             grandtotal.innerHTML = "$" + response.subtotal;
        //             Toast.fire({
        //                 icon: 'success',
        //                 title: 'product added successfully'
        //             })
        //         },
        //         error: function() {
        //             console.log('An error occurred .');
        //         }
        //     })
        // }
        setInterval(() => {
            // getCartCount();
        }, 500);

        function edit(id, price) {
            quantity = document.getElementById(id).value;
            prix = document.getElementById('prix' + id);
            $.ajax({
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity,
                },
                url: "/updateCart",
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                },
                error: function() {
                    console.log('An error occurred .');
                }
            })
        }

        function deleteProduct(id) {
            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('deleteProduct') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        }
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/electro/vendor/ion-rangeslider/css/ion.rangeSlider.css') }}" />
@endsection
