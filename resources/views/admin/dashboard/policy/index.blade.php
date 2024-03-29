@extends('layout.dashboard')
@section('title')
    Admin Convert History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-policy />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
