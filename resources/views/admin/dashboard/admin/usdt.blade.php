@extends('layout.dashboard')
@section('title')
    Admin All Deposit USDT
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-admin-usdt-deposit />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
