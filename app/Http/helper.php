<?php

use App\Models\admin\Option;
use App\Models\admin\Shakeel;
use App\Models\BonusPolicy;
use App\Models\Coin;
use App\Models\Expense;
use App\Models\LiveRate;
use App\Models\Log as ModelsLog;
use App\Models\NftBonus;
use App\Models\NftPromotionDiscount;
use App\Models\Subscription;
use App\Models\User;
use App\Models\user\StakingBonus;
use App\Models\user\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Str;


function balance($method, $user_id)
{
    // checking if method is valid
    $coin = Coin::where('symbol', $method)->firstOrFail();
    if (!$coin) {
        return 0;
    }

    $in = Transaction::where('user_id', $user_id)
        ->where('coin_id', $coin->id)
        ->where('type', '!=', 'reward')
        ->where('sum', 'in')->sum('amount');
    $out = Transaction::where('user_id', $user_id)
        ->where('coin_id', $coin->id)
        ->where('type', '!=', 'reward')
        ->where('sum', 'out')->sum('amount');
    return $in - $out;
}


function balanceIn($method, $user_id)
{
    // checking if method is valid
    $coin = Coin::where('symbol', $method)->firstOrFail();
    if (!$coin) {
        return 0;
    }

    $in = Transaction::where('user_id', $user_id)->where('coin_id', $coin->id)->where('sum', 'in')->sum('amount');
    return $in;
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
    // checking if both are numbers
    if (!is_numeric($amount) || !is_numeric($duration)) {
        return 0;
    }
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

function myReferrals($user_id)
{
    $user = User::find($user_id);
    $refers = User::where('refer', $user->username)->count();
    return $refers;
}


function myPurchase($user_id)
{
    $out = Transaction::where('user_id', $user_id)->where('type', 'convert')->where('coin_id', 1)->where('sum', 'out')->sum('amount');
    return $out;
}


function myPurchaseDirectSellUnderFivek($user_id)
{
    $directSell = 0;
    $user = User::find($user_id);
    $refers = User::where('refer', $user->username)->where('status', 'active')->where('winner', true)->get();
    foreach ($refers as $refer) {
        $business = myPurchase($refer->id);
        if ($business < 4999) {
            $directSell += $business;
        }
    }
    return $directSell;
}


function levelsSellUnderFivek($user_id)
{
    $business = 0;
    $user = User::find($user_id);
    $directRefers = User::where('refer', $user->username)->where('status', 'active')->where('winner', true)->get();
    foreach ($directRefers as $directRefer) {
        $firstLevelRefers = User::where('refer', $directRefer->username)->where('status', 'active')->where('winner', true)->get();
        foreach ($firstLevelRefers as $firstLevelRefer) {
            if (myPurchase($firstLevelRefer->id) < 5000) {
                $business += myPurchase($firstLevelRefer->id);
            }
            $secondLevelRefers = User::where('refer', $firstLevelRefer->username)->where('status', 'active')->where('winner', true)->get();
            foreach ($secondLevelRefers as $secondLevelRefer) {
                if (myPurchase($secondLevelRefer->id) < 5000) {
                    $business += myPurchase($secondLevelRefer->id);
                }
                $thirdLevelRefers = User::where('refer', $secondLevelRefer->username)->where('status', 'active')->where('winner', true)->get();
                foreach ($thirdLevelRefers as $thirdLevelRefer) {
                    if (myPurchase($thirdLevelRefer->id) < 5000) {
                        $business += myPurchase($thirdLevelRefer->id);
                    }
                }
            }
        }
    }
    return $business;
}


function myReferralsRewards($user_id)
{
    $user = User::find($user_id);
    $transaction = Transaction::where('user_id', auth()->user()->id)->where('type', 'reward')->where('sum', 'in')->sum('amount');
    return $transaction;
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


function GetTodayActivePolicy()
{
    $policies = BonusPolicy::get();
    $policyPure = [];
    foreach ($policies as $policy) {
        $st_date = $policy->start_date;
        $end_date = $policy->end_date;
        $today = date('Y-m-d');
        $today = date('Y-m-d');
        $today = date('Y-m-d', strtotime($today));
        $contractDateBegin = date('Y-m-d', strtotime($st_date));
        $contractDateEnd = date('Y-m-d', strtotime($end_date));

        if (($today >= $contractDateBegin) && ($today <= $contractDateEnd)) {
            $policyPure[] = $policy->id;
        }
    }
    return $policyPure;
}


function adminDeposit($coin_id)
{
    $in = Transaction::where('type', 'deposit')->where('note', 'binance payment gateway')->where('coin_id', $coin_id)->where('sum', 'in')->sum('amount');
    return $in;
}



function coinPaymentDeposit()
{
    $in = Transaction::where('type', 'deposit')->where('note', 'coinPayment Gateway')->where('sum', 'in')->sum('amount');
    return $in;
}


function ReferralBalance($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)
        ->where('type', 'reward')
        ->where('sum', 'in')
        ->sum('amount');

    $transactionOut = Transaction::where('user_id', $user_id)
        ->where('type', 'reward')
        ->where('sum', 'out')
        ->sum('amount');
    return $transaction - $transactionOut;
}



function ReferralsDirect($user_id)
{
    $amount = 0;
    $user = User::find($user_id);
    // getting all downline users
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $amount += myPurchase($refer->id);
        $refers1 = User::where('refer', $refer->username)->get();
    }
    return $amount;
}


