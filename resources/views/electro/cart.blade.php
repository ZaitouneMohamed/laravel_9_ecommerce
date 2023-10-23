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
                        <a href="/">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="/cart">Cart</a>
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
                    @if (session('cart'))
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
                                <tbody id="cart_body">
                                </tbody>
                            </table>
                        </div>
                        <!-- Products-List-Wrapper /- -->
                        <!-- Coupon -->
                        <div class="coupon-continue-checkout u-s-m-b-60">
                            <div class="coupon-area">
                                <h6>Enter your coupon code if you have one. <span style="color: red">(NOT WORKING NOW)</span> </h6>
                                <div class="coupon-field">
                                    <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                    <input id="coupon-code" type="text" class="text-field" placeholder="Coupon Code">
                                    <button type="submit" class="button">Apply Coupon</button>
                                </div>
                            </div>
                            <div class="button-area">
                                <a href="shop-v1-root-category.html" class="continue">Continue Shopping</a>
                                <a href="{{ route('cart.checkout') }}" class="checkout">Proceed to Checkout</a>
                            </div>
                        </div>
                        <!-- Coupon /- -->
                        <!-- Billing -->
                        <div class="calculation u-s-m-b-60">
                            <div class="table-wrapper-2">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">Cart Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>
                                            </td>
                                            <td>
                                                <span class="calc-text total" id="total_in_cart"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">Delivery Frais</h3>
                                            </td>
                                            <td>
                                                <span class="calc-text">MAD 30.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="calc-h3 u-s-m-b-0">Total</h3>
                                            </td>
                                            <td>
                                                <span class="calc-text sub_total" id="sub_total"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Billing /- -->
                    @else
                        <h1 class="text text-center">Your Cart Is Empty</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/electro/vendor/ion-rangeslider/css/ion.rangeSlider.css') }}" />
@endsection

@section('scripts')
    <script>
        function DeleteProductFromCard(id) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('cart.remove.item') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    MyFunctions();
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
                    Toast.fire({
                        icon: 'success',
                        title: 'product deleted successfully'
                    })
                    if (response === "empty") {
                        location.reload();
                    }
                },
                error: function() {
                    console.log('An error occurred.');
                }
            });
        }
        getCartContentt();

        function getCartContentt() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getCartContent') }}",
                success: function(response) {
                    cart_content = "";
                    if (response.length > 0) {
                        response.forEach(function(item) {
                            total = item.price * item.quantity
                            cart_content +=
                                `
                            <tr class="delete-product">
                                            <td>
                                                <div class="cart-anchor-image">
                                                    <a href="single-product.html">
                                                        <img src="` + item.image + `" alt="Product">
                                                        <h6>` + item.title + `</h6>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-price" id="prix">
                                                    ` + item.price + `
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-quantity">
                                                    <div class="quantity">
                                                        <input type="text" class="quantity-text-field"
                                                            id="` + item.id + `" value="` + item.quantity +
                                `" onchange="edit(` + item.id + `)"
                                                            >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-total">
                                                    <span>
                                                        ` + item.price * item.quantity + `
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-wrapper">
                                                    <button class="button button-outline-secondary fas fa-sync"></button>
                                                    <button class="button button-outline-secondary fas fa-trash"
                                                        onclick="DeleteItem(` + item.id + `)"></button>
                                                </div>
                                            </td>
                                        </tr>
                            `
                        })
                    }
                    document.getElementById('cart_body').innerHTML = cart_content;
                    document.getElementById('total_in_cart').innerHTML = total;
                    document.getElementById('sub_total').innerHTML = total + 30;
                },
                error: function() {
                    console.log('An error occurred.');
                }
            })
        }

        function edit(id) {
            var quantity = document.getElementById(id).value;
            if (quantity <= 0) {
                quantity == 1
            }
            $.ajax({
                type: 'PATCH',
                url: "{{ route('updateCart') }}",
                data: {
                    id: id,
                    quantity: quantity
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    getCartContentt();
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
                    Toast.fire({
                        icon: 'success',
                        title: 'product updated successfully'
                    })
                },
                error: function() {
                    console.log('An error occurred.');
                }
            });
        }

        function DeleteItem(id) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('deleteProduct') }}",
                data: {
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    getCartContentt();
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
                    Toast.fire({
                        icon: 'success',
                        title: 'product deleted successfully'
                    })
                    if (response === "empty") {
                        location.reload();
                    }
                },
                error: function() {
                    console.log('An error occurred.');
                }
            });
        }
    </script>
@endsection
