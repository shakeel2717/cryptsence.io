@extends('layout.dashboard')
@section('title')
    All Withdrawal Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
<livewire:user.all-withdraw/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
