<?php

namespace App\Http\Livewire\Admin;

use App\Models\admin\Option;
use App\Models\Log;
use Livewire\Component;

class AdminOptions extends Component
{
    public $coin_exchange_rate;
    public $min_convert_amount;
    public $min_convert_amount_for_commission;
    public $min_ctse_for_stake;
    public $ctse_stake_bonus_monthly;
    public $register_bonus_ctse;
    public $referral_bonus_ctse;
    public $withdraw_fees;



    public function mount()
    {
        $this->coin_exchange_rate = options("coin_exchange_rate");
        $this->min_convert_amount = options("min_convert_amount");
        $this->min_convert_amount_for_commission = options("min_convert_amount_for_commission");
        $this->min_ctse_for_stake = options("min_ctse_for_stake");
        $this->ctse_stake_bonus_monthly = options("ctse_stake_bonus_monthly");
        $this->register_bonus_ctse = options("register_bonus_ctse");
        $this->referral_bonus_ctse = options("referral_bonus_ctse");
        $this->withdraw_fees = options("withdraw_fees");
    }


    public function coin_exchange_rate()
    {
        $option = Option::where('name', 'coin_exchange_rate')->first();
        $option->value = $this->coin_exchange_rate;
        $option->save();

        logEntry('Website Options Updated', 'coin_exchange_rate Update to: ' . $this->coin_exchange_rate);
    }

    public function min_convert_amount()
    {
        $option = Option::where('name', 'min_convert_amount')->first();
        $option->value = $this->min_convert_amount;
        $option->save();
        logEntry('Website Options Updated', 'min_convert_amount Update to: ' . $this->min_convert_amount);

    }

    public function min_convert_amount_for_commission()
    {
        $option = Option::where('name', 'min_convert_amount_for_commission')->first();
        $option->value = $this->min_convert_amount_for_commission;
        $option->save();
        logEntry('Website Options Updated', 'min_convert_amount_for_commission Update to: ' . $this->min_convert_amount_for_commission);

    }

    public function min_ctse_for_stake()
    {
        $option = Option::where('name', 'min_ctse_for_stake')->first();
        $option->value = $this->min_ctse_for_stake;
        $option->save();
        logEntry('Website Options Updated', 'min_ctse_for_stake Update to: ' . $this->min_ctse_for_stake);

    }

    public function ctse_stake_bonus_monthly()
    {
        $option = Option::where('name', 'ctse_stake_bonus_monthly')->first();
        $option->value = $this->ctse_stake_bonus_monthly;
        $option->save();
        logEntry('Website Options Updated', 'ctse_stake_bonus_monthly Update to: ' . $this->ctse_stake_bonus_monthly);

    }


    public function register_bonus_ctse()
    {
        $option = Option::where('name', 'register_bonus_ctse')->first();
        $option->value = $this->register_bonus_ctse;
        $option->save();
        logEntry('Website Options Updated', 'register_bonus_ctse Update to: ' . $this->register_bonus_ctse);

    }


    public function referral_bonus_ctse()
    {
        $option = Option::where('name', 'referral_bonus_ctse')->first();
        $option->value = $this->referral_bonus_ctse;
        $option->save();
        logEntry('Website Options Updated', 'referral_bonus_ctse Update to: ' . $this->referral_bonus_ctse);

    }

    public function withdraw_fees()
    {
        $option = Option::where('name', 'withdraw_fees')->first();
        $option->value = $this->withdraw_fees;
        $option->save();
        logEntry('Website Options Updated', 'withdraw_fees Update to: ' . $this->withdraw_fees);

    }

    public function render()
    {
        return view('livewire.admin.admin-options');
    }
}
