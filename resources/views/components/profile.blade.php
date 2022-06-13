<div class="intro-y box px-5 pt-5 mt-5">
    <div class="d-flex flex-column flex-lg-row border-bottom border-gray-200 dark-border-dark-5 pb-5 mx-n5">
        <div class="d-flex flex-1 px-5 align-items-center justify-content-center justify-content-lg-start">
            <div class="w-20 h-20 w-sm-24 h-sm-24 flex-none w-lg-32 h-lg-32 image-fit position-relative">
                <img alt="{{ env('APP_DESC') }}" class="rounded-circle"
                    src="{{ asset('assets/images/brand/favi.svg') }}">
            </div>
            <div class="ms-5">
                <div class="w-24 w-sm-40 truncate white-space-sm-wrap fw-medium fs-lg">{{ auth()->user()->name }}</div>
                <div class="text-gray-600 text-uppercase">Status: {{ auth()->user()->status }}</div>
            </div>
        </div>
        <div
            class="mt-6 mt-lg-0 flex-1 dark-text-gray-300 px-5 border-start border-end border-gray-200 dark-border-dark-5 border-top border-top-lg-0 pt-5 pt-lg-0">
            <div class="fw-medium text-center text-lg-start mt-lg-3">Contact Details</div>
            <div class="d-flex flex-column justify-content-center align-items-center align-items-lg-start mt-4">
                <div class="truncate white-space-sm-normal d-flex align-items-center"> <i data-feather="mail"
                        class="w-4 h-4 me-2"></i> {{ auth()->user()->email ?? 'NO Email Found' }} </div>
                <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="phone-call"
                        class="w-4 h-4 me-2"></i> {{ auth()->user()->phone ?? 'No Phone Number' }} </div>
                <div class="truncate white-space-sm-normal d-flex align-items-center mt-3"> <i data-feather="map-pin"
                        class="w-4 h-4 me-2"></i> {{ auth()->user()->country ?? 'Unknown Country' }} </div>
            </div>
        </div>
        <div
            class="mt-6 mt-lg-0 flex-1 d-flex align-items-center justify-content-center px-5 border-top border-lg-0 border-gray-200 dark-border-dark-5 pt-5 pt-lg-0">
            <div class="text-center rounded-2 w-20 py-3">
                <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">{{ checkRefers(auth()->user()->id)->count() }}
                </div>
                <div class="text-gray-600">Total Refers</div>
            </div>
            <div class="text-center rounded-2 w-20 py-3">
                <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">{{ checkRefers(auth()->user()->id)->where('status','active')->count() }}</div>
                <div class="text-gray-600">Active</div>
            </div>
            <div class="text-center rounded-2 w-20 py-3">
                <div class="fw-medium text-theme-1 dark-text-theme-10 fs-xl">{{ checkRefers(auth()->user()->id)->where('status','pending')->count() }}</div>
                <div class="text-gray-600">Pending</div>
            </div>
        </div>
    </div>
    @if (auth()->user()->role == 'admin')
        <x-admin.profile-nav />
    @elseif (auth()->user()->role == 'user')
        <x-profile-nav />
    @endif
</div>
