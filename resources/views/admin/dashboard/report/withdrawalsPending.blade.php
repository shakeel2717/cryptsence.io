@extends('layout.dashboard')
@section('title')
    Admin Withdrawals History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.pending-withdraw />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
