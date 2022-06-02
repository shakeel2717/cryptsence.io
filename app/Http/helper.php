<?php

use App\Models\admin\Option;
use App\Models\Coin;
use App\Models\Log as ModelsLog;
use App\Models\User;
use App\Models\user\StakingBonus;
use App\Models\user\Transaction;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;


function balance($method, $user_id)
{
    // checking if method is valid
    $coin = Coin::where('symbol', $method)->firstOrFail();
    if (!$coin) {
        return 0;
    }

    $in = Transaction::where('user_id', $user_id)->where('coin_id', $coin->id)->where('sum', 'in')->sum('amount');
    $out = Transaction::where('user_id', $user_id)->where('coin_id', $coin->id)->where('sum', 'out')->sum('amount');
    return $in - $out;
}


function random($qtd)
{
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;
    $Hash = NULL;
    for ($x = 1; $x <= $qtd; $x++) {
        $Posicao = rand(0, $QuantidadeCaracteres);
        $Hash .= substr($Caracteres, $Posicao, 1);
    }
    return strtoupper("ctse_" . $Hash);
}

function stakeBounsAll($method, $user_id)
{
    // checking if method is valid
    $coin = Coin::where('symbol', $method)->firstOrFail();
    if (!$coin) {
        return 0;
    }

    $in = StakingBonus::where('user_id', $user_id)->where('sum', 'in')->sum('amount');
    $out = StakingBonus::where('user_id', $user_id)->where('sum', 'out')->sum('amount');
    return $in - $out;
}


function getDevice()
{
    if (Agent::isDesktop()) {
        return 'Desktop';
    } elseif (Agent::isPhone()) {
        return 'Phone';
    } elseif (Agent::isTablet()) {
        return 'Tablet';
    } else {
        return 'Unknown';
    }
}



function options($name)
{
    $option = Option::where('name', $name)->first();
    if ($option) {
        return $option->value;
    } else {
        return false;
    }
}



function edie($message)
{
    // store this message into log
    Log::info($message);
    die();
}


function logEntry($type, $message)
{
    $log = new ModelsLog();
    $log->type = $type;
    $log->message = $message;
    $log->save();
}


function calculator($amount, $duration)
{
    for ($i = 0; $i < $duration; $i++) {
        $new = continueCalculator($amount);
        $amount = $amount + $new;
    }
    return $amount;
}

function continueCalculator($amount)
{
    $profitMonthly = Option::where('name', 'ctse_stake_bonus_monthly')->first()->value;
    $profitDaily = ($amount * $profitMonthly / 100) / 30;
    return $profitDaily;
}


function validateStaking($user_id)
{
    $user = User::find($user_id);
    $staking_requirement = options('register_bonus_ctse');

    $convertTransactions = Transaction::where('user_id', $user_id)->where('type', 'convert')->sum('amount');
    if ($convertTransactions < $staking_requirement) {
        return false;
    } else {
        return true;
    }
}


function checkRefers($user_id)
{
    $user = User::findOrFail($user_id);
    $refer = User::where('refer', $user->username)->get();
    return $refer;
}


function allUsersBalance($method)
{
    $amount = 0;
    $users = User::get();
    foreach ($users as $user) {
        $amount += balance($method, $user->id);
    }

    return $amount;
}

function allUsersConvertedCoin($coin_id)
{
    $in = Transaction::where('type', 'convert')->where('coin_id', $coin_id)->where('sum', 'in')->sum('amount');
    return $in;
}

function allUsersConvertedOutCoin($coin_id)
{
    $in = Transaction::where('type', 'convert')->where('coin_id', $coin_id)->where('sum', 'out')->sum('amount');
    return $in;
}

function allUserDeposit($coin_id)
{
    $in = Transaction::where('type', 'deposit')->where('coin_id', $coin_id)->where('sum', 'in')->sum('amount');
    return $in;
}
