@extends('layout.dashboard')
@section('title')
    All Expense
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-shakeel />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
