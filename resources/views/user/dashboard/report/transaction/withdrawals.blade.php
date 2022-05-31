@extends('layout.dashboard')
@section('title')
    All Withdrawal Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.user-all-withdrawal />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
