@extends('layout.auth')
@section('title')
    Create a new Account
@endsection
@section('form')
    <div
        class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
        <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start">
            Sign Up
        </h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="intro-x mt-2 text-gray-500 d-xl-none text-center">Create a new Account</div>
            <div class="intro-x mt-8">
                <input type="text" class="intro-x form-control py-3 px-4 border-gray-300 d-block" name="name"
                    placeholder="Name" value="{{ old('name') }}">
                <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4"
                    name="username" placeholder="Username" value="{{ old('username') }}">
                <input type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4"
                    name="email" placeholder="Email" value="{{ old('email') }}">
                <input type="password" name="password"
                    class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4" placeholder="Password">
                <input type="password" name="password_confirmation"
                    class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4"
                    placeholder="Confirm Password">
            </div>
            <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                <button type="submit" class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top">Sign up</button>
                <a href="{{ route('login') }}"
                    class="btn btn-outline-secondary py-3 px-4 w-full w-xl-32 mt-3 mt-xl-0 align-top">Login</a>
            </div>
            <div class="intro-x mt-10 mt-xl-24 text-gray-700 dark-text-gray-600 text-center text-xl-start">
                By signin up, you agree to our
                <br>
                <a class="text-theme-1 dark-text-theme-10" href="">Terms and Conditions</a> & <a
                    class="text-theme-1 dark-text-theme-10" href="">Privacy Policy</a>
            </div>
        </form>
    </div>
@endsection
