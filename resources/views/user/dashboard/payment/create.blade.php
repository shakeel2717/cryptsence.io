@extends('layout.dashboard')
@section('title')
    Send {{ $task->amount }} USDT to this Address
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Deposit Funds </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.payment.store') }}" method="post">
                        @csrf
                        <div class="qr-image">
                            <img src="{{ $task->qrcode_url }}" alt="" class="mx-auto" width="50%">
                            <hr>
                            <h2 class="text-theme-1 fs-2xl text-center">
                                <b>Amount:</b> <span class="amount">{{ $task->amount }}</span>
                                {{ $task->to_currency }}
                            </h2>
                            <p class="text-center">
                                <b>Payment ID:</b> <span class="amount">{{ $task->txn_id }}</span>
                            </p>
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount"
                                            class="form-control text-center mt-5" value="{{ $task->address }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
