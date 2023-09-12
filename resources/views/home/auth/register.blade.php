@extends('electro.layouts.master')

@section('contentt')
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
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Account</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">
            <div class="row text-center">
                <!-- Login -->
                <div class="login-wrapper">
                    <h2 class="account-h2 u-s-m-b-20">Register</h2>
                    <h6 class="account-h6 u-s-m-b-30">Registering for this site allows you to access your order status and
                        history.</h6>
                    <div class="m-b-45">
                        <a href="{{ route('google.redirect') }}" class="button button-outline-dark w-60"><i
                                class="fa-brands fa-google-plus-g"></i></a>
                    </div><br><br>
                    <form method="POST" action="{{ route('register.function') }}">
                        @csrf
                        <div class="u-s-m-b-30 row">
                            <div class="col-6">
                                <label for="user-name-email">First name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name-email" class="text-field" name="first_name"
                                    placeholder="First Name">
                                @error('first_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="user-name-email">last name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name-email" class="text-field" name="last_name"
                                    placeholder="Last Name">
                                @error('last_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="u-s-m-b-30">
                            <label for="login-password">Email
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="login-password" name="email" class="text-field"
                                placeholder="Email">
                            @error('email')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="login-password">phone
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="login-password" name="phone" class="text-field"
                                placeholder="Phone">
                            @error('email')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="login-password">Password
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="login-password" name="password" class="text-field"
                                placeholder="Password">
                            @error('password')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="login-password">Confirm Password
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="login-password" name="password_confirmation" class="text-field"
                                placeholder="Repeat Password">
                        </div>
                        <div class="group-inline u-s-m-b-30">
                            <div class="group-1">
                                <input type="checkbox" class="check-box" id="remember-me-token">
                                <label class="label-text" for="remember-me-token">Remember me</label>
                            </div>
                            <div class="group-2 text-right">
                                <div class="page-anchor">
                                    <a href="lost-password.html">
                                        <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost your password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-b-45">
                            <button class="button button-outline-secondary w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
