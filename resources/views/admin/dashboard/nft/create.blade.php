@extends('layout.dashboard')
@section('title')
    Add new NFT
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Create NFT </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.nft.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="mt-4">Upload NFT HD</label>
                            <div class="mt-2">
                                <input type="file" class="form-control" name="nft" id="nft">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Category</label>
                            <div class="mt-2">
                                <select name="nft_category_id" id="nft_category_id" class="form-control">
                                    <option value="">Select NFT Category</option>
                                    @foreach ($nftCategories as $nftCategory)
                                        <option value="{{ $nftCategory->id }}">{{ $nftCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">NFT Title</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    id="title" placeholder="Enter NFT Title">
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
