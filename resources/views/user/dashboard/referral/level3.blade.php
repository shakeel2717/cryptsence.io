@extends('layout.dashboard')
@section('title')
    Level 3 Referral Report
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.third-level-business />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
