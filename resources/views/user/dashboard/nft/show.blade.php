@extends('layout.dashboard')
@section('title')
    Buy new NFT Confirmation
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card bg-gray-200 rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image-fluid justify-content-center-around">
                                <img alt="{{ env('APP_DESC') }}" class="rounded-3"
                                    src="{{ asset('assets/nft/sm/1.jpg') }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="nft-data my-5">
                                <h1 class="fs-4xl fw-medium lh-1">{{ $nft->title }}</h1>
                                <div class="fw-normal mt-2">You can Earn upto 20% per month by holding NFT into your
                                    account, in
                                    order to start earning with NFT, Buy any NFT. your NFT will be hold for 1 year.
                                    you will get 10% per month Profit on daily basis in CTSE Asset. you can also get benefit
                                    with the CTSE Daily Price Increasment.
                                </div>
                                <br>
                                <h1 class="fs-xl fw-medium lh-1 justify-content-center-between">
                                    <span class="text-gray-700">Price:</span>
                                    <span>${{ number_format($nft->price,2) }}/- USDT</span>
                                </h1>
                                <h1 class="fs-xl fw-medium lh-1 justify-content-center-between mt-3">
                                    <span class="text-gray-700">Daily ROI:</span>
                                    <span>{{ $nft->profit }}%</span>
                                </h1>
                                <h1 class="fs-xl fw-medium lh-1 justify-content-center-between mt-3">
                                    <span class="text-gray-700">USDT Balance:</span>
                                    <span>${{ number_format(balance('USDT.TRC20',auth()->user()->id),2) }}</span>
                                </h1>
                                <div class="mt-5">
                                    <form action="{{ route('user.nft.update',['nft' => $nft->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" class="btn btn-lg btn-primary" value="Confrim & Buy now">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
