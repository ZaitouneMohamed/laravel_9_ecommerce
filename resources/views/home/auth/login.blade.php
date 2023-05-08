@extends('home.master.master')

@section('content')
    {{-- <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>login form</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('login_c')}}" method="POST">
                @csrf
                @method("post")
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <input type="email" name="email" value="user@user.com" placeholder="Your email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="password" placeholder="password" value="password" name="password">
                        <button type="submit" class="site-btn">login</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Login</h2>
            </div>
        </div>

        <main class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label ml-2">Remember Me</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-dark">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>
@endsection
