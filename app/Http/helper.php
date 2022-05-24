<?php

use App\Models\Coin;
use App\Models\User;
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

    $in = Transaction::where('user_id', $user_id)->where('currency', $method)->where('sum', 'in')->sum('amount');
    $out = Transaction::where('user_id', $user_id)->where('currency', $method)->where('sum', 'out')->sum('amount');
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



function edie($message)
{
    // store this message into log
    Log::info($message);
    die();
}
