@extends('layout.dashboard')
@section('title')
    Convert USDT into CTSE
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> GET CTSE Coin </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.convert.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-sm-start my-4">
                                    <img src="{{ asset('assets/images/svg/icon.svg') }}" width="70" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-sm-end my-4">
                                    <h2 class="fw-medium fs-base mb-4">CTSE Price: {{ number_format(balance('CTSE', auth()->user()->id),8) }}</h2>
                                    <h2 class="fw-medium fs-base mb-4">USDT Balance: {{ number_format(balance('USDT.TRC20', auth()->user()->id),6) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label>Buy CTSE From</label>
                            <div class="mt-2">
                                <select data-placeholder="Select Currency" name="method" class="tom-select w-full">
                                    <option value="USDT.TRC20">USDT (TRC20)</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">Amount</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter USDT Amount">
                            </div>
                        </div>
                        <div class="box p-4">
                            <div class="mt-4">
                                <div class="fs-base text-gray-600">You'll Get</div>
                                <div class="fs-xl text-theme-1 dark-text-theme-10 fw-medium mt-2"> <span
                                        id="total">0.00</span> CTSE</div>
                                <div class="mt-1">Taxes included</div>
                            </div>

                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Convert Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            var amount = $("#amount").val();
            var price = 0.01;
            $("#amount").on('keyup', function() {
                if ($(this).val() > 0) {
                    var amount = $(this).val();
                    var total = amount / price;
                    $("#total").text(total);
                }
            });
        });
    </script>
@endsection
