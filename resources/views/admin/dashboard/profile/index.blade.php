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
                <form action="{{ route('user.profile.store') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                        <div class="flex-1 mt-6 mt-xl-0">
                            <div class="grid columns-12 gap-x-5 gap-y-0">
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label mt-3">Display Name</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="username" class="form-label mt-3">Username</label>
                                        <input id="username" type="text" class="form-control" value="{{ old('username') }}" placeholder="Username"
                                            value="{{ auth()->user()->username }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="email" class="form-label mt-3">Email</label>
                                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->email }}">
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
