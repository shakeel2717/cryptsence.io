@extends('layout.dashboard')
@section('title')
    Admin Log Entries
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-user/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
