@extends('layout.dashboard')
@section('title')
    Admin Convert History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
<livewire:admin.all-convert/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
