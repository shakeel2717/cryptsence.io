@extends('layout.dashboard')
@section('title')
    Malaysia Tour Winner
@endsection
@section('content')
    <div class="row">
        @for ($i = 1; $i < 10; $i++)
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('assets/tour/'.$i.'.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
