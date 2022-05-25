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
        <div class="col-md-4">
            <div class="intro-y box g-col-12 g-col-lg-6 mt-5">
                <div class="d-flex align-items-center px-5 py-5 py-sm-3 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto">
                        Coin Price
                    </h2>
                    <div class="text-center"> <a href="javascript:;" data-bs-toggle="modal"
                            data-bs-target="#basic-modal-preview" class="btn btn-primary">Update Rate</a> </div>
                </div>
                <div class="p-5">
                    <div class="position-relative d-flex align-items-center">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle"
                                src="{{ asset('assets/images/coins/ctse.png') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <a href="" class="fw-medium">Coin Price</a>
                            <div class="text-gray-600 me-5 me-sm-5">Change or Update Coin Price</div>
                        </div>
                        <div class="fw-medium text-gray-700 dark-text-gray-500">${{ number_format(ctsePrice(), 2) }}</div>
                    </div>
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
    </div>
@endsection
@section('footer')
    <div id="basic-modal-preview" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-10 text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.option.priceUpdate') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="price" class="my-5">New Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="Enter New Price">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
