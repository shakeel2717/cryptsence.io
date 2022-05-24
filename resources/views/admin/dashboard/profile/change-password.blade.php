@extends('layout.dashboard')
@section('title')
    My Profile
@endsection
@section('content')
    <x-profile />
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                    Display Information
                </h2>
            </div>
            <div class="p-5">
                <form action="{{ route('user.profile.password.update') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                        <div class="flex-1 mt-6 mt-xl-0">
                            <div class="grid columns-12 gap-x-5 gap-y-0">
                                <div class="g-col-12 g-col-xxl-8">
                                    <div>
                                        <label for="cpassword" class="form-label mt-3">Current Password</label>
                                        <input id="cpassword" name="cpassword" type="password" class="form-control"
                                            placeholder="Type Current Password">
                                    </div>
                                </div>

                                <div class="g-col-12 g-col-xxl-8">
                                    <div>
                                        <label for="password" class="form-label mt-3">New Password</label>
                                        <input id="password" name="password" type="password" class="form-control"
                                            placeholder="Type New Password">
                                    </div>
                                </div>

                                <div class="g-col-12 g-col-xxl-8">
                                    <div>
                                        <label for="password_confirmation" class="form-label mt-3">Confirm New
                                            Password</label>
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                            class="form-control" placeholder="Type Password Confirmation">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
@endsection
