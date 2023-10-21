@extends('electro.layouts.master')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Contact</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="home.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <br><br>
    <div class="container">
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
                                <img id="selectedImage"
                                    @if (Auth::user()->image) src="{{ asset('images/profiles') }}/{{ Auth::user()->image->url }}"
                                    @else
                                        src="https://veryfrais.com/public/assets/front/images/user.png" @endif
                                    class="card-img" alt=""
                                    style="width: 80px;border-radius: 50%;border: 3px solid white">
                                <input type="file" name="image" class="form-controle" id="imageInput">
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
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <h5 class="card-title">{{ $item->phone_number }}</h5>
                                    <h5 class="card-title">{{ $item->city }}</h5>
                                    <p class="card-text">{{ $item->adresse }}</p>
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
                                <option value="Agadir">Agadir</option>
                                <option value="Al Hoceima">Al Hoceima</option>
                                <option value="Azilal">Azilal</option>
                                <option value="Beni Mellal">Beni Mellal</option>
                                <option value="Ben Slimane">Ben Slimane</option>
                                <option value="Boulemane">Boulemane</option>
                                <option value="Casablanca">Casablanca</option>
                                <option value="Chaouen">Chaouen</option>
                                <option value="El Jadida">El Jadida</option>
                                <option value="El Kelaa des Sraghna">El Kelaa des Sraghna</option>
                                <option value="Er Rachidia">Er Rachidia</option>
                                <option value="Essaouira">Essaouira</option>
                                <option value="Fes">Fes</option>
                                <option value="Figuig">Figuig</option>
                                <option value="Guelmim">Guelmim</option>
                                <option value="Ifrane">Ifrane</option>
                                <option value="Kenitra">Kenitra</option>
                                <option value="Khemisset">Khemisset</option>
                                <option value="Khenifra">Khenifra</option>
                                <option value="Khouribga">Khouribga</option>
                                <option value="Laayoune">Laayoune</option>
                                <option value="Larache">Larache</option>
                                <option value="Marrakech">Marrakech</option>
                                <option value="Meknes">Meknes</option>
                                <option value="Nador">Nador</option>
                                <option value="Ouarzazate">Ouarzazate</option>
                                <option value="Oujda">Oujda</option>
                                <option value="Rabat-Sale">Rabat-Sale</option>
                                <option value="Safi">Safi</option>
                                <option value="Settat">Settat</option>
                                <option value="Sidi Kacem">Sidi Kacem</option>
                                <option value="Tangier">Tangier</option>
                                <option value="Tan-Tan">Tan-Tan</option>
                                <option value="Taounate">Taounate</option>
                                <option value="Taroudannt">Taroudannt</option>
                                <option value="Tata">Tata</option>
                                <option value="Taza">Taza</option>
                                <option value="Tetouan">Tetouan</option>
                                <option value="Tiznit">Tiznit</option>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const selectedImage = document.getElementById('selectedImage');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    selectedImage.src = reader.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection
