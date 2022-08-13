@extends('layout.landing')
@section('title')
    Welcome to {{ env('APP_NAME') }}
@endsection
@section('content')
    <section class="hero-welcome-wrapper hero-1">
        <div class="single-slide text-white">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-12 col-lg-10 offset-lg-1 offset-xl-0">
                        <div class="hero-contents">
                            <h1 class="text-uppercase">Ultra-fast, decentralised blockchain network</h1>
                            <a href="https://play.google.com/store/apps/details?id=com.app.ctsecoin&hl=en&gl=US" class="app-download-btn"><img src="{{ asset('landing/img/android.png') }}"
                                    alt=""></a>
                            <div class="tri-arrow">
                                <img src="{{ asset('landing/img/icons/tir-shape.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-12 text-xl-end col-lg-10 offset-lg-1 offset-xl-0">
                        <div class="hero-mobile mt-5 mt-xl-0">
                            <img src="{{ asset('landing/image/phone.png') }}" alt="{{ env('APP_NAME') }} app">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-best-features-wrapper section-padding">
        <div class="container">
            <div class="col-xl-8 offset-xl-2 text-center">
                <div class="block-contents">
                    <div class="section-title">
                        <h2>{{ env('APP_NAME') }} is a new currency that happens to be digital.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="features-card-item style-1">
                        <div class="icon icon1">
                            <i class="icon-lock"></i>
                        </div>
                        <h3>Zero Fees</h3>
                        <p>It doesn't cost anything to send CTSE, making it practical and inclusive for all the world.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="features-card-item style-1">
                        <div class="icon icon2">
                            <i class="icon-chart-bar"></i>
                        </div>
                        <h3>Eco-Friendly</h3>
                        <p>Without relying on mining, printing or minting, CTSE is a sustainable solution to money.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="features-card-item style-1">
                        <div class="icon icon3">
                            <i class="icon-send-arrow"></i>
                        </div>
                        <h3>Instant Payment</h3>
                        <p>You don't have to wait to use digital currency, CTSE is ready when you are.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-block section-padding section-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 pe-lg-0 col-lg-5 col-12">
                    <div class="block-img wow fadeInLeft" data-wow-duration="1.1s">
                        <img src="{{ asset('landing/image/calculator.png') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 offset-xl-1 col-12 ps-lg-5 pe-xl-5">
                    <div class="block-contents ms-xl-3 mt-5 mt-lg-0">
                        <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <h2>Why CTSE? Benefits and Advantage</h2>
                        </div>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Just like the cash in
                            your pocket, choosing to transact with {{ env('APP_NAME') }} ensures that 100% of the
                            value is transferred
                            directly to the recipient.
                        </p>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Created to facilitate
                            both local and international payments, choosing to use {{ env('APP_NAME') }} makes moving
                            money across
                            borders effortless and feeless.</p>
                        <a href="{{ route('register') }}" class="theme-btn mt-30 wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".6s">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="crypto-currencies-wrapper fix section-black section-padding">
        <div class="container">
            <div class="col-lg-8 col-xl-6 offset-xl-3 col-12 offset-lg-2 text-center">
                <div class="block-contents text-white">
                    <div class="section-title wow fadeInUp" data-wow-duration="1s">
                        <h2>The most popular cryptocurrencies</h2>
                    </div>
                </div>
            </div>
            <div class="nice-arrow-icon d-none d-lg-block wow fadeInDown" data-wow-duration="1.2s">
                <img src="assets/img/icons/nice-arrow-down.svg" alt="">
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="currency-header">
                            <div class="icon icon1">
                                <i class="icon-bitcoin"></i>
                            </div>
                            <div class="currency-name">
                                <h6>Bitcoin (BTC)</h6>
                                <span>Cryptocurrency</span>
                            </div>
                        </div>
                        <div class="currency-info">
                            <p>Bitcoin is the most stable and least volatile digital currency. Bitcoin is considered an
                                excellent inflationary hedge.</p>
                        </div>
                        <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                            <div class="currency-rate">
                                <h5>${{ number_format(getRate("Bitcoin"),2) }}</h5>
                            </div>
                            <div class="currency-buy-now">
                                <a href="{{ route('register') }}">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="currency-header">
                            <div class="icon icon2">
                                <i class="icon-eth"></i>
                            </div>
                            <div class="currency-name">
                                <h6>Ethereum (ETH)</h6>
                                <span>Cryptocurrency</span>
                            </div>
                        </div>
                        <div class="currency-info">
                            <p>Ethereum is the largest and most well-established, open-ended decentralized software
                                platform.</p>
                        </div>
                        <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                            <div class="currency-rate">
                                <h5>${{ number_format(getRate("Ether"),2) }}</h5>
                            </div>
                            <div class="currency-buy-now">
                                <a href="{{ route('register') }}">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="currency-header">
                            <div class="icon icon5 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/images/coins/ctse.png') }}" alt="">
                            </div>
                            <div class="currency-name">
                                <h6>Cryptsence (CTSE)</h6>
                                <span>Cryptocurrency</span>
                            </div>
                        </div>
                        <div class="currency-info">
                            <p>Cryptsence is a new currency that happens to be digital, Cryptocurrency Platform. Simple,
                                Secure & Easy.</p>
                        </div>
                        <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                            <div class="currency-rate">
                                <h5>${{ number_format(options('coin_exchange_rate'), 4) }}</h5>
                            </div>
                            <div class="currency-buy-now">
                                <a href="{{ route('register') }}">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                        <div class="currency-header">
                            <div class="icon icon4">
                                <i class="icon-lcoin"></i>
                            </div>
                            <div class="currency-name">
                                <h6>Litecoin</h6>
                                <span>Cryptocurrency</span>
                            </div>
                        </div>
                        <div class="currency-info">
                            <p>Litecoin is the largest and most well-established, open-ended decentralized software
                                platform.</p>
                        </div>
                        <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                            <div class="currency-rate">
                                <h5>${{ number_format(getRate("Litecoin"),2) }}</h5>
                            </div>
                            <div class="currency-buy-now">
                                <a href="{{ route('register') }}">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="currency-header">
                            <div class="icon icon5">
                                <i class="icon-baincoin"></i>
                            </div>
                            <div class="currency-name">
                                <h6>Binance Coin (BNB)</h6>
                                <span>Cryptocurrency</span>
                            </div>
                        </div>
                        <div class="currency-info">
                            <p>As per our short-term BNB price prediction, the Binance coin can reach $1000 by the end
                                of the next year.</p>
                        </div>
                        <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                            <div class="currency-rate">
                                <h5>${{ number_format(getRate("BNB Coin (Mainnet)"),2) }}</h5>
                            </div>
                            <div class="currency-buy-now">
                                <a href="{{ route('register') }}">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-crypto-currency-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                        <div class="currency-header">
                            <div class="icon icon6">
                                <i class="icon-tcoin"></i>
                            </div>
                            <div class="currency-name">
                                <h6>Tether (USDT)</h6>
                                <span>Cryptocurrency</span>
                            </div>
                        </div>
                        <div class="currency-info">
                            <p>Create an account on the exchange, buy the Tether (USDT) crypto asset, and transfer it to
                                your crypto wallet.</p>
                        </div>
                        <div class="currency-rate-buy-btn d-flex align-items-center justify-content-between">
                            <div class="currency-rate">
                                <h5>${{ number_format(getRate("Tether USD (Tron/TRC20)"),2) }}</h5>
                            </div>
                            <div class="currency-buy-now">
                                <a href="{{ route('register') }}">Open Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-block fix faq-wrapper section-padding section-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-5 mt-5 mt-lg-0 order-2 order-lg-1">
                    <div class="block-contents">
                        <div class="section-title wow fadeInUp" data-wow-duration="1s">
                            <h2>Take full control of your CTSE app</h2>
                        </div>
                    </div>
                    <div class="step-accordion">
                        <div class="accordion" id="accordion">

                            <div class="accordion-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                        Download from the Play Store on any device
                                    </button>
                                </h4>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        You can easily download the CTSE app from the App Store or Google Play on any
                                        device
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".6s">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2" aria-expanded="true" aria-controls="faq2">
                                        Create an account with needful information
                                    </button>
                                </h4>
                                <div id="faq2" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        Open a secure account for yourself with your name and necessary information that
                                        need
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".9s">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                        Choose crypto & explore the world of crypto
                                    </button>
                                </h4>
                                <div id="faq3" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        Crypto transactions can be made easily, at low cost, and private than most other
                                        transactions.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 offset-xl-1 pe-xl-3 col-12 order-1 order-lg-2">
                    <div class="block-img ms-xl-5 wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".3s">
                        <img src="{{ asset('landing/image/control.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-banner-wrapper style-1 section-padding pt-0">
        <div class="container">
            <div class="cta-banner text-white">
                <div class="row">
                    <div class="col-xxl-6 text-center text-xxl-start offset-xxl-1">
                        <div class="cta-contents">
                            <h2 class="wow fadeInUp">Download & explore the our crypto world</h2>
                            <p class="wow fadeInUp" data-wow-delay=".3s">The most popular crypto app of today. In
                                which you can easily get in convenient to interest on sending and receiving money.</p>
                            <a href="https://play.google.com/store/apps/details?id=com.app.ctsecoin&hl=en&gl=US" class="app-download-btn wow fadeInUp" data-wow-delay=".8s"><img
                                    src="/landing/img/android.png" alt=""></a>
                            <div class="tri-arrow wow fadeInRight d-none d-md-inline-block" data-wow-delay="1s">
                                <img src="/landing/img/icons/tir-shape.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 pe-xxl-5">
                        <div class="cta-mobile-app wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.2">
                            <img src="{{ asset('landing/image/playstore.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
