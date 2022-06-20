@extends('layout.dashboard')
@section('title')
    Expense Mangement
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Add new Expense </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.expense.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="mt-4">Title</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Expense Title">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">Description</label>
                            <div class="mt-2">
                                <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
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
                                class="btn btn-primary">Add Expense</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
