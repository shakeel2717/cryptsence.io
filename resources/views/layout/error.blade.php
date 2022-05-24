<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="/assets/images/brand/favi.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="author" content="ASAN Webs Development">
    <title>@yield('title') - {{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <link rel="stylesheet" href="/assets/css/app.css" />
</head>

<body class="main">
    <div class="container">
        <div
            class="error-page d-flex flex-column flex-lg-row align-items-center justify-content-center h-screen text-center text-lg-start">
            <div class="-intro-x me-lg-20">
                <img alt="Rubick Bootstrap HTML Admin Template" class="h-48 h-lg-auto"
                    src="/assets/images/svg/coin-light.svg">
            </div>
            <div class="text-white mt-10 mt-lg-0">
                <div class="intro-x fs-8xl fw-medium">404</div>
                <div class="intro-x fs-xl fs-lg-3xl fw-medium mt-5">Oops. This page has gone missing.</div>
                <div class="intro-x fs-lg mt-3">You may have mistyped the address or the page may have moved.</div>
                <a href="{{ route('user.index.index') }}"
                    class="intro-x btn py-3 px-4 text-white border-white dark-border-dark-5 dark-text-gray-300 mt-10">Back
                    to Home</a>
            </div>
        </div>
    </div>
    <script src="/assets/js/app.js"></script>
</body>

</html>
