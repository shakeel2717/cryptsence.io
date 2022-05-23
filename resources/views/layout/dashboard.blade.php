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
    <div class="mobile-menu d-md-none">
        <div class="mobile-menu-bar">
            <a href="" class="d-flex me-auto">
                <img alt="{{ env('APP_DESC') }}" class="" src="/assets/images/brand/logo.svg">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler" class="mobile-menu-bar__toggler"> <i
                    data-feather="bar-chart-2" class="w-8 h-8 text-white"></i> </a>
        </div>
        <ul class="mobile-menu-wrapper border-top border-theme-29 dark-border-dark-3 py-5">
            <x-layout.nav mode="0" />
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="d-flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x d-flex align-items-center ps-5 pt-4">
                <img alt="{{ env('APP_DESC') }}" class="w-40" src="/assets/images/brand/logo.svg">
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <x-layout.nav mode="1" />
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a
                        href="{{ route('user.index.index') }}">Hi, {{ auth()->user()->name }}
                        ({{ auth()->user()->username }})</a></div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown me-auto me-sm-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="bell"
                            class="notification__icon dark-text-gray-300"></i> </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title dark-text-gray-300">Notifications</div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-pill overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false" data-bs-toggle="dropdown">
                        <img alt="{{ env('APP_DESC') }}" src="/assets/images/profile-4.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-theme-26 dark-bg-dark-6 text-white">
                            <li class="p-2">
                                <div class="fw-medium text-white">{{ auth()->user()->name }}</div>
                                <div class="fs-xs text-theme-28 mt-0.5 dark-text-gray-600 text-uppercase">
                                    {{ auth()->user()->status }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-theme-27 dark-border-dark-3">
                            </li>
                            <li>
                                <a href="" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                                        data-feather="user" class="w-4 h-4 me-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                                        data-feather="lock" class="w-4 h-4 me-2"></i> Reset Password </a>
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
                                {{-- <a href="" class="dropdown-item text-white bg-theme-1-hover dark-bg-dark-3-hover"> <i
                                        data-feather="toggle-right" class="w-4 h-4 me-2"></i> Logout </a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <div class="intro-y d-flex flex-column flex-sm-row align-items-center mt-8">
                <h2 class="fs-lg fw-medium me-auto">
                    Tabulator
                </h2>
                <div class="w-full w-sm-auto d-flex mt-4 mt-sm-0">
                    <button class="btn btn-primary shadow-md me-2">Add New Product</button>
                    <div class="dropdown ms-auto ms-sm-0">
                        <button class="dropdown-toggle btn px-2 box text-gray-700 dark-text-gray-300"
                            aria-expanded="false" data-bs-toggle="dropdown">
                            <span class="w-5 h-5 d-flex align-items-center justify-content-center"> <i
                                    class="w-4 h-4" data-feather="plus"></i> </span>
                        </button>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item"> <i data-feather="file-plus"
                                            class="w-4 h-4 me-2"></i> New Category </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item"> <i data-feather="users"
                                            class="w-4 h-4 me-2"></i> New Group </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="d-flex flex-column flex-sm-row align-items-sm-end align-items-xl-start">
                    <form id="tabulator-html-filter-form" class="d-xl-flex me-sm-auto">
                        <div class="d-sm-flex align-items-center me-sm-4">
                            <label class="w-12 flex-none w-xl-auto flex-xl-initial me-2">Field</label>
                            <select id="tabulator-html-filter-field"
                                class="form-select w-full w-sm-32 w-2xl-full mt-2 mt-sm-0 w-sm-auto">
                                <option value="name">Name</option>
                                <option value="category">Category</option>
                                <option value="remaining_stock">Remaining Stock</option>
                            </select>
                        </div>
                        <div class="d-sm-flex align-items-center me-sm-4 mt-2 mt-xl-0">
                            <label class="w-12 flex-none w-xl-auto flex-xl-initial me-2">Type</label>
                            <select id="tabulator-html-filter-type" class="form-select w-full mt-2 mt-sm-0 w-sm-auto">
                                <option value="like" selected>like</option>
                                <option value="=">=</option>
                                <option value="<">&lt;</option>
                                <option value="<=">&lt;=</option>
                                <option value=">">></option>
                                <option value=">=">>=</option>
                                <option value="!=">!=</option>
                            </select>
                        </div>
                        <div class="d-sm-flex align-items-center me-sm-4 mt-2 mt-xl-0">
                            <label class="w-12 flex-none w-xl-auto flex-xl-initial me-2">Value</label>
                            <input id="tabulator-html-filter-value" type="text"
                                class="form-control w-sm-40 w-2xl-full mt-2 mt-sm-0" placeholder="Search...">
                        </div>
                        <div class="mt-2 mt-xl-0">
                            <button id="tabulator-html-filter-go" type="button"
                                class="btn btn-primary w-full w-sm-16">Go</button>
                            <button id="tabulator-html-filter-reset" type="button"
                                class="btn btn-secondary w-full w-sm-16 mt-2 mt-sm-0 ms-sm-1">Reset</button>
                        </div>
                    </form>
                    <div class="d-flex mt-5 mt-sm-0">
                        <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 w-sm-auto me-2"> <i
                                data-feather="printer" class="w-4 h-4 me-2"></i> Print </button>
                        <div class="dropdown w-1/2 w-sm-auto">
                            <button class="dropdown-toggle btn btn-outline-secondary w-full w-sm-auto"
                                aria-expanded="false" data-bs-toggle="dropdown"> <i data-feather="file-text"
                                    class="w-4 h-4 me-2"></i> Export <i data-feather="chevron-down"
                                    class="w-4 h-4 ms-auto ms-sm-2"></i> </button>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i
                                                data-feather="file-text" class="w-4 h-4 me-2"></i> Export CSV </a>
                                    </li>
                                    <li>
                                        <a id="tabulator-export-json" href="javascript:;" class="dropdown-item"> <i
                                                data-feather="file-text" class="w-4 h-4 me-2"></i> Export JSON </a>
                                    </li>
                                    <li>
                                        <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item"> <i
                                                data-feather="file-text" class="w-4 h-4 me-2"></i> Export XLSX </a>
                                    </li>
                                    <li>
                                        <a id="tabulator-export-html" href="javascript:;" class="dropdown-item"> <i
                                                data-feather="file-text" class="w-4 h-4 me-2"></i> Export HTML </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto scrollbar-hidden">
                    <div id="tabulator" class="mt-5 table-report table-report--tabulator"></div>
                </div>
            </div>
            <!-- END: HTML Table Data -->
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="/assets/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>
