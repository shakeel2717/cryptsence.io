@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:coin-payment-complete />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
