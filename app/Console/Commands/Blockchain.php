<?php

namespace App\Console\Commands;

use App\Models\admin\Option;
use App\Models\NftBonus;
use App\Models\Subscription;
use App\Models\User;
use App\Models\user\StakingBonus;
use App\Models\user\Transaction;
use App\Models\user\UserNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Blockchain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blockchain:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Staking Information';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Log::info('Blockchain Command Start: ' . now());
        // // getting all users
        // $users = User::get();

        // // looping through users
        // foreach ($users as $user) {
        //     $balance = balance('CTSE', $user->id) + stakeBounsAll('CTSE', $user->id);
        //     if ($balance > 0) {
        //         // checking if this user fullfill the staking requirement

        //         $staking_requirement = options('register_bonus_ctse');

        //         $convertTransactions = Transaction::where('user_id', $user->id)->where('type', 'convert')->sum('amount');
        //         if ($convertTransactions < $staking_requirement) {
        //             Log::info('User ' . $user->username . ' not fullfill the staking requirement');
        //             goto endStakeBouns;
        //         }

        //         Log::info('User: ' . $user->username . ' has ' . $balance . ' CTSE');
        //         // delivering the Staking Profit
        //         $monthlyProfit = Option::where('name', 'ctse_stake_bonus_monthly')->firstOrFail();
        //         Log::info('Current Profit Monthly for user: ' . $user->username . ' has ' . $monthlyProfit->value . ' %');
        //         // get the profit for 1 month
        //         $profit = $balance * ($monthlyProfit->value / 100);
        //         Log::info('Profit for 1 month for user: ' . $user->username . ' has ' . $profit);
        //         // get this profit for 1 day
        //         $profitDay = ($profit / 30);
        //         Log::info('Profit for 1 day for user: ' . $user->username . ' has ' . $profitDay);

        //         // checking if this user has already got staking bonus
        //         $stakingBonus = StakingBonus::where('user_id', $user->id)
        //             ->whereDate('created_at', date('Y-m-d'))
        //             ->get();
        //         if ($stakingBonus->count() > 0) {
        //             Log::info('User ' . $user->username . ' already got staking Reward');
        //             goto endStakeBouns;
        //         }

        //         $stakingBonus = new StakingBonus();
        //         $stakingBonus->user_id = $user->id;
        //         $stakingBonus->sum = "in";
        //         $stakingBonus->status = "approved";
        //         $stakingBonus->amount = $profitDay;
        //         $stakingBonus->stake_amount = $balance;
        //         $stakingBonus->note = "Blockchain";
        //         $stakingBonus->save();

        //         // inserting notification
        //         $notification = new UserNotification();
        //         $notification->user_id = $user->id;
        //         $notification->type = 'award';
        //         $notification->title = 'Staking Bonus';
        //         $notification->content = 'You have received ' . $profitDay . ' CTSE for your staking';
        //         $notification->save();

        //         Log::info('Staking Reward for user: ' . $user->username . ' has ' . $profitDay . ' Delivered Successfully');
        //         endStakeBouns:
        //     }
        // }


        // // Running Script to Update the rate
        // Log::info('Run Rate Update');

        // $monthlyRateUpdate = 10;
        // $currentRate = options("coin_exchange_rate");
        // $newRate = $currentRate * $monthlyRateUpdate / 100;
        // $rate = $newRate / 30;

        // $ctseRate = Option::where('name', 'coin_exchange_rate')->first();

        // // checking if this rate is already updated today
        // if ($ctseRate->updated_at->format('Y-m-d') == date('Y-m-d')) {
        //     Log::info('Rate Already Updated');
        //     goto endRate;
        // }

        // $ctseRate->value += $rate;
        // $ctseRate->save();

        // Log::info('Rate Update');
        // endRate:


        // NFT Blockchian Run
        Log::info('NFT Started!');
        // getting all users who have NFT
        $subscriptions = Subscription::where('status', true)->get();
        foreach ($subscriptions as $subscription) {
            Log::info('Active Subscription\'s NFT Found, User: ' . $subscription->user->username);
            // delivering the NFT Profit.
            $proifitRatio = $subscription->nft->profit;
            Log::info('Daily ROI Ratio: ' . $subscription->nft->profit);
            // get current price of CTSE
            $ctsePrice = options('coin_exchange_rate');
            $profit = $subscription->nft->price / $ctsePrice;
            $perMonthProfit = $profit * $subscription->nft->profit / 100;
            $perDayProfit = $perMonthProfit / 30;

            // inserting profit for this user
            $stakingBonus = new NftBonus();
            $stakingBonus->user_id = $subscription->user_id;
            $stakingBonus->sum = "in";
            $stakingBonus->status = "approved";
            $stakingBonus->amount = $perDayProfit;
            $stakingBonus->nft_price = $subscription->nft->price;
            $stakingBonus->note = "blockchain";
            $stakingBonus->save();
            Log::info('Profit Successfully Delivered: ' . $perDayProfit);
        }

        Log::info('NFT Ended!');
        return 0;
    }
}
