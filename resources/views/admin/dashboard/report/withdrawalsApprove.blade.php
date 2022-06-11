@extends('layout.dashboard')
@section('title')
    Admin Withdrawals Approved History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.approve-withdraw />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
