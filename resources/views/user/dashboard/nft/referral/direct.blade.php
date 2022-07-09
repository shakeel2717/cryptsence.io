@extends('layout.dashboard')
@section('title')
    NFT Direct Referral Rewards Reports
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:user.nft-direct-referral />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
