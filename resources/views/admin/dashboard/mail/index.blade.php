@extends('layout.dashboard')
@section('title')
    Send Email to All Verified Users
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Email to All Verified Users </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.mail.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="mt-4">User's Email</label>
                            <div class="mt-2">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Send to Verified Users</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
