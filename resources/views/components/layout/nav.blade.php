<li>
    <a href="{{ route('user.index.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Dashboard </div>
    </a>
</li>

<li>
    <a href="{{ route('user.payment.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Add Funds </div>
    </a>
</li>

<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="settings"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            My Account
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('user.profile.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> My Profile </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.password.change') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Change Password </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.recent.login') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Recent Login </div>
            </a>
        </li>
    </ul>
</li>
