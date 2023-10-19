@extends('admin.master.master')

@section('content')
    <h1>Branch List ({{ $branches->count() }}) </h1>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.branch.create') }}" class="btn btn-success">add new branch</a>
        </div>
        <div class="card-body">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>charge delivery</th>
                        <th style="width: 40px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($branches)
                        @foreach ($branches as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td> {{ $item->name }}</td>
                                <td> {{ $item->charge_delivery }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.branch.edit', $item->id) }}" class="btn btn-warning"><i
                                            class="nav-icon fas fa-edit"></i></a>
                                    <form action="{{ route('admin.branch.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" style="margin-left: 8px"><i
                                                class="nav-icon fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{ $branches->links() }}
    </div>
@endsection
