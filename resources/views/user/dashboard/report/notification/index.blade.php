@extends('layout.dashboard')
@section('title')
    All Notifications
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.all-notification />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
