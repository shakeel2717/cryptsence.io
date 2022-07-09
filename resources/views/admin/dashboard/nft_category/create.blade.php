@extends('layout.dashboard')
@section('title')
    Add new NFT Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> NFT Category </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.nft_category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="mt-4">Upload NFT Category Image</label>
                            <div class="mt-2">
                                <input type="file" class="form-control" name="nft" id="nft">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Category Name</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="name" placeholder="Enter NFT Category Title">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Category Price</label>
                            <div class="mt-2">
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                                    id="price" placeholder="Enter NFT Category Price">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Category Duration in Days</label>
                            <div class="mt-2">
                                <input type="number" class="form-control" name="duration" value="{{ old('duration') }}"
                                    id="duration" placeholder="Enter NFT Category Duration in Days">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Category Profit in Percentage</label>
                            <div class="mt-2">
                                <input type="number" class="form-control" name="profit" value="{{ old('profit') }}"
                                    id="profit" placeholder="Enter NFT Category Profit in Percentage">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Category Stock</label>
                            <div class="mt-2">
                                <input type="number" class="form-control" name="stock" value="{{ old('stock') }}"
                                    id="stock" placeholder="Enter NFT Category Stock">
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Add NFT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
