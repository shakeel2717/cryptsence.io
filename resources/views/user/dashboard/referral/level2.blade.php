@extends('layout.dashboard')
@section('title')
    Level 2 Referral Report
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.second-level-business />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
