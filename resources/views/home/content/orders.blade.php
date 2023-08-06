@extends('home.master.master')

@section('content')
    <div class="container">
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
                    </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
