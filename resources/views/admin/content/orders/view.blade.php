@extends('admin.master.master')

@section('content')
    {{-- <h5 class="pb-1 mb-4">Text alignment</h5> --}}
    <div class="row mb-5 text-center">
        <div class="col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">order number : {{ $order->first()->order_number }}</h5>
                    <h5 class="card-title">total item : {{ $order->count('product') }}</h5>
                    <h5 class="card-title">order time : {{ $order->first()->created_at }}</h5>
                    <h5 class="card-title">delivery time : {{ $order->first()->delivery_date }}</h5>
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
                    <h5 class="card-title">Total : @php echo $total + 30; @endphp </h5>
                    <h5 class="cart-text">Payement Method : {{ $order->first()->payement_methode }} </h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Delivery Adresse</h5>
                    <h5 class="card-title">{{ $order->first()->adresse }}</h5>
                    {!! $order->first()->statue !!}
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Change statue</label>
                        <select id="defaultSelect" onchange="f1()" class="form-select">
                            <option>Default select</option>
                            <option value="confirmed">@php $statue = "confirmed"  @endphp<a
                                    href="{{ route('admin.ChangeStatue', ['statue', $order->first()->order_number]) }}">confirmed</a>
                            </option>
                            <option value="annuller">annuller</option>
                        </select>
                    </div>
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

@section('scripts')
    <script>
        function f1() {
            statue = document.getElementById('defaultSelect').value;
            order_number = {{ $order->first()->order_number }}
            link = "admin/ChangeStatue/" + statue +"/" + order_number
            window.location(link);
        }
    </script>
@endsection
