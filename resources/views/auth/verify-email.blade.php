@extends('layout.auth')
@section('title')
    Email Verfication of your account
@endsection
@section('form')
    <div class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
        <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start">
            Email Verfication for Your Account
        </h2>
        <p class="intro-x text-center text-xl-start">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>
        <div class="d-flex justify-content-center align-items-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                    <button class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top">Logout</button>
                </div>
            </form>
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                    <button class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top">Resend Email</button>
                </div>
            </form>
        </div>
    </div>
@endsection
