@extends('home.master.master')

@section('content')
    <div class="col-12">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12 mt-3 text-center text-uppercase">
                <h2>Join Now</h2>
                <span>Setup A New Account In A Minute</span>
            </div>
        </div>

        <main class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('register.function') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" name="first_name" placeholder="Enter First Name"
                                            id="name @error('first_name') is-invalid @enderror" class="form-control">
                                        @error('first_name')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" placeholder="Enter Last Name" id="name"
                                            class="form-control @error('last_name') is-invalid @enderror">
                                        @error('last_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" id="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Phone</label>
                                <input type="text" name="phone" placeholder="Enter Phone" id="email"
                                    class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter Password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password-confirm"
                                    placeholder="Repeat Password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="agree" class="form-check-input">
                                    <label for="agree" class="form-check-label ml-2">I agree to Terms and
                                        Conditions</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
        <!-- Main Content -->
    </div>
@endsection
