@extends('layout.dashboard')
@section('title')
    All Refers
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:userreferal />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
