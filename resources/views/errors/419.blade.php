@extends('layout.error')
@section('title')
    419
@endsection
@section('content')
    <div class="intro-x fs-8xl fw-medium">419</div>
    <div class="intro-x fs-xl fs-lg-3xl fw-medium mt-5">Oops. This page is Expired.</div>
    <div class="intro-x fs-lg mt-3">You may have mistyped the address or the page may have moved.</div>
    <a href="{{ route('user.index.index') }}"
        class="intro-x btn py-3 px-4 text-white border-white dark-border-dark-5 dark-text-gray-300 mt-10">Back
        to Home</a>
@endsection
