@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.complete-coin-payment />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