function ReferralsFirstLevel($user_id)
{
    $amount = 0;
    $user = User::find($user_id);
    // getting all downline users
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers1 = User::where('refer', $refer->username)->get();
        foreach ($refers1 as $refer1) {
            $amount += myPurchase($refer1->id);
        }
    }
    return $amount;
}

function ReferralsSecondLevel($user_id)
{
    $amount = 0;
    $user = User::find($user_id);
    // getting all downline users
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers1 = User::where('refer', $refer->username)->get();
        foreach ($refers1 as $refer1) {
            $refers2 = User::where('refer', $refer1->username)->get();
            foreach ($refers2 as $refer2) {
                $amount += myPurchase($refer2->id);
            }
        }
    }
    return $amount;
}

function ReferralsThirdLevel($user_id)
{
    $amount = 0;
    $user = User::find($user_id);
    // getting all downline users
    $refers = User::where('refer', $user->username)->get();
    foreach ($refers as $refer) {
        $refers1 = User::where('refer', $refer->username)->get();
        foreach ($refers1 as $refer1) {
            $refers2 = User::where('refer', $refer1->username)->get();
            foreach ($refers2 as $refer2) {
                $refers3 = User::where('refer', $refer2->username)->get();
                foreach ($refers3 as $refer3) {
                    $amount += myPurchase($refer3->id);
                }
            }
        }
    }
    return $amount;
}


function ReferralsRewardsLevel($user_id)
{
    return ReferralsFirstLevel($user_id) + ReferralsSecondLevel($user_id) + ReferralsThirdLevel($user_id);
}


function getRate($coin)
{
    // getting live rates from database
    $rate = LiveRate::where('name', $coin)->first();
    return $rate->price;
}


function expenseManager()
{
    return Expense::sum('amount');
}


function shakeelExpenseManager()
{
    return Shakeel::sum('amount');
}

function nftBouns($user_id, $subscriptionId)
{
    $in = NftBonus::where('user_id', $user_id)->where('subscription_id', $subscriptionId)->where('sum', 'in')->sum('amount');
    return $in;
}


function nftProfitBalance($user_id)
{
    $in = NftBonus::where('user_id', $user_id)->where('sum', 'in')->sum('amount');
    $out = NftBonus::where('user_id', $user_id)->where('sum', 'out')->sum('amount');
    return $in - $out;
}


function solidNfts($nft_id)
{
    $subscriptions = Subscription::where('type', 'nft')->where('nft_id', $nft_id)->get();
    if (count($subscriptions) > 0) {
        return true;
    }
    return false;
}


function NftCount($user_id, $category)
{
    $subscriptions = Subscription::where('user_id', $user_id)
        ->where('user_id', $user_id)
        ->where('type', 'nft')
        ->where('status', true)
        ->get();

    // checking if this is from $category nft
    $count = 0;
    foreach ($subscriptions as $subscription) {
        if ($subscription->nft->nft_category->id == $category) {
            $count++;
        }
    }
    return $count;
}


function totalInvestInNFT($user_id)
{
    $subscriptions = Subscription::where('user_id', $user_id)
        ->where('user_id', $user_id)
        ->where('type', 'nft')
        ->where('status', true)
        ->get();
    $count = 0;
    foreach ($subscriptions as $subscription) {
        $count += $subscription->nft->nft_category->price;
    }

    return $count;
}


function directReward($user_id)
{
    // getting this user first Level Reward
    $user = User::find($user_id);
    if (!$user) {
        return 0;
    }

    // $firstLevelRefer = User::where('username', $user->refer)->first();
    // if (!$firstLevelRefer) {
    //     return 0;
    // }

    $tansactions = Transaction::where('note', $user->username)->where('reference', 'direct reward')->sum('amount');
    return $tansactions;
}

function firstLevelReward($user_id)
{
    // getting this user first Level Reward
    $user = User::find($user_id);
    if (!$user) {
        return 0;
    }

    $tansactions = Transaction::where('note', $user->username)->where('reference', '1st level reward')->sum('amount');
    return $tansactions;
}


function secondLevelReward($user_id)
{
    // getting this user first Level Reward
    $user = User::find($user_id);
    if (!$user) {
        return 0;
    }

    $tansactions = Transaction::where('note', $user->username)->where('reference', '2nd level reward')->sum('amount');
    return $user_id;
}


function thirdLevelReward($user_id)
{
    // getting this user first Level Reward
    $user = User::find($user_id);
    if (!$user) {
        return 0;
    }

    $tansactions = Transaction::where('note', $user->username)->where('reference', '3rd level reward')->sum('amount');
    return $tansactions;
}


function nftOffer()
{
    $nftOffer = NftPromotionDiscount::where('status', true)->first();
    if (!$nftOffer) {
        return 0;
    }
    return $nftOffer;
}


function addressGenerate()
{
    $address = "CTSE" . strtoupper(Str::random(25));
    // checking if this user already in database
    $user = User::where('address', $address)->get();
    if ($user->count() > 0) {
        addressGenerate();
    }
    return $address;
}


function cryptsenceReceived()
{
    $in = Transaction::where('type','received')
        ->where('sum', 'in')->sum('amount');
    return $in;
}

function cryptsenceReceivedCount()
{
    $in = Transaction::where('type','received')
        ->where('sum', 'in')->count();
    return $in;
}