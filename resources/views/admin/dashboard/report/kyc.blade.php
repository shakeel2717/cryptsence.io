@extends('layout.dashboard')
@section('title')
    Admin Log Entries
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.kyc-request />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
