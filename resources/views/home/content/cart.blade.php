@extends('home.master.master')

@section('content')
    <div class="col-12">
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
                                                    {{ Str::limit($item->name, 10, '...')  }}
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
                                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                                            <button class="btn btn-link text-danger"><i
                                                                    class="fas fa-times"></i></button>
                                                        </form>
                                                    </td>
                                                @else
                                                    
                                                    <td>
                                                        <form action="{{ route('cart.remove.item') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $item->id }}" name="id">
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
                                <a href="#" class="btn btn-outline-success">Checkout</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>
@endsection
