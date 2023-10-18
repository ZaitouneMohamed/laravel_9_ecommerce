@extends('admin.master.master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                <div class="col-xl-12">
                    <h6 class="text-muted">{{ $product->title }}</h6>
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                    aria-selected="true">
                                    <i class="tf-icons bx bx-home"></i> INFO
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-justified-profile"
                                    aria-controls="navs-pills-justified-profile" aria-selected="false">
                                    <i class="fa fa-image" aria-hidden="true"></i> IMAGES
                                    <span
                                        class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{ $product->Images->count() }}</span>
                                </button>
                            </li>
                        </ul>
                        <form action="{{ route('admin.products.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            <div class="tab-content">
                                @csrf
                                @method('PUT')
                                <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">title</label>
                                                <input type="text" class="form-control @error('title') invalid @enderror"
                                                    id="defaultFormControlInput" value="{{ $product->title }}"
                                                    placeholder="John Doe" name="title"
                                                    aria-describedby="defaultFormControlHelp" />
                                                @error('title')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">description</label>
                                                <textarea class="form-control @error('description') invalid @enderror" id="exampleFormControlTextarea1"
                                                    name="description" rows="3">{{ $product->description }}</textarea>
                                                @error('description')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <label for="defaultFormControlInput" class="form-label">price</label>
                                                <input type="text" class="form-control @error('price') invalid @enderror"
                                                    id="defaultFormControlInput" value="{{ $product->price }}"
                                                    placeholder="John Doe" name="price"
                                                    aria-describedby="defaultFormControlHelp" />
                                                @error('price')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="defaultFormControlInput" class="form-label">old price</label>
                                            <input type="text" class="form-control @error('old_price') invalid @enderror"
                                                id="defaultFormControlInput" value="{{ $product->old_price }}"
                                                placeholder="John Doe" name="old_price"
                                                aria-describedby="defaultFormControlHelp" />
                                            @error('old_price')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div style="height: 50px"></div>
                                        <hr class="m-0">
                                        <div style="height: 50px"></div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleSelectBorder">Select Categorie</label>
                                                <select class="form-select" id="categorie" name="categorie_id">
                                                    <option value=""></option>
                                                    @foreach (\App\Models\Categorie::all() as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleSelectBorder">Select Sub Categorie</label>
                                                <select class="form-select" id="categorie" name="sub_categorie">
                                                    <option value=""></option>
                                                    @foreach (\App\Models\SubCategorie::all() as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id === $product->sub_categorie_id) selected @endif>
                                                            {{ $item->name }} </option>
                                                    @endforeach
                                                </select>
                                                @error('subcategorie_id')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success">update</button>
                                </div>
                                <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                                    @if ($product->Images->count() > 1)
                                        <h1 class="text text-center">click on any image to delete</h1>
                                    @endif
                                    @forelse ($product->Images as $item)
                                        @if ($product->Images->count() > 1)
                                            {{-- <a href="{{ route('admin.deleteimage', $item->id) }}"> --}}
                                        @endif
                                        <img src="{{ asset('images/products') }}/{{ $item->url }}" width="150px"
                                            alt="">
                                        @if ($product->Images->count() > 1)
                                            </a>
                                        @endif
                                    @empty
                                        <h5 class="text text-center">No Image Found For {{ $product->title }}</h5>
                                    @endforelse
                                    <br><br>
                                    <hr class="m-0">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">upload new images</label>
                                        <input type="file" class="form-control" accept="image/*" multiple
                                            name="images[]" placeholder="Enter image">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pills -->
    </div>
    <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection

@section('scripts')
    <script>
        document.getElementById('categorie').addEventListener('change', function() {
            var selectedCategorie = this.value;
            var selectedCategorie = this.value;
            var url = "{{ route('getSubCategories', ':id') }}";
            url = url.replace(':id', selectedCategorie);
            $.ajax({
                url: url,
                success: function(response) {
                    var subCategoriesHtml = '';
                    response.forEach(function(categorie) {
                        subCategoriesHtml += '<option value="' + categorie.id + '">' + categorie
                            .name +
                            '</option>';
                    });
                    document.getElementById('subcategorie').innerHTML = subCategoriesHtml;
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
