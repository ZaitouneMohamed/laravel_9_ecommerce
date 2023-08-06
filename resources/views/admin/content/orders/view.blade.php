@extends('admin.master.master')

@section('content')
    {{-- <h5 class="pb-1 mb-4">Text alignment</h5> --}}
    <div class="row mb-5 text-center">
        <div class="col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">order number : {{ $order->first()->order_number }}</h5>
                    <p class="card-text">total item : {{ $order->count('product') }}</p>
                    <p class="card-text">order time : {{ $order->first()->created_at }}</p>
                    <p class="card-text">delivery time : {{ $order->first()->delivery_date }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">frais de livraison : 30 MAD</h5>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($order as $item)
                        @php
                            $total += $item->qty * $item->product_price;
                        @endphp
                    @endforeach
                    <p class="card-text">Total @phpecho $total + 30;
                    @endphp </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Delivery Adresse</h5>
                    <p class="card-text">{{ $order->first()->adresse }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <h1 class="card-header">
            Orders Number ({{ $order->first()->order_number }})
        </h1>
        <!-- /.card-header -->
        <div class="table-responsive text-nowrap">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>OrdersNumber</th>
                        <th>product</th>
                        <th>price</th>
                        <th>qty</th>
                        <th>Total</th>
                        <th>Order Status</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $item->order_number }}</td>
                            <td>{{ $item->product }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->qty * $item->product_price }} $</td>
                            <td>{!! $item->statue !!}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.ViewOrder', $item->order_number) }}">View</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer clearfix">
        {{ $products->links() }}
    </div> --}}
    </div>
@endsection
