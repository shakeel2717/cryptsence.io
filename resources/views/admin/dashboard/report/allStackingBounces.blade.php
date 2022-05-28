@extends('layout.dashboard')
@section('title')
    Admin All Stacking Bounces History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:adminallstackingbounses/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
