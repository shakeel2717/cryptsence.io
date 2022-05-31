@extends('layout.dashboard')
@section('title')
    Admin Withdrawals History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.admin-all-withdrawal />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
