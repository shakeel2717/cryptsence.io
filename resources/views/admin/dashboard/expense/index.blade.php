@extends('layout.dashboard')
@section('title')
    All Expense
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
    <livewire:admin.all-expense />
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
