@extends('layout.dashboard')
@section('title')
    Withdraw Fund form your account
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Withdraw Funds </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.withdraw.store') }}" method="post">
                        @csrf
                        <div class="">
                            <div class="col-md-12">
                                <div class="text-sm-end my-4">
                                    <h2 class="fw-medium fs-base mb-4">USDT Balance:
                                        {{ number_format(balance('USDT.TRC20', auth()->user()->id), 6) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label>Select Currency</label>
                            <div class="mt-2">
                                <select data-placeholder="Select Currency" name="coin_id" class="tom-select w-full">
                                    @forelse ($coins as $coin)
                                        <option value="{{ $coin->id }}">{{ $coin->symbol }}</option>
                                    @empty
                                        <option value="">Sorry, No Coin Available to Withdraw</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">Wallet</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="wallet" placeholder="Enter wallet">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">Amount</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Request Withdraw</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
