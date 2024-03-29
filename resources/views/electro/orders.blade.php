@extends('electro.layouts.master')

@section('content')
    {{-- <div class="container">
        <h1 class="text text-center">My Orders {{ Auth::user()->Orders->groupBy('order_number')->count() }}</h1>
        <div class="accordion" id="accordionExample">
            @foreach (Auth::user()->Orders->groupBy('order_number') as $item)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ $item->first()->id }}" aria-expanded="true" aria-controls="collapseOne">
                            Order Number {{ $item->first()->order_number }}
                        </button>
                    </h2>
                    <div id="{{ $item->first()->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="row">
                            <div class="col-lg-5">
                                <ul class="orderlist-details">
                                    <li>
                                        <h6>order id {{ $item->first()->order_number }} </h6>
                                    </li>
                                    <li>
                                        <h6>Total Item {{ $item->count('product') }} </h6>
                                    </li>
                                    <li>
                                        <h6>Order Time {{ $item->first()->created_at }} </h6>
                                    </li>
                                    <li>
                                        <h6>Delivery Time {{ $item->first()->delivery_time }}</h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="orderlist-details">
                                    <li>
                                        <h6>frais de livraison 30 MAD </h6>
                                    </li>
                                    <li>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($item as $order)
                                            @php
                                                $total += $order->qty * $order->product_price;
                                            @endphp
                                        @endforeach
                                        <h6>Total @php echo $total;
                                        @endphp</h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <ul class="orderlist-details">
                                    <li>
                                        <h6>Lieu de livraison </h6>
                                        <p>{{ $item->first()->adresse }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">product</th>
                                    <th scope="col">price</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">total</th>
                                    <th scope="col">statue</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->product }}</td>
                                        <td>{{ $order->product_price }}</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>{{ $order->qty * $order->product_price }}</td>
                                        <td>{!! $order->statue !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="" class="btn btn-success">download invoce</a>
                    </div>
            @endforeach
        </div>
    </div> --}}
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>My Orders</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="">my Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Wishlist-Page -->
    <div class="page-wishlist u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Products-List-Wrapper -->
                    <div class="table-wrapper u-s-m-b-60">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>QTY</th>
                                    <th>Stock Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>
                                            <div class="cart-anchor-image">
                                                <a href="single-product.html">
                                                    <h6>{{ $item->product }} </h6>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-price">
                                                MAD {{ $item->product_price }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-price">
                                                {{ $item->qty }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-stock">
                                                MAD {{ $item->total }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-wrapper">
                                                <button class="button button-outline-secondary fas fa-eye"></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Products-List-Wrapper /- -->
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist-Page /- -->
@endsection
