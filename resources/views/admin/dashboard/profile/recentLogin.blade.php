@extends('layout.dashboard')
@section('title')
    Recent Login
@endsection
@section('content')
    <x-profile />
    <div class="g-col-12 g-col-lg-8 g-col-xxl-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box mt-lg-5">
            <div class="d-flex align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                    Recent Login
                </h2>
            </div>
            <div class="row">
                <div class="g-col-12 mt-6">
                    <div class="intro-y overflow-auto overflow-lg-visible mt-8 mt-sm-0">
                        <table class="table table-report mt-sm-2">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Device</th>
                                    <th class="text-nowrap">Device</th>
                                    <th class="text-center text-nowrap">Operating System</th>
                                    <th class="text-center text-nowrap">Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $login_history)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="{{ env('APP_DESC') }}" class="tooltip rounded-circle"
                                                    src="/assets/images/devices/{{ strtolower($login_history->device) }}.png"
                                                    title="{{ $login_history->device }}">
                                            </div>
                                            {{ $login_history->device }}
                                        </td>
                                        <td>
                                            <a href="" class="fw-medium text-nowrap">{{ $login_history->browser }}</a>
                                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">
                                                {{ $login_history->browser_version }}</div>
                                        </td>
                                        <td class="text-center">{{ $login_history->os }}, {{ $login_history->os_version }}
                                        </td>
                                        <td class="text-center">{{ $login_history->country }}, {{ $login_history->city }},
                                            {{ $login_history->zip }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
@endsection
