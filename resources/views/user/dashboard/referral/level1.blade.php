@extends('layout.dashboard')
@section('title')
    Level 1 Referral Report
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.first-level-business />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
