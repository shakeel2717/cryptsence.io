@extends('layout.dashboard')
@section('title')
    All NFt's Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-nft-buy />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
