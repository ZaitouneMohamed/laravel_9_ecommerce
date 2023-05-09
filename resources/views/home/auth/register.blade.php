@extends('home.master.master')

@section('content')
<div class="col-12">
    <!-- Main Content -->
    <div class="row">
        <div class="col-12 mt-3 text-center text-uppercase">
            <h2>Register</h2>
        </div>
    </div>

    <main class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('register.function')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="agree" class="form-check-input" required>
                                <label for="agree" class="form-check-label ml-2">I agree to Terms and Conditions</label>
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
