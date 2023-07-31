@extends('home.master.master')

@section('content')
    <div class="container">
        <h1>Mon Profile</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Votre Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update.profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-3">
                            <div class="profile-image">
                                <img src="https://veryfrais.com/public/assets/front/images/user.png" class="card-img"
                                    alt="" style="width: 80px;border-radius: 50%;border: 3px solid white">
                                <input type="file" name="image" class="form-controle" id="">
                            </div>
                        </div>
                        <div class="col-3">
                            <input class="form-control" value="{{ Auth::user()->first_name }}" type="text"
                                name="first_name" id="">
                        </div>
                        <div class="col-3">
                            <input class="form-control" value="{{ Auth::user()->last_name }}" type="text"
                                name="last_name" id="">
                        </div>
                        <div class="col-3">
                            <input class="form-control" value="{{ Auth::user()->phone }}" type="text" name="phone"
                                id=""><br><br>
                            <input type="submit" value="Edite Profile"class="btn btn-success">
                        </div>
                        <div class="col-3">

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title">Adresse De Livraison</h4>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">Add New Adresse</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="account-content">
                    <div class="row">
                        @forelse  (Auth::user()->adresses as $item)
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card address  active ">
                                    <h6>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $item->name }}</font>
                                        </font>
                                    </h6>
                                    <h6>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $item->phone_number }}</font>
                                        </font>
                                    </h6>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $item->adresse }}</font>
                                        </font>
                                    </p>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{$item->city}}</font>
                                        </font>
                                    </p>
                                    <p> </p>
                                </div>
                            </div>
                        @empty
                            please add adresse
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Adresse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.createadresse') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            {{-- <label for="recipient-name" class="form-label">type :</label> --}}
                            <select class="form-select" name="type">
                                <option selected>shose a type</option>
                                <option value="Home">Home</option>
                                <option value="office">office</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="name">
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"
                                placeholder="phone number">
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <select class="form-select" name="city">
                                <option selected>shose a type</option>
                                <option value="Home">Home</option>
                                <option value="office">office</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="message-text" class="form-label">name:</label> --}}
                            <textarea class="form-control" name="adresse" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
