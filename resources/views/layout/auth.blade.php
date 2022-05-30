<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('assets/images/brand/favi.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}>
    <meta name=" author" content="LEFT4CODE">
    <title>@yield('title') - {{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}" />
</head>

<body class="login">
    <div class="container px-sm-10">
        <div class="grid columns-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="g-col-2 g-col-xl-1 d-none d-xl-flex flex-column min-vh-screen">
                <a href="" class="-intro-x d-flex align-items-center pt-5">
                    <img alt="{{ env('APP_DESC') }}" class="" src="{{ asset('assets/images/brand/logo.svg') }}">
                </a>
                <div class="my-auto">
                    <img alt="{{ env('APP_DESC') }}" class="-intro-x w-1/2 mt-n16"
                        src="/assets/images/svg/coin-light.svg">
                    <div class="-intro-x text-white fw-medium fs-4xl lh-base mt-10">
                        Welcome to {{ env('APP_NAME') }}
                        <br>
                        @yield('title')
                    </div>
                    <div class="-intro-x mt-5 fs-lg text-white text-opacity-70 dark-text-gray-500">
                        {{ env('APP_DESC') }}</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="g-col-2 g-col-xl-1 h-screen h-xl-auto d-flex py-5 py-xl-0 my-10 my-xl-0">
                @yield('form')
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <x-alert />
</body>

</html>
