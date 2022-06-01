@extends('layout.dashboard')
@section('title')
    All Refers
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.all-commisions />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
