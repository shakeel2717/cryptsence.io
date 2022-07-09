@extends('layout.dashboard')
@section('title')
    Add new NFT Promotion
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Create NFT Promotion </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.nftpromotion.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="mt-4">NFT Promotion Title</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    id="title" placeholder="Enter NFT Title">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Promotion Discount Value</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="value" value="{{ old('value') }}"
                                    id="value" placeholder="Enter NFT Discount Value">
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Add NFT discount</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
