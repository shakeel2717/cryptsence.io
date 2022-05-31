@extends('layout.dashboard')
@section('title')
    Staking Bonus Calculator
@endsection
@section('head')
    @livewireStyles
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> GET CTSE Coin </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-sm-start my-4">
                                <img src="{{ asset('assets/images/coins/ctse.png') }}" width="70" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-sm-end my-4">
                                <h2 class="fw-medium fs-base mb-4">CTSE Price:
                                    {{ number_format(options('coin_exchange_rate'), 8) }}</h2>
                                <h2 class="fw-medium fs-base mb-4">CTSE Balance:
                                    {{ number_format(balance('CTSE', auth()->user()->id), 2) }}</h2>
                            </div>
                        </div>
                    </div>
                    @livewire('calculator')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @livewireScripts
@endsection
