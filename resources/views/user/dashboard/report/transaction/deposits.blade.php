@extends('layout.dashboard')
@section('title')
    All Deposits Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
<livewire:user-all-deposit/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection

