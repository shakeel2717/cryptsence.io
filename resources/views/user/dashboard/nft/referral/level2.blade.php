@extends('layout.dashboard')
@section('title')
    NFT In-Direct Level 2 Referral Rewards Reports
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.nft-in-direct-second-referral />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
