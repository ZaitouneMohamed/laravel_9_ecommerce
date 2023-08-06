@extends('admin.master.master')

@section('content')
    <h1>Orders List ({{ $orders->count() }}) </h1>
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-header">
            {{-- <a href="{{route('admin.Products.create')}}" class="card-title">add new Pro</a> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>OrdersNumber</th>
                        <th>delivery Date</th>
                        <th>Time Slot</th>
                        <th>Customare</th>
                        <th>Total</th>
                        <th>Order Status</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order_number }}</td>
                            <td>{{ $item->delivery_date }}</td>
                            <td>{{ $item->delivery_time }}</td>
                            <td>{{ $item->user->full_name }}</td>
                            <td>{{ $item->Total }} $</td>
                            <td>{!! $item->statue !!}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-gear" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('admin.ViewOrder',$item->order_number)}}">View</a></li>
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
