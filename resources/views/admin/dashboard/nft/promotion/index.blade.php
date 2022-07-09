@extends('layout.dashboard')
@section('title')
    All NFT
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.nftpromotion.create') }}" class="btn btn-primary">Add new NFT Promotion</a>
            </div>
        </div>
    </div>
    <livewire:admin.nft-promotion/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
