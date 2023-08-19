@extends('electro.layouts.master')

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
    @if (session('cart'))

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
        </div>
    @else
        <h1 class="text text-center">your card is empty</h1>
    @endif
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
