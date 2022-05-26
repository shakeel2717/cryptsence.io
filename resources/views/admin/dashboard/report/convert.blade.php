@extends('layout.dashboard')
@section('title')
    Admin Convert History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:adminallconvert />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
