@extends('admin.master.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Categories : ({{ $categories->count() }})</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>sub Categories</th>
                        <th>image</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td> {{ Str::limit($item->name, 10, '...') }}</td>
                            <td>{{ $item->subcategories->count() }}</td>
                            <td> <img width="70px" height="50px" src="{{ $item->image }}" alt=""> </td>
                            <td>
                                <button class="btn btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                @if ($item->subcategories->count() == 0)
                                    <form action="{{ route('admin.categories.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                                    </form>
                                @endif
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
