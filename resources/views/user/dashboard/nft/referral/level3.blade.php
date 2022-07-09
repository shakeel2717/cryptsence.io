@extends('layout.dashboard')
@section('title')
    NFT In-Direct Level 3 Referral Rewards Reports
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.nft-in-direct-third-referral />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
