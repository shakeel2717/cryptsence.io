@extends('layout.dashboard')
@section('title')
    Recent Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.user-resent-tranction/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection

