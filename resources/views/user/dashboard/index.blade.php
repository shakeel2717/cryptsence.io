@extends('layout.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="report-box-2 intro-y mt-12 mt-sm-5">
                <div class="box d-sm-flex">
                    <div class="px-8 py-8 d-flex flex-column justify-content-center flex-1">
                        <img src="/assets/images/brand/favi.svg" class="w-20 h-20 text-theme-12" alt="">
                        {{-- <i data-feather="shopping-bag" class="w-10 h-10 text-theme-12"></i> --}}
                        <div class="position-relative fs-3xl fw-medium mt-5 "><span>Stack CTSE</span><br> 0.000 </div>
                        <div class="report-box-2__indicator bg-theme-9 tooltip cursor-pointer"
                            title="0% Higher than last Day"> 0% <i data-feather="chevron-up" class="w-4 h-4 ms-0.5"></i>
                        </div>
                        <div class="mt-4 text-gray-600 dark-text-gray-600">Track and trade your coins in one place.</div>
                        <a href="{{ route('user.convert.index') }}"
                            class="btn btn-outline-secondary position-relative justify-content-start rounded-pill mt-12">
                            Get CTSE Coin
                            <span
                                class="w-8 h-8 position-absolute d-flex justify-content-center align-items-center bg-theme-1 text-white rounded-pill end-0 top-0 bottom-0 my-auto ms-auto me-0.5">
                                <i data-feather="arrow-right" class="w-4 h-4"></i> </span>
                        </a>
                    </div>
                    <div
                        class="px-8 py-12 d-flex flex-column justify-content-center flex-1 border-top border-top-sm-0 border-start-sm border-gray-300 dark-border-dark-5 border-dashed">
                        <div class="text-gray-600 dark-text-gray-600 fs-xs">CTSE Price</div>
                        <div class="mt-1.5 d-flex align-items-center">
                            <div class="fs-base">0.00</div>
                        </div>
                        <div class="text-gray-600 dark-text-gray-600 fs-xs mt-5">Market Cap</div>
                        <div class="mt-1.5 d-flex align-items-center">
                            <div class="fs-base">0.00</div>
                        </div>
                        <div class="text-gray-600 dark-text-gray-600 fs-xs mt-5">Volume</div>
                        <div class="mt-1.5 d-flex align-items-center">
                            <div class="fs-base">0.00</div>
                        </div>
                        <div class="text-gray-600 dark-text-gray-600 fs-xs mt-5">Max Supply</div>
                        <div class="mt-1.5 d-flex align-items-center">
                            <div class="fs-base">0.00</div>
                        </div>
                        <div class="text-gray-600 dark-text-gray-600 fs-xs mt-5">Total Supply</div>
                        <div class="mt-1.5 d-flex align-items-center">
                            <div class="fs-base">0.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <img src="/assets/images/coins/ctse.png" alt="" class="w-10">
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month">{{ now() }} </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">
                                {{ number_format(balance('CTSE', auth()->user()->id), 8) }}</div>
                            <div class="fs-base text-gray-600 mt-1">Available CTSE</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <img src="/assets/images/coins/tether.png" alt="" class="w-10">
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month">{{ now() }} </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">
                                {{ number_format(balance('USDT.TRC20', auth()->user()->id), 6) }}</div>
                            <div class="fs-base text-gray-600 mt-1">Available USDT</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="report-box zoom-in mt-12 mt-sm-5">
                        <div class="box p-5">
                            <div class="d-flex">
                                <img src="/assets/images/coins/reward.png" alt="" class="w-10">
                                <div class="ms-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month">{{ now() }} </div>
                                </div>
                            </div>
                            <div class="report-box__total fs-3xl fw-medium mt-6">
                                0.00
                            </div>
                            <div class="fs-base text-gray-600 mt-1">CTSE Reward</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="g-col-12 g-col-xl-8 mt-6">
                        <div class="intro-y d-block d-sm-flex align-items-center h-10">
                            <h2 class="fs-lg fw-medium truncate me-5">
                                Affiliate CTSE
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-12 mt-sm-5">
                            <div class="justify-content-center-between">
                                <div class="left">
                                    <div class="fs-2xl text-theme-1 fw-medium">Invite friends to get <b>FREE</b> bonuses!
                                    </div>
                                    <p class="w-full lh-lg text-gray-600 mt-2">Get a CTSE 100 voucher by inviting your
                                        friends &
                                        Family.</p>
                                </div>
                                <div class="right">
                                    <img src="{{ asset('assets/images/coins/invite.png') }}" alt="{{ env('APP_DESC') }}"
                                        width="80">
                                </div>
                            </div>
                            <div class="w-100 position-relative mt-6 cursor-pointer tooltip" title="Copy referral link">
                                <input class="form-control"
                                    value="{{ route('register', ['refer' => auth()->user()->username]) }}" readonly>
                                <i data-feather="copy" onclick="myFunction();"
                                    class="position-absolute end-0 top-0 bottom-0 my-auto me-4 w-4 h-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-6">
            <div class="intro-y d-block d-sm-flex align-items-center h-10">
                <h2 class="fs-lg fw-medium truncate me-5">
                    Recent Transactions
                </h2>
                <div class="d-flex align-items-center ms-sm-auto mt-3 mt-sm-0">
                    <a href="{{ route('user.profile.recent.login') }}"
                        class="btn box d-flex align-items-center text-gray-700 dark-text-gray-300"> <i data-feather="lock"
                            class="d-none d-sm-block w-4 h-4 me-2"></i> Check all History </a>
                </div>
            </div>
            <div class="intro-y overflow-auto overflow-lg-visible mt-8 mt-sm-0">
                @foreach ($transactions as $transaction)
                    <div class="intro-x mt-5">
                        <div class="box px-5 py-3 mb-3 d-flex align-items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-circle overflow-hidden">
                                <img alt="Rubick Bootstrap HTML Admin Template" src="/assets/images/coins/{{ $transaction->currency }}.png">
                            </div>
                            <div class="ms-4 me-auto">
                                <div class="fw-medium text-uppercase">{{ $transaction->type }}
                                    <span>({{ $transaction->status }})</span>
                                </div>
                                <div class="text-gray-600 fs-xs mt-0.5">{{ $transaction->created_at }}</div>
                            </div>
                            <div class="text-theme-9">{{ number_format($transaction->amount, 2) }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 mt-6">
            <div class="intro-y d-block d-sm-flex align-items-center h-10">
                <h2 class="fs-lg fw-medium truncate me-5">
                    Recent Login History
                </h2>
                <div class="d-flex align-items-center ms-sm-auto mt-3 mt-sm-0">
                    <a href="{{ route('user.profile.recent.login') }}"
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
    <script>
        // create a click to copy function
        function myFunction() {
            var copyText = document.getElementsByClassName("form-control")[0];
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        }
    </script>
@endsection
