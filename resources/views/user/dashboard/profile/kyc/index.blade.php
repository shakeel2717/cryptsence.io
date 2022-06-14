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
                <form action="{{ route('user.kyc.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column-reverse flex-xl-row flex-column">
                        <div class="flex-1 mt-6 mt-xl-0">
                            <div class="grid columns-12 gap-x-5 gap-y-0">
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="name" class="form-label mt-3">Legal Name</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Legal Name">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="address" class="form-label mt-3">Address</label>
                                        <input id="address" name="address" type="text" class="form-control"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="country" class="form-label mt-3">Country</label>
                                        <input id="country" name="country" type="text" class="form-control"
                                            placeholder="Country">
                                    </div>
                                </div>
                                <div class="g-col-12 g-col-xxl-6">
                                    <div>
                                        <label for="document" class="form-label mt-3">Proof of Identity (Passport, Driving License, SSN)</label>
                                        <input id="document" name="document" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Submit KYC Approval</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
@endsection
