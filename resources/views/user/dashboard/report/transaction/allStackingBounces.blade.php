@extends('layout.dashboard')
@section('title')
    All Stacking Bounces Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.staking-reward />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
