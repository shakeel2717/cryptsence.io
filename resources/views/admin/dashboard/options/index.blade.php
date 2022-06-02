@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('head')
    @livewireStyles()
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @livewire('admin.admin-options')
        </div>
    @endsection
    @section('footer')
        @livewireScripts()
    @endsection
