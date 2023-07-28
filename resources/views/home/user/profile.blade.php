@extends('home.master.master')

@section('content')
    <div class="container">
        <h1>Mon Profile</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Votre Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update.profile') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-3">
                            <div class="profile-image">
                                <img src="https://veryfrais.com/public/assets/front/images/user.png" class="card-img"
                                    alt="" style="width: 80px;border-radius: 50%;border: 3px solid white">
                                <input type="file" name="" class="form-controle" id="">
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
                                id="">
                        </div>
                        <input type="submit" value="Edite Profile" style="margin-left: 990px" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Adresse De Livraison</h4>
            </div>
            <div class="card-body">
                <div class="account-content">
                    <div class="row">
                        @forelse  (Auth::user()->adresses as $item)
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card address  active ">
                                    <h6>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Mohammed</font>
                                        </font>
                                    </h6>
                                    <h6>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">0700260091</font>
                                        </font>
                                    </h6>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">maison</font>
                                        </font>
                                    </p>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">الدار البيضاءMA</font>
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
@endsection
