@extends('layout.dashboard')
@section('title')
    Daily Profit Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:userdailyprofit />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
