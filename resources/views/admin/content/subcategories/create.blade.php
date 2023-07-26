@extends('admin.master.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Sub Categorie</h3>
        </div>
        <form method="POST" action="{{ route('admin.SubCategories.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                        placeholder="Enter name">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleSelectBorder">Select Categorie</label>
                        <select class="form-select" name="categorie" id="exampleSelectBorder">
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
