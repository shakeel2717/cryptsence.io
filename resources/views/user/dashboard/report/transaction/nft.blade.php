@extends('layout.dashboard')
@section('title')
    All NFT Transactions
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.all-nft-buy />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
