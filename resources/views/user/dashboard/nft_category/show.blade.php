@extends('layout.dashboard')
@section('title')
    NFT Market ({{ $nfts->count() }})
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="mt-4">
                <div class="row">
                    @forelse ($nfts as $nft)
                        <div class="col-md-4 bg-gray-200 rounded">
                            <img class="card-img-top" src="{{ asset('assets/nft') }}/{{ $nft->nft }}"
                                alt="{{ env('APP_DESC') }}">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h5 class="card-title fw-medium fs-lg">{{ $nft->title }} </h5>
                                    @if (solidNfts($nft->id))
                                        <div
                                            class="fs-lg bg-theme-6 px-2 rounded-2 text-white ms-5 d-flex align-items-center">
                                            Solid</div>
                                    @endif
                                </div>
                                <h1 class="fs-sm fw-medium lh-1 justify-content-center-between">
                                    <span class="text-gray-700">Price:</span>
                                    <span>${{ number_format($nft->nft_category->price, 2) }}/- USDT</span>
                                </h1>
                                <br>
                                <h1 class="fs-sm fw-medium lh-1 justify-content-center-between">
                                    <span class="text-gray-700">Holding Profit:</span>
                                    <span>{{ $nft->nft_category->profit }}%</span>
                                </h1>
                                <br>
                                <a href="{{ route('user.nft.show', ['nft' => $nft->id]) }}"
                                    class="btn btn-primary mt-3">Buy NFT Now</a>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-4 bg-gray-200 rounded">
                            <div class="card-body">
                                <h5 class="card-title fw-medium fs-lg">No NFT Found at this Time</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
