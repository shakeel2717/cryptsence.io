<div>
    <div class="intro-y box g-col-12 g-col-lg-6 mt-5">
        <div class="d-flex align-items-center px-5 py-5 py-sm-3 border-bottom border-gray-200 dark-border-dark-5">
            <h2 class="fw-medium fs-base me-auto">
                Website Setting
            </h2>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Coin Price</a>
                    <div class="text-gray-600 me-5 me-sm-5">Change or Update Coin Price</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='coin_exchange_rate' wire:change='coin_exchange_rate' type="text"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Min Convert USDT Limit</a>
                    <div class="text-gray-600 me-5 me-sm-5">Select Min USDT Convert Limit</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='min_convert_amount' wire:change='min_convert_amount' type="text"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Min USDT Convert Amount for Commission</a>
                    <div class="text-gray-600 me-5 me-sm-5">Min USDT Convert Amount for Upliner Commission</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='min_convert_amount_for_commission'
                        wire:change='min_convert_amount_for_commission' type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Min CTSE for Stake</a>
                    <div class="text-gray-600 me-5 me-sm-5">Select Min CTSE for Stake</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='min_ctse_for_stake' wire:change='min_ctse_for_stake' type="text"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Staking Bonus Monthly</a>
                    <div class="text-gray-600 me-5 me-sm-5">Select Staking Bonus Monthly</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='ctse_stake_bonus_monthly' wire:change='ctse_stake_bonus_monthly' type="text"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Sign up Reward</a>
                    <div class="text-gray-600 me-5 me-sm-5">Select Bonus Amount for new Account</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='register_bonus_ctse' wire:change='register_bonus_ctse' type="text"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Referral Commission</a>
                    <div class="text-gray-600 me-5 me-sm-5">Select Referral Reward for Upliner</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='referral_bonus_ctse' wire:change='referral_bonus_ctse' type="text"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="position-relative d-flex align-items-center">

                <div class="ms-4 me-auto">
                    <a href="" class="fw-medium">Withdraw Fees</a>
                    <div class="text-gray-600 me-5 me-sm-5">Select Withdraw Fees for Users</div>
                </div>
                <div class="fw-medium text-gray-700 dark-text-gray-500">
                    <input wire:model='withdraw_fees' wire:change='withdraw_fees' type="text" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
