@extends('layout.dashboard')
@section('title')
    All users NTF's Wise
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.nft-report />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
