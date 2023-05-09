@extends('admin.master.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categories : ({{ $categories->count() }})</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>old price</th>
                        <th>in Stock</th>
                        <th>Image</th>
                        <th>Sub categorie</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->slug }}</td>
                            <td> {{ Str::limit($item->description, 10, '...') }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->old_price }}</td>
                            <td>{{ $item->inStock }}</td>
                            <td> <img width="70px" height="50px" src="{{ $item->image }}" alt=""> </td>
                            <td>{{ $item->subcategorie->title }}</td>
                            <td>
                                <button class="btn btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                {{-- @if ($item->subcategories->count() == 0)
                                    <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                                @endif --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $categories->links() }}
        </div>
    </div>
@endsection