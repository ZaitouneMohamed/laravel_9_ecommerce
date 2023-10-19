@extends('admin.master.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Branch</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.branch.update', $branch->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                        value="{{ $branch->name }}" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">charge delivery</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="charge_delivery"
                        value="{{ $branch->charge_delivery }}" placeholder="Enter attitude">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
