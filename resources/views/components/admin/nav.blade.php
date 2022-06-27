<li>
    <a href="{{ route('admin.index.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Dashboard </div>
    </a>
</li>

<li>
    <a href="{{ route('admin.finance.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Add Funds </div>
    </a>
</li>


<li>
    <a href="{{ route('admin.logentry.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Log Entry </div>
    </a>
</li>

<li>
    <a href="{{ route('admin.report.users') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Users </div>
    </a>
</li>

<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="sliders"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            NFT
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="sliders"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
                    NFT Category
                    <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i
                            data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.nft_category.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">All Categories</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.nft_category.create') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">Add new Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="sliders"></i> </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
                    NFT's
                    <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i
                            data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('admin.nft.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">All NFT's</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.nft.create') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i> </div>
                        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">Add new NFT</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>


<li>
    <a href="{{ route('admin.report.kyc') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> KYC Request </div>
    </a>
</li>


<li>
    <a href="{{ route('admin.report.withdrawals.pending') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Pending Withdraw </div>
    </a>
</li>


<li>
    <a href="{{ route('admin.report.withdrawals.approve') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="inbox"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Approved Withdraw </div>
    </a>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="coffee"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Policy Manager
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.policy.create') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Add new Policy </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.policy.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> View all Polices </div>
            </a>
        </li>
    </ul>
</li>



<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="coffee"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Tour Winner
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.report.tour.self') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Self Sell Winner </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.report.tour.direct') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Direct Sell Winner </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.report.tour.levels') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Level Wise Winner </div>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="file"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Admin Deposit
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.deposit.usdt') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Admin Deposit USDT </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.deposit.ctse') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Admin Deposit CTSE </div>
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="file"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Expense Manager
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.expense.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Expenses </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.expense.create') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Add new Expense </div>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="file"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Shakeel Expense
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.shakeel.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Expenses </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.shakeel.create') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Add new Expense </div>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="list"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Coin Payments
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.payment.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Transactions </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.payment.pending') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Pending Transactions </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.payment.complete') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Complete Transactions </div>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="list"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            Finance History
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.report.deposits') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Deposits </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.report.allStackingBounces') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Stacking Rewards </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.report.withdrawals') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Withdrawals </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.report.convert') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> All Convert </div>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="settings"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title">
            My Account
            <div class="{{ $mode == true ? 'side-' : '' }}menu__sub-icon"> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </a>
    <ul class="{{ $mode == true ? 'side-' : '' }}menu__sub">
        <li>
            <a href="{{ route('admin.profile.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> My Profile </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.profile.password.change') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Change Password </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.profile.recent.login') }}"
                class="{{ $mode == true ? 'side-' : '' }}menu">
                <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i
                        data-feather="corner-down-right"></i>
                </div>
                <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Recent Login </div>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="{{ route('admin.option.index') }}" class="{{ $mode == true ? 'side-' : '' }}menu">
        <div class="{{ $mode == true ? 'side-' : '' }}menu__icon"> <i data-feather="settings"></i> </div>
        <div class="{{ $mode == true ? 'side-' : '' }}menu__title"> Website Configuration </div>
    </a>
</li>
