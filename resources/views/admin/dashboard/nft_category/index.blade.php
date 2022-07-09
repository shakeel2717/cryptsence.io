@extends('layout.dashboard')
@section('title')
    All NFT Categories
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.nft_category.create') }}" class="btn btn-primary">Add new NFT Category</a>
            </div>
        </div>
    </div>
    <livewire:admin.all-nft-category/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
