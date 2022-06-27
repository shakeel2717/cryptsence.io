@extends('layout.dashboard')
@section('title')
    All NFT Profit's Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.all-nft-profit />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
