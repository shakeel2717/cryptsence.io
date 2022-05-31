@extends('layout.dashboard')
@section('title')
    Convert Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.all-convert />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
