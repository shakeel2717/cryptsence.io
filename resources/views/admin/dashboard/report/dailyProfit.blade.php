@extends('layout.dashboard')
@section('title')
    Admin Daily Profit History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admindailyprofit/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
