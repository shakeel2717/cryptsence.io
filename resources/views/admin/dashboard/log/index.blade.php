@extends('layout.dashboard')
@section('title')
    Admin Log Entries
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:log-entry />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
