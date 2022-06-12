@extends('layout.auth')
@section('title')
    Reset Password
@endsection
@section('form')
    <div
        class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
        <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start">
            Reset your Password
        </h2>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="intro-x mt-8">
                <input type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block" name="email"
                    placeholder="Email" value="{{ old('email', $request->email) }}">
                <input type="password" name="password"
                    class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4" placeholder="Password">
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="password" name="password_confirmation"
                    class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4"
                    placeholder="Confirm Password">
            </div>
            <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                <button class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top">Reset</button>
            </div>
            <div class="intro-x mt-10 mt-xl-24 text-gray-700 dark-text-gray-600 text-center text-xl-start">
                By signin in, you agree to our
                <br>
                <a class="text-theme-1 dark-text-theme-10" href="">Terms and Conditions</a> & <a
                    class="text-theme-1 dark-text-theme-10" href="">Privacy Policy</a>
            </div>
        </form>
    </div>
@endsection
