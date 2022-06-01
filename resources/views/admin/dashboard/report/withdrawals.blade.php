@extends('layout.dashboard')
@section('title')
    Admin Withdrawals History
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
<livewire:admin.all-withdraw/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
