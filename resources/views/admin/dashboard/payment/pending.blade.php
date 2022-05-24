@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:coin-payment-pending />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
