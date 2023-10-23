@extends('admin.master.master')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">My Profile</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.SetProfile')}}">
                            @csrf
                            @method("POST")
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">First Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" value="{{ Auth::user()->first_name }}"
                                    placeholder="First Name" name="first_name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Last Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->last_name }}"
                                    placeholder="Last Name" name="last_name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <input type="email" name="email" id="basic-default-email" class="form-control"
                                        placeholder="Email" aria-label="Email" value="{{ Auth::user()->email }}"
                                        aria-describedby="basic-default-email2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Phone No</label>
                                <input type="text" id="basic-default-phone" class="form-control phone-mask" value="{{ Auth::user()->phone }}"
                                    placeholder="658 799 8941" name="phone" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Password</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.updatePassword')}}">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Current Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="basic-icon-default-fullname" name="current_password"
                                        placeholder="Old Password" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-company" class="form-control" name="new_password"
                                        placeholder="New Password" aria-label="ACME Inc."
                                        aria-describedby="basic-icon-default-company2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-icon-default-email" class="form-control"
                                        placeholder="Confirmation" aria-label="john.doe" name="new_password_confirmation"
                                        aria-describedby="basic-icon-default-email2" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
