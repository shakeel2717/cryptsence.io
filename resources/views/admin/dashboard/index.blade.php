@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="report-box zoom-in mt-12 mt-sm-5">
                <div class="box p-5">
                    <div class="d-flex">
                        <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                        <div class="ms-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                title="2% Lower than last month"> 0.00 on Stacking </div>
                        </div>
                    </div>
                    <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                    <div class="fs-base text-gray-600 mt-1">Stacking CTSE</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="g-col-12 mt-6">
            <div class="intro-y d-block d-sm-flex align-items-center h-10">
                <h2 class="fs-lg fw-medium truncate me-5">
                    Recent Login History
                </h2>
                <div class="d-flex align-items-center ms-sm-auto mt-3 mt-sm-0">
                    <a href="{{ route('admin.profile.recent.login') }}"
                        class="btn box d-flex align-items-center text-gray-700 dark-text-gray-300"> <i data-feather="lock"
                            class="d-none d-sm-block w-4 h-4 me-2"></i> Check all History </a>
                </div>
            </div>
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
                                <td class="text-center">{{ $login_history->os }},
                                    {{ $login_history->os_version }}
                                </td>
                                <td class="text-center">{{ $login_history->country }},
                                    {{ $login_history->city }},
                                    {{ $login_history->zip }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
