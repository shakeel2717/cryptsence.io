@extends('layout.dashboard')
@section('title')
    All Stacking Bounces Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:allstacking-bounces/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
