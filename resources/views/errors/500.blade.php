@extends('layout.error')
@section('title')
    500
@endsection
@section('content')
    <div class="intro-x fs-8xl fw-medium">500</div>
    <div class="intro-x fs-xl fs-lg-3xl fw-medium mt-5">Oops. there's might be some Server Issue.</div>
    <div class="intro-x fs-lg mt-3">We are already working on it, this Issue will be resolved soon.</div>
    <a href="{{ route('user.index.index') }}"
        class="intro-x btn py-3 px-4 text-white border-white dark-border-dark-5 dark-text-gray-300 mt-10">Back
        to Home</a>
@endsection
