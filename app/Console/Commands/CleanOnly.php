<?php

namespace App\Console\Commands;

use App\Models\LiveRate;
use App\Models\User;
use App\Models\user\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CleanOnly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:only';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Only Cache Cookies etc.. not Migration Force';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('cache:clear');
        $this->call('view:clear');
        $this->call('route:clear');
        $this->call('config:clear');

        $liveRate = new LiveRate();
        $liveRate->symbol = 'BTC';
        $liveRate->name = 'Bitcoin';
        $liveRate->price = 0;
        $liveRate->save();


        $liveRate = new LiveRate();
        $liveRate->symbol = 'ETH';
        $liveRate->name = 'Ethereum';
        $liveRate->price = 0;
        $liveRate->save();


        $liveRate = new LiveRate();
        $liveRate->symbol = 'CTSE';
        $liveRate->name = 'Cryptsence';
        $liveRate->price = 0;
        $liveRate->save();


        $liveRate = new LiveRate();
        $liveRate->symbol = 'LTC';
        $liveRate->name = 'Litecoin';
        $liveRate->price = 0;
        $liveRate->save();


        $liveRate = new LiveRate();
        $liveRate->symbol = 'BNB';
        $liveRate->name = 'Binance Coin';
        $liveRate->price = 0;
        $liveRate->save();


        $liveRate = new LiveRate();
        $liveRate->symbol = 'USDT.TRC20';
        $liveRate->name = 'Tether';
        $liveRate->price = 0;
        $liveRate->save();





        // $users = User::all();
        // foreach ($users as $user) {
        //     $reward = ReferralBalance($user->id);
        //     if ($reward < 1) {
        //         goto End;
        //     }
        //     Log::info('User: ' . $user->name . ' Referral Reward: ' . $reward);
        //     // send this to stack
        //     $transactionOut = new Transaction();
        //     $transactionOut->user_id = $user->id;
        //     $transactionOut->type = 'reward';
        //     $transactionOut->coin_id = 2;
        //     $transactionOut->amount = $reward;
        //     $transactionOut->sum = 'out';
        //     $transactionOut->status = 'approved';
        //     $transactionOut->save();

        //     Log::info('User: ' . $user->name . ' Referral Reward Removed: ' . $reward);
        //     // adding new transaction

        //     // adding balance into user account
        //     $transaction = new Transaction();
        //     $transaction->user_id = $user->id;
        //     $transaction->amount = $reward;
        //     $transaction->coin_id = 2;
        //     $transaction->type = 'stack';
        //     $transaction->status = 'approved';
        //     $transaction->note = 'rewards to stack';
        //     $transaction->sum = 'in';
        //     $transaction->save();

        //     Log::info('User: ' . $user->name . ' Referral Reward Added: ' . $reward);
        //     End:
        // }




        return 0;
    }
}
