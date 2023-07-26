@extends('admin.master.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">update Categorie</h3>
        </div>
        <form method="POST" action="{{ route('admin.categories.update', $categorie->id) }}" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                        value="{{ $categorie->name }}" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
