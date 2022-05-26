@extends('layout.dashboard')
@section('title')
    All Withdrawal Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
<livewire:userallwithdrawal/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection

