<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Product</h3>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title"
                    placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" id="" placeholder="Enter description" cols="30" name="description"
                    rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="price"
                    placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Old Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="old_price"
                    placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">image</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="image"
                    placeholder="Enter image">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleSelectBorder">Select Categorie</label>
                    <select class="custom-select form-control-border" wire:change="updateSubCategoriesOptions"
                        wire:model="categorie" id="exampleSelectBorder">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleSelectBorder">Select Categorie</label>
                    <select class="custom-select form-control-border" name="sub_categorie" id="exampleSelectBorder">
                        @if (isset($subcategories))
                            @foreach ($subcategories as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
