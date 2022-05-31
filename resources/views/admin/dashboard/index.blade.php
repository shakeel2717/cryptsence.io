@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="intro-y box g-col-12 g-col-lg-6 mt-5">
                <div class="d-flex align-items-center px-5 py-5 py-sm-3 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto">
                        Website Setting
                    </h2>
                    <div class="text-center"> <a href="javascript:;" data-bs-toggle="modal"
                            data-bs-target="#basic-modal-preview" class="btn btn-primary">Update Record</a> </div>
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
                        <div class="fw-medium text-gray-700 dark-text-gray-500">
                            ${{ number_format(options('coin_exchange_rate'), 3) }}</div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="position-relative d-flex align-items-center">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle"
                                src="{{ asset('assets/images/coins/tether.png') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <a href="" class="fw-medium">Min Convert USDT Limit</a>
                            <div class="text-gray-600 me-5 me-sm-5">Select Min USDT Convert Limit</div>
                        </div>
                        <div class="fw-medium text-gray-700 dark-text-gray-500">
                            ${{ number_format(options('min_convert_amount'), 2) }}</div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="position-relative d-flex align-items-center">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle"
                                src="{{ asset('assets/images/coins/ctse.png') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <a href="" class="fw-medium">Min CTSE for Stake</a>
                            <div class="text-gray-600 me-5 me-sm-5">Select Min CTSE for Stake</div>
                        </div>
                        <div class="fw-medium text-gray-700 dark-text-gray-500">
                            ${{ number_format(options('min_ctse_for_stake'), 2) }}</div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="position-relative d-flex align-items-center">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle"
                                src="{{ asset('assets/images/coins/ctse.png') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <a href="" class="fw-medium">Staking Bonus Monthly</a>
                            <div class="text-gray-600 me-5 me-sm-5">Select Staking Bonus Monthly</div>
                        </div>
                        <div class="fw-medium text-gray-700 dark-text-gray-500">
                            {{ options('ctse_stake_bonus_monthly') }}%</div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="position-relative d-flex align-items-center">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Rubick Bootstrap HTML Admin Template" class="rounded-circle"
                                src="{{ asset('assets/images/coins/ctse.png') }}">
                        </div>
                        <div class="ms-4 me-auto">
                            <a href="" class="fw-medium">Sign up Reward</a>
                            <div class="text-gray-600 me-5 me-sm-5">Select Bonus Amount for new Account</div>
                        </div>
                        <div class="fw-medium text-gray-700 dark-text-gray-500">
                            {{ options('register_bonus_ctse') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">All Users</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">Active Users</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">Pending Users</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">User CTSE</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">Converted CTSE</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">Purchased CTSE</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">User USDT</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">Deposit USDT</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="2% Lower than last month"> 0.00 on Stacking
                                    </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">0.00</div>
                            <div class="fs-base text-gray-600 mt-1">Convert USDT</div>
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
                            class="btn box d-flex align-items-center text-gray-700 dark-text-gray-300"> <i
                                data-feather="lock" class="d-none d-sm-block w-4 h-4 me-2"></i> Check all History </a>
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
                    <div class="modal-body p-10">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.option.priceUpdate') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="price" class="mt-5 mb-2 text-left">New Price</label>
                                        <input type="text" class="form-control mb-4" id="price" name="price"
                                            placeholder="Enter New Price" value="{{ options('coin_exchange_rate') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="min_convert_amount" class="mb-2 text-left">USDT Min Convert
                                            Limit</label>
                                        <input type="text" class="form-control mb-4" id="min_convert_amount"
                                            name="min_convert_amount" placeholder="Enter New Price"
                                            value="{{ options('min_convert_amount') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="min_ctse_for_stake" class="mb-2 text-left">Min CTSE for
                                            Stake</label>
                                        <input type="text" class="form-control mb-4" id="min_ctse_for_stake"
                                            name="min_ctse_for_stake" placeholder="Enter New Price"
                                            value="{{ options('min_ctse_for_stake') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ctse_stake_bonus_monthly" class="mb-2 text-left">Stake Bonus
                                            Monthly</label>
                                        <input type="text" class="form-control mb-4" id="ctse_stake_bonus_monthly"
                                            name="ctse_stake_bonus_monthly" placeholder="Enter New Price"
                                            value="{{ options('ctse_stake_bonus_monthly') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="register_bonus_ctse" class="mb-2 text-left">Sign Up Bonus</label>
                                        <input type="text" class="form-control mb-4" id="register_bonus_ctse"
                                            name="register_bonus_ctse" placeholder="Enter New Price"
                                            value="{{ options('register_bonus_ctse') }}">
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
