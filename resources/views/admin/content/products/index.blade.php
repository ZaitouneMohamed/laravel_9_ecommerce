@extends('admin.master.master')

@section('content')
    {{-- <livewire:admin.content.products-index />  --}}
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
        <div class="table-responsive text-nowrap">
            <table class="table ">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>old price</th>
                        <th>Image</th>
                        <th>Sub categorie</th>
                        <th>Prenium</th>
                        <th>active</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products)
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ Str::limit($item->title, 10, '...') }}</td>
                                <td>{{ Str::limit($item->slug, 10, '...') }}</td>
                                <td> {{ Str::limit($item->description, 10, '...') }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->old_price }}</td>
                                <td> {{ $item->images->count() }}</td>
                                <td>{{ $item->SubCategorie->name }}</td>
                                <td>
                                    @if ($item->prenium == 1)
                                        <button class="btn btn-success"
                                            wire:click="preniumToogle({{ $item->id }})">prenium</button>
                                    @else
                                        <button class="btn btn-danger" wire:click="preniumToogle({{ $item->id }})">not
                                            prenium</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->active == 1)
                                        <button class="btn btn-success"
                                            wire:click="activeToogle({{ $item->id }})">Active</button>
                                    @else
                                        <button class="btn btn-danger" wire:click="activeToogle({{ $item->id }})">not
                                            active</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                    {{-- @if ($item->subcategories->count() == 0)
                                        <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $products->links() }}
    </div>
    {{-- </div> --}}
@endsection
