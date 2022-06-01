<li>
    <a href="{{ route('user.index.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="airplay"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Dashboard </div>
    </a>
</li>

<li>
    <a href="{{ route('user.payment.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="dollar-sign"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Add Funds </div>
    </a>
</li>

<li>
    <a href="{{ route('user.withdraw.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="dollar-sign"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Withdraw Fund </div>
    </a>
</li>

<li>
    <a href="{{ route('user.calculator.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="slack"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Stacking Calculator </div>
    </a>
</li>

<li>
    <a href="{{ route('user.convert.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="shopping-cart"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Get CTSE </div>
    </a>
</li>

<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="file-text"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Finance Report
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('user.report.transactions.recent') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Recent Transactions </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.report.transactions.allStackingBounces') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Stacking Rewards </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.report.transactions.deposits') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Deposits </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.report.transactions.withdrawals') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Withdrawals </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.report.transactions.convert') }}"
            class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All convert </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.report.transactions.allRefers') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Referrals </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.report.transactions.allRewards') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Rewards </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.notification.index') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Notifications </div>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="sliders"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            My Account
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('user.profile.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> My Profile </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.password.change') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Change Password </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.recent.login') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Recent Login </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.google.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Google Authentication </div>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="repeat"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Exchange </div>
    </a>
</li>
