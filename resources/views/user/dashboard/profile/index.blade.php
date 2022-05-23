@extends('layout.dashboard')
@section('title')
    My Profile
@endsection
@section('content')
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="d-flex flex-column flex-lg-row border-bottom border-gray-200 dark-border-dark-5 pb-5 mx-n5">
            <div class="d-flex flex-1 px-5 align-items-center justify-content-center justify-content-lg-start">
                <div class="w-20 h-20 w-sm-24 h-sm-24 flex-none w-lg-32 h-lg-32 image-fit position-relative">
                    <img alt="{{ env('APP_DESC') }}" class="rounded-circle" src="/assets/images/brand/favi.svg">
                </div>
                <div class="ms-5">
                    <div class="w-24 w-sm-40 truncate white-space-sm-wrap fw-medium fs-lg">{{ auth()->user()->name }}</div>
                    <div class="text-gray-600 text-uppercase">Status: {{ auth()->user()->status }}</div>
                </div>
            </div>
            <div
                class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5 border-start border-end border-gray-200 dark-border-dark-5 border-top border-top-lg-0 pt-5 pt-lg-0">
                <div class="fw-medium text-center text-lg-start mt-lg-3">Contact Details</div>
                <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                    <div class="truncate white-space-sm-normal d-flex align-items-center"> <i data-feather="mail"
                            class="w-4 h-4 me-2"></i> {{ auth()->user()->email ?? 'NO Email Found' }} </div>
                    <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="phone-call"
                            class="w-4 h-4 me-2"></i> {{ auth()->user()->phone ?? 'No Phone Number' }} </div>
                    <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="map-pin"
                            class="w-4 h-4 me-2"></i> {{ auth()->user()->country ?? 'Unknown Country' }} </div>
                </div>
            </div>
            <div
                class="mt-6 mt-lg-0 flex-1 d-flex align-items-center justify-content-center px-5 border-top border-lg-0 border-gray-200 dark-border-dark-5 pt-5 pt-lg-0">
                <div class="text-center rounded-2 w-20 py-3">
                    <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">0</div>
                    <div class="text-gray-600">Total Refers</div>
                </div>
                <div class="text-center rounded-2 w-20 py-3">
                    <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">0</div>
                    <div class="text-gray-600">Active</div>
                </div>
                <div class="text-center rounded-2 w-20 py-3">
                    <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">0</div>
                    <div class="text-gray-600">Pending</div>
                </div>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-column flex-sm-row justify-content-center justify-content-lg-start"
            role="tablist">
            <li id="profile-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center active" data-bs-toggle="pill"
                    data-bs-target="#profile" role="tab" aria-controls="profile-tab" aria-selected="true"> <i
                        class="w-4 h-4 me-2" data-feather="user"></i> Profile </a>
            </li>
            <li id="account-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center" data-bs-toggle="pill"
                    data-bs-target="#account" role="tab" aria-controls="account-tab" aria-selected="false"> <i
                        class="w-4 h-4 me-2" data-feather="shield"></i> Account </a>
            </li>
            <li id="change-password-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center" data-bs-toggle="pill"
                    data-bs-target="#change-password" role="tab" aria-controls="change-password-tab" aria-selected="false">
                    <i class="w-4 h-4 me-2" data-feather="lock"></i> Change Password </a>
            </li>
            <li id="settings-tab" class="nav-item" role="presentation">
                <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center" data-bs-toggle="pill"
                    data-bs-target="#settings" role="tab" aria-controls="settings-tab" aria-selected="false"> <i
                        class="w-4 h-4 me-2" data-feather="settings"></i> Settings </a>
            </li>
        </ul>
    </div>
    <!-- END: Profile Info -->
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
                                        <input id="username" type="text" class="form-control" placeholder="Username"
                                            value="{{ auth()->user()->username }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="email" class="form-label mt-3">Email</label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="refer" class="form-label mt-3">Sponser</label>
                                        <input id="refer" name="refer" type="refer" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->refer }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="country" class="form-label mt-3">Country</label>
                                        <input id="country" name="country" type="text" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->country }}">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="city" class="form-label mt-3">City</label>
                                        <input id="city" name="city" type="text" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->city }}">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="region" class="form-label mt-3">Region</label>
                                        <input id="region" name="region" type="text" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->region }}">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="zip" class="form-label mt-3">Zip</label>
                                        <input id="zip" name="zip" type="text" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->zip }}">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="phone" class="form-label mt-3">Phone</label>
                                        <input id="phone" name="phone" type="text" class="form-control"
                                            placeholder="Full Name" value="{{ auth()->user()->phone }}">
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
