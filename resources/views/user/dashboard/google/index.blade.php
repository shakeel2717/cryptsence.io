@extends('layout.dashboard')
@section('title')
    Google Authentication
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> Google Authentication </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.google.store') }}" method="post">
                        @csrf
                            <div class="d-flex justify-content-center">
                                <img src="{{ $qrCode }} " alt="QR Code" width="150" height="150">

                            </div>
                        <div class="form-group">
                            <label for="backup_key">Enter BackUp Key</label>
                            <input type="text" class="form-control" id="backup_key" name="backup_key" placeholder="Enter BackUP Key" value="{{ $secret }}">
                        </div>
                        <div class="form-group">
                            <label for="pin">Enter 2FA Code</label>
                            <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter 2FA Code">
                        </div>
                        <div class="form-group">
                            <label for="code">Enter Login Password</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code">
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Activate 2FA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
