<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('assets/images/brand/favi.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="author" content="ASAN Webs Development">
    <title>@yield('title') - {{ env('APP_NAME') }} - {{ env('APP_DESC') }}</title>
    <link rel="stylesheet" href="{{ asset('landing/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/metismenu.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/style.css') }}">
</head>

<body class="body-wrapper">
    <header class="header-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-2 col-sm-5 col-md-4 col-6">
                    <div class="logo">
                        <a href="index-2.html">
                            <img src="{{ asset('assets/images/brand/logo.svg') }}" alt="Transland">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 text-end p-lg-0 d-none d-lg-flex justify-content-between align-items-center">
                    <div class="menu-wrap">
                        <div class="main-menu">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('user.index.index') }}">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right-element text-white">
                        <a href="{{ route('login') }}">login</a>
                        <a href="{{ route('register') }}" class="theme-btn black">Buy CTSE</a>
                    </div>
                </div>
                <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                    <div class="mobile-nav-wrap">
                        <div id="hamburger"><i class="fal fa-bars"></i></div>
                        <!-- mobile menu - responsive menu  -->
                        <div class="mobile-nav">
                            <button type="button" class="close-nav">
                                <i class="fal fa-times-circle"></i>
                            </button>
                            <nav class="sidebar-nav">
                                <ul class="metismenu" id="mobile-menu">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('user.index.index') }}">Dashboard</a></li>
                                </ul>
                                <a href="{{ route('register') }}" class="theme-btn d-block mt-4 text-center ms-0">Buy CTSE</a>
                            </nav>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </header>

   @yield('content')

    <footer class="footer-wrapper footer-1">
        {{-- <div class="footer-widgets-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="single-footer-widget wow fadeInLeft">
                            <div class="about-us-widget">
                                <a href="index-2.html" class="footer-logo d-block">
                                    <img src="{{ asset('assets/images/brand/logo.svg') }}"
                                        alt="{{ env('APP_NAME') }}">
                                </a>
                                <p>{{ env('APP_NAME') }} Created to facilitate both local and international payments,
                                    choosing to use {{ env('APP_NAME') }} makes moving money across borders
                                    effortless and feeless..</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 offset-xl-1 col-md-6 col-12">
                        <div class="single-footer-widget wow fadeInLeft" data-wow-delay=".6s">
                            <div class="widget-title">
                                <h5>Useful Links</h5>
                            </div>
                            <ul>
                                <li><a href="{{ route('user.index.index') }}">Dashboard</a></li>
                                <li><a href="{{ route('register') }}">Create Account</a></li>
                                <li><a href="{{ route('user.convert.index') }}">Stack CTSE</a></li>
                                <li><a href="{{ route('user.sell.index') }}">Sell CTSE</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="footer-bottom-wrapper">
            <div class="container">
                <div class="footer-bottom-content d-md-flex justify-content-between">
                    <div class="site-copyright wow fadeInUp" data-wow-delay=".2" data-wow-duration="1s">
                        <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
                            All Rights Reserved.</p>
                    </div>
                    <div class="social-links mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".3" data-wow-duration="1s">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--  ALl JS Plugins
    ====================================== -->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/js/imageload.min.js') }}"></script>
    <script src="{{ asset('landing/js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('landing/js/slick.min.js') }}"></script>
    <script src="{{ asset('landing/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('landing/js/metismenu.js') }}"></script>
    <script src="{{ asset('landing/js/active.js') }}"></script>
</body>

</html>
