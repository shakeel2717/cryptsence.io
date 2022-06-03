@extends('layout.dashboard')
@section('title')
    Admin All Deposit CTSE
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-admin-ctse-deposit />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
