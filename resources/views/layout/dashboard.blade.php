<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('assets/images/brand/favi.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="author" content="ASAN Webs Development">
    <title>@yield('title') - {{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    @yield('head')
    @livewireStyles
</head>

<body class="main">
    <div class="mobile-menu d-md-none">
        <div class="mobile-menu-bar">
            <a href="" class="d-flex me-auto">
                <img alt="{{ env('APP_DESC') }}" class="" src="{{ asset('assets/images/brand/logo.svg') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler" class="mobile-menu-bar__toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white"></i> </a>
        </div>
        <ul class="mobile-menu-wrapper border-top border-theme-29 dark-border-dark-3 py-5">
            @if (auth()->user()->role == 'admin')
            <x-admin.nav mode="0" />
            @elseif (auth()->user()->role == 'user')
            <x-layout.nav mode="0" />
            @endif
        </ul>
    </div>
    <div class="d-flex">
        <nav class="side-nav">
            <a href="" class="intro-x d-flex align-items-center ps-5 pt-4">
                <img alt="{{ env('APP_DESC') }}" class="w-40" src="{{ asset('assets/images/brand/logo.svg') }}">
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                @if (auth()->user()->role == 'admin')
                <x-admin.nav mode="1" />
                @elseif (auth()->user()->role == 'user')
                <x-layout.nav mode="1" />
                @endif
            </ul>
        </nav>
        <div class="content">
            <div class="top-bar">
                <div class="-intro-x breadcrumb me-auto d-none d-sm-flex">
                    <a href="{{ route('user.index.index') }}">Hi, {{ auth()->user()->name }}
                        ({{ auth()->user()->username }})
                    </a>
                </div>
                <div class="intro-x dropdown me-auto me-sm-6">
                    <div class="theme-dropdown-toggle notification {{ auth()->user()->user_notifications->where('seen', false)->count() > 0? 'notification--bullet': '' }} cursor-pointer" role="button" aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="bell" class="notification__icon dark-text-gray-300"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="d-flex justify-content-center-between">
                                <div class="notification-content__title dark-text-gray-300">Notifications
                                    ({{ auth()->user()->user_notifications->where('seen', false)->count() }})</div>
                                <div class="notification-content__title dark-text-gray-300"><a href="{{ route('user.notification.index') }}">See All</a></div>
                            </div>
                            @foreach (auth()->user()->user_notifications->where('seen', false) as $notificaion)
                            @if ($loop->iteration > 5)
                            @break
                            @endif
                            <a href="{{ route('user.notification.show', ['notification' => $notificaion->id]) }}">
                                <div class="cursor-pointer position-relative d-flex align-items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit me-1 justify-content-center-between">
                                        <i data-feather="{{ $notificaion->type }}" class="w-6 h-6"></i>
                                    </div>
                                    <div class="ms-2 overflow-hidden">
                                        <div class="d-flex align-center">
                                            <div class="fw-medium truncate me-5 dark-text-gray-300">{{ $notificaion->title }}</div>
                                            <div class="fs-xs text-gray-500 ms-auto text-nowrap">
                                                {{ $notificaion->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <div class="w-full truncate text-gray-600 mt-0.5">
                                            {{ $notificaion->content }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="intro-x dropdown w-8 h-8">
                    <div class="theme-dropdown-toggle w-8 h-8 rounded-pill overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-bs-toggle="dropdown">
                        <img alt="{{ env('APP_DESC') }}" src="{{ asset('assets/profile/'.auth()->user()->picture) }}">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-theme-26 dark-bg-dark-6 text-white">
                            <li class="p-2">
                                <div class="fw-medium text-white">{{ auth()->user()->name }}</div>
                                <div class="fs-xs text-theme-28 mt-0.5 dark-text-gray-600 text-uppercase">
                                    KYC Status: {{ (auth()->user()->kyc_status == 1 ? "Verified" : "Pending") }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
                            </li>
                            <li>
                                <a href="{{ route('user.profile.index') }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="user" class="w-4 h-4 me-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="{{ route('user.profile.password.change') }}" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i data-feather="lock" class="w-4 h-4 me-2"></i> Reset Password </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover">
                                        <i data-feather="log-out" class="w-4 h-4 me-2"></i> Logout </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
                <h2 class="fs-lg fw-medium me-auto">
                    @yield('title')
                </h2>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <x-alert />
    @yield('footer')
    @livewireScripts
</body>

</html>