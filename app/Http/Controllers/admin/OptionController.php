<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function priceUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|digits_between:0.001,10',
            'min_convert_amount' => 'required|digits_between:1,10000',
            'min_ctse_for_stake' => 'required|digits_between:1,10000000',
            'ctse_stake_bonus_monthly' => 'required|digits_between:1,100',
            'register_bonus_ctse' => 'required|digits_between:1,100',
            'referral_bonus_ctse' => 'required|digits_between:1,100',
            'min_convert_amount_for_commission' => 'required|digits_between:1,100',
            'withdraw_fees' => 'required|digits_between:1,100',
            'register_bonus_ctse' => 'required|digits_between:1,100',
            'register_bonus_ctse' => 'required|digits_between:1,100',
        ]);


        $option = Option::where('name', 'coin_exchange_rate')->firstOrFail();
        $option->value = $validatedData['price'];
        $option->save();

        logEntry('Price Update', 'Admin has updated the price of the coin exchange');

        $option = Option::where('name', 'min_convert_amount')->firstOrFail();
        $option->value = $validatedData['min_convert_amount'];
        $option->save();

        $option = Option::where('name', 'min_ctse_for_stake')->firstOrFail();
        $option->value = $validatedData['min_ctse_for_stake'];
        $option->save();

        $option = Option::where('name', 'ctse_stake_bonus_monthly')->firstOrFail();
        $option->value = $validatedData['ctse_stake_bonus_monthly'];
        $option->save();

        $option = Option::where('name', 'register_bonus_ctse')->firstOrFail();
        $option->value = $validatedData['register_bonus_ctse'];
        $option->save();

        $option = Option::where('name', 'referral_bonus_ctse')->firstOrFail();
        $option->value = $validatedData['referral_bonus_ctse'];
        $option->save();

        $option = Option::where('name', 'min_convert_amount_for_commission')->firstOrFail();
        $option->value = $validatedData['min_convert_amount_for_commission'];
        $option->save();

        $option = Option::where('name', 'withdraw_fees')->firstOrFail();
        $option->value = $validatedData['withdraw_fees'];
        $option->save();

        logEntry('Price Update', 'Admin has updated Min convert amount');

        return redirect()->back()->with('success', 'Price updated successfully');
    }
}
