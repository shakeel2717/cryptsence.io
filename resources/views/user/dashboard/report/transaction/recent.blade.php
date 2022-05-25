@extends('layout.dashboard')
@section('title')
    Recent Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:recent-transaction />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection

