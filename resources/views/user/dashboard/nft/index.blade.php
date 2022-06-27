@extends('layout.dashboard')
@section('title')
    MY NFT(s) ({{ $myNfts->count() }})
@endsection
@section('content')
    <div class="row">
        @forelse ($myNfts as $myNft)
            <div class="col-md-8 mx-auto mt-4">
                <div class="card bg-gray-200 rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="image-fluid justify-content-center-around">
                                    <img alt="{{ env('APP_DESC') }}" class="rounded-3 img-fluid"
                                        src="{{ asset('assets/nft') }}/{{ $myNft->nft->nft }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="nft-data my-5">
                                    <h1 class="fs-4xl fw-medium lh-1">{{ $myNft->nft->title }}</h1>
                                    <div class="fw-normal mt-2">You can Earn upto 20% per month by holding NFT into your
                                        account, in
                                        order to start earning with NFT, Buy any NFT. your NFT will be hold for 1 year.
                                        you will get 10% per month Profit on daily basis in CTSE Asset. you can also get
                                        benefit
                                        with the CTSE Daily Price Increasment.
                                    </div>
                                    <br>
                                    <h1 class="fs-xl fw-medium lh-1 justify-content-center-between">
                                        <span class="text-gray-700">Price:</span>
                                        <span>${{ number_format($myNft->nft->price, 2) }}/- USDT</span>
                                    </h1>
                                    <h1 class="fs-xl fw-medium lh-1 justify-content-center-between mt-3">
                                        <span class="text-gray-700">Total NFT Profit:</span>
                                        <span>{{ number_format(nftBouns(auth()->user()->id, $myNft->id), 2) }}/- CTSE</span>
                                    </h1>
                                    <h1 class="fs-xl fw-medium lh-1 justify-content-center-between mt-3">
                                        <span class="text-gray-700">CTSE Rate:</span>
                                        <span>{{ number_format(options('coin_exchange_rate'), 8) }}</span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 bg-gray-200 rounded">
                <div class="card-body">
                    <h5 class="card-title fw-medium fs-lg">No NFT Found, Please Purchase a NFT From Market
                    </h5>
                </div>
            </div>
        @endforelse
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="alert alert-primary mt-5" role="alert">
                <div class="d-flex align-items-center">
                    <div class="fw-medium fs-lg">Earn upto 20% per month by Holding NFT in your account.</div>
                </div>
                <div class="mt-3 text-capitalize">You can Earn upto 20% per month by holding NFT into your account, in order
                    to start earning with NFT, Buy any NFT. your NFT will be hold for 1 year.
                    you will get 10% per month Profit on daily basis in CTSE Asset. you can also get benefit with the CTSE
                    Daily Price Increasment.</div>
            </div>
        </div>
    </div>
    <h2 class="fs-lg fw-medium me-auto">
        NFT Market
    </h2>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="mt-4">
                <div class="row">
                    @forelse ($nftCategories as $category)
                        <div class="col-md-4 bg-gray-200 rounded">
                            <img class="card-img-top"
                                src="{{ asset('assets/nft/categories') }}/{{ $category->picture }}"
                                alt="{{ env('APP_DESC') }}">
                            <div class="card-body">
                                <h5 class="card-title fw-medium fs-lg">NFT Slab: {{ $category->name }}</h5>
                                <h1 class="fs-sm fw-medium lh-1 justify-content-center-between">
                                    <span class="text-gray-700">Price:</span>
                                    <span>${{ number_format($category->price, 2) }}/- USDT</span>
                                </h1>
                                <br>
                                <h1 class="fs-sm fw-medium lh-1 justify-content-center-between">
                                    <span class="text-gray-700">Holding Profit:</span>
                                    <span>{{ $category->profit }}%</span>
                                </h1>
                                <br>
                                <h1 class="fs-sm fw-medium lh-1 justify-content-center-between">
                                    <span class="text-gray-700">Contract Period:</span>
                                    <span>{{ $category->duration }} Days</span>
                                </h1>
                                <a href="{{ route('user.nft_category.show', ['nft_category' => $category->id]) }}"
                                    class="btn btn-primary mt-3">NFT Catalog</a>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-4 bg-gray-200 rounded">
                            <div class="card-body">
                                <h5 class="card-title fw-medium fs-lg">No NFT Category Found at this Time</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
