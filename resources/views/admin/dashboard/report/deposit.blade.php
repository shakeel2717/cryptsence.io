@extends('layout.dashboard')
@section('title')
    Admin Deposit History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:adminalldeposit />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
