@extends('layout.dashboard')
@section('title')
    Policy Mangement
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="box">
                <div class="p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto"> @yield('title') </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.policy.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="mt-4">Title</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter Policy Title">
                            </div>
                        </div>
                        <div>
                            <label class="mt-4">Description</label>
                            <div class="mt-2">
                                <textarea type="text" class="form-control" name="description" id="description"
                                placeholder="Enter Policy Description"></textarea>
                            </div>
                        </div>
                        <label class="mt-4">Starting Date</label>
                        <div class="mt-5">
                            <input name="st_date" class="datepicker form-control w-56 " data-single-mode="true">
                        </div>
                        <label class="mt-4">End Date</label>
                        <div class="mt-5">
                            <input name="end_date" class="datepicker form-control w-56 " data-single-mode="true">
                        </div>
                        <div>
                            <label class="mt-4">Bonus</label>
                            <div class="mt-2">
                                <input type="text" class="form-control" name="bonus" id="bonus"
                                    placeholder="Enter Bonus Amount %">
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit"
                                onclick="this.form.submit(); this.disabled=true; this.value='Processing…';"
                                class="btn btn-primary">Add Policy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
