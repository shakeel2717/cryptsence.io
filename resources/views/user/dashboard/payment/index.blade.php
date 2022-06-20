@extends('layout.dashboard')
@section('title')
    Send USDT to this Address
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="alert alert-primary mt-5" role="alert">
                <div class="d-flex align-items-center">
                    <div class="fw-medium fs-lg">Deposit Funds to your Account.!</div>
                </div>
                <div class="mt-3 text-capitalize">Your Payment will be automatically Added into your account once it's Confirmed.</div>
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Deposit Funds </h2>
                </div>
                <div class="card-body">
                    <div class="qr-image">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{ $address->address }}&choe=UTF-8&chld=L|0"
                            alt="" class="mx-auto img-fluid" width="250">
                        <div class="row">
                            <div class="text-center mt-5">
                                <h2 class="fs-base text-theme-1">Scan QR or Copy the Following Address, Only send
                                    {{ $address->coin->symbol }} to this address!</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group">
                                    <input type="text" name="amount" id="amount" placeholder="Enter Amount"
                                        class="form-control text-center mt-5" value="{{ $address->address }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
