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
</head>

<body class="main">
    <div class="container">
        <div
            class="error-page d-flex flex-column flex-lg-row align-items-center justify-content-center h-screen text-center text-lg-start">
            <div class="-intro-x me-lg-20">
                <img alt="Rubick Bootstrap HTML Admin Template" class="h-48 h-lg-auto"
                    src="{{ asset('assets/images/svg/coin-dark.svg') }}">
            </div>
            <div class="text-white mt-10 mt-lg-0">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
