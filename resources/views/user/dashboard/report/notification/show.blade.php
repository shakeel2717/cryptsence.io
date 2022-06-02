@extends('layout.dashboard')
@section('title')
    All Notifications
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <div class="intro-y g-col-12 g-col-md-6 mt-5">
        <div class="box">
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center justify-content-center p-5">
                <div class="w-full w-lg-1/2 mb-4 mb-lg-0 me-auto">
                    <div class="intro-y">
                        <h1 class="fs-4xl text-theme-1 fw-medium lh-1 mb-5">{{ $notification->title }}</h1>
                        <div class="fw-medium">{{ $notification->created_at->diffForHumans() }}</div>
                        <br>
                        <div class="fw-large">{{ $notification->content }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
