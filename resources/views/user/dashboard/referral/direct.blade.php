@extends('layout.dashboard')
@section('title')
    Direct Referral Reports
@endsection
@section('head')
    @livewireStyles
    @powerGridStyles
@endsection
@section('content')
<livewire:user.direct-business/>
@endsection
@section('footer')
    @livewireScripts
    @powerGridScripts
@endsection
