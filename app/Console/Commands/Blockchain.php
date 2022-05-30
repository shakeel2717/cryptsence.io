<?php

namespace App\Console\Commands;

use App\Models\admin\Option;
use App\Models\User;
use App\Models\user\StakingBonus;
use App\Models\user\Transaction;
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
        // getting all users
        $users = User::get();

        // looping through users
        foreach ($users as $user) {
            $balance = balance('CTSE', $user->id);
            if ($balance > 0) {
                // checking if this user fullfill the staking requirement

                $staking_requirement = options('register_bonus_ctse');

                $convertTransactions = Transaction::where('user_id', $user->id)->where('type', 'convert')->sum('amount');
                if ($convertTransactions < $staking_requirement) {
                    Log::info('User ' . $user->username . ' not fullfill the staking requirement');
                    goto endStakeBouns;
                }

                Log::info('User: ' . $user->username . ' has ' . $balance . ' CTSE');
                // delivering the Staking Profit
                $monthlyProfit = Option::where('name', 'ctse_stake_bonus_monthly')->firstOrFail();
                Log::info('Current Profit Monthly for user: ' . $user->username . ' has ' . $monthlyProfit->value . ' %');
                // get the profit for 1 month
                $profit = $balance * ($monthlyProfit->value / 100);
                Log::info('Profit for 1 month for user: ' . $user->username . ' has ' . $profit);
                // get this profit for 1 day
                $profitDay = ($profit / 30);
                Log::info('Profit for 1 day for user: ' . $user->username . ' has ' . $profitDay);

                // checking if this user has already got staking bonus
                $stakingBonus = StakingBonus::where('user_id', $user->id)
                    ->whereDate('created_at', date('Y-m-d'))
                    ->where('amount', $profitDay)
                    ->where('stake_amount', $balance)
                    ->get();
                if ($stakingBonus->count() > 0) {
                    Log::info('User ' . $user->username . ' already got staking bonus');
                    goto endStakeBouns;
                }

                $stakingBonus = new StakingBonus();
                $stakingBonus->user_id = $user->id;
                $stakingBonus->sum = "in";
                $stakingBonus->status = "approved";
                $stakingBonus->amount = $profitDay;
                $stakingBonus->stake_amount = $balance;
                $stakingBonus->note = "Blockchain";
                $stakingBonus->save();

                Log::info('Staking Bonus for user: ' . $user->username . ' has ' . $profitDay . ' Delivered Successfully');
                endStakeBouns:
            }
        }

        return 0;
    }
}
