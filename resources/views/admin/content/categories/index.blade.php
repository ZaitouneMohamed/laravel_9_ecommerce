@extends('admin.master.master')

@section('content')
    <h1>Catagories List ({{ $categories->count() }}) </h1>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">add new categorie</a>
        </div>
        <div class="card-body">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>sub Categories</th>
                        <th>image</th>
                        <th style="width: 40px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                    <td> {{ $item->name, 10 }}</td>
                                    <td>{{ $item->subcategories->count() }}</td>
                                    <td> <img width="70px" height="50px"
                                            src="{{ $item->CategorieImage }}" alt=""> </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.categories.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Edit</a>
                                                <a class="dropdown-item"
                                                    onclick="document.getElementById({{ $item->id }}).submit();"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</a>
                                                <form id="{{ $item->id }}"
                                                    action="{{ route('admin.categories.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
