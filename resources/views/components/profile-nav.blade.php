<ul class="nav nav-link-tabs flex-column flex-sm-row justify-content-center justify-content-lg-start" role="tablist">
    <li id="profile-tab" class="nav-item" role="presentation">
        <a href="{{ route('user.profile.index') }}" class="nav-link px-0 me-sm-8 d-flex align-items-center active">
            <i class="w-4 h-4 me-2" data-feather="user"></i> My Profile </a>
    </li>
    <li id="account-tab" class="nav-item" role="presentation">
        <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center">
            <i class="w-4 h-4 me-2" data-feather="shield"></i> Account </a>
    </li>
    <li id="change-password-tab" class="nav-item" role="presentation">
        <a href="{{ route('user.profile.password.change') }}" class="nav-link px-0 me-sm-8 d-flex align-items-center">
            <i class="w-4 h-4 me-2" data-feather="lock"></i> Change Password </a>
    </li>
    <li id="settings-tab" class="nav-item" role="presentation">
        <a href="javascript:;" class="nav-link px-0 me-sm-8 d-flex align-items-center">
            <i class="w-4 h-4 me-2" data-feather="settings"></i> Settings </a>
    </li>
</ul>
