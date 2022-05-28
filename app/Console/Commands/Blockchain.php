<?php

namespace App\Console\Commands;

use App\Models\admin\Option;
use App\Models\StakingBonus;
use App\Models\User;
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
                Log::info('User: ' . $user->username . ' has ' . $balance . ' CTSE');
                // delivering the Staking Profit
                $monthlyProfit = Option::where('name', 'ctse_stake_bonus_monthly')->firstOrFail();
                Log::info('Current Profit Monthly for user: ' . $user->username . ' has ' . $monthlyProfit->value . ' %');
                // get the profit for 1 month
                $profit = $balance * ($monthlyProfit->value / 100);
                Log::info('Profit for 1 month for user: ' . $user->username . ' has ' . $profit);
                // get this profit for 1 hour
                $profitHour = ($profit / 30) / 24;
                Log::info('Profit for 1 hour for user: ' . $user->username . ' has ' . $profitHour);

                $currentHour = date('H');
                // add staking bounus for this user
                $alreadyDeliveredProfit = StakingBonus::where('user_id', $user->id)
                    ->where('note', 'Blockchain')
                    ->where('sum', 'in')
                    ->whereDate('created_at', today())
                    ->get();

                foreach ($alreadyDeliveredProfit as $alreadyProfit) {
                    // checking this profit Createat Hour
                    if ($alreadyProfit->created_at->format('H') == $currentHour) {
                        Log::info('This profit for user: ' . $user->username . ' already delivered');
                        goto endStakeBouns;
                        break;
                    }
                }

                $stakingBonus = new StakingBonus();
                $stakingBonus->user_id = $user->id;
                $stakingBonus->sum = "in";
                $stakingBonus->amount = $profitHour;
                $stakingBonus->stake_amount = $balance;
                $stakingBonus->note = "Blockchain";
                $stakingBonus->save();

                Log::info('Staking Bonus for user: ' . $user->username . ' has ' . $profitHour . ' Delivered Successfully');
                endStakeBouns:
            }
        }

        return 0;
    }
}
