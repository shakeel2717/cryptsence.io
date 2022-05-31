@extends('layout.dashboard')
@section('title')
    Admin Deposit History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.admin-all-deposit />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
