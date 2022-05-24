@extends('layout.dashboard')
@section('title')
    Add Balance into Users Account
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Finance Mangement </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.finance.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="mt-4">User's Email</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter User Email">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">Select Coin</label>
                            <div class="mt-2">
                                <select data-placeholder="Select Currency" name="method" class="tom-select w-full">
                                    <option value="CTSE">CTSE</option>
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
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Add Balance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
