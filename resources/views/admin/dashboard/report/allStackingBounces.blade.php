@extends('layout.dashboard')
@section('title')
    Admin All Stacking Rewards History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-staking-reward />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
