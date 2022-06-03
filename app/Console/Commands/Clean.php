<?php

namespace App\Console\Commands;

use App\Models\admin\Option;
use App\Models\BonusPolicy;
use App\Models\Coin;
use App\Models\User;
use App\Models\user\Referral;
use App\Models\user\Transaction;
use Illuminate\Console\Command;

class Clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding Database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->call('route:clear');


        $user = new User();
        $user->name = "Administrator";
        $user->username = "ctse";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('asdfasdf');
        $user->role = "admin";
        $user->save();


        // supported coins

        $coin = new Coin();
        $coin->name = "Tether";
        $coin->symbol = "USDT.TRC20";
        $coin->image = "tether.png";
        $coin->save();


        $coin = new Coin();
        $coin->name = "Cryptsence";
        $coin->symbol = "CTSE";
        $coin->image = "ctse.png";
        $coin->save();

        $deposit = new Transaction();
        $deposit->user_id = $user->id;
        $deposit->amount = 1000;
        $deposit->type = 'Airdrop';
        $deposit->sum = 'in';
        $deposit->coin_id = 2;
        $deposit->status = 'approved';
        $deposit->note = 'Free Airdrop';
        $deposit->save();


        // adding balance
        Transaction::create([
            'user_id' => $user->id,
            'coin_id' => 2,
            'amount' => 10000,
            'sum' => 'in',
            'type' => 'convert',
            'status' => 'success',
        ]);

        $option = new Option();
        $option->name = "coin_exchange_rate";
        $option->value = "0.005";
        $option->save();

        $option = new Option();
        $option->name = "min_convert_amount";
        $option->value = "5";
        $option->save();


        $option = new Option();
        $option->name = "min_ctse_for_stake";
        $option->value = "2000";
        $option->save();


        $option = new Option();
        $option->name = "ctse_stake_bonus_monthly";
        $option->value = "5";
        $option->save();


        $option = new Option();
        $option->name = "register_bonus_ctse";
        $option->value = 1000;
        $option->save();

        $option = new Option();
        $option->name = "referral_bonus_ctse";
        $option->value = 15;
        $option->save();


        $option = new Option();
        $option->name = "min_convert_amount_for_commission";
        $option->value = "5";
        $option->save();


        $option = new Option();
        $option->name = "withdraw_fees";
        $option->value = "2";
        $option->save();

        $bonusPolicy = new BonusPolicy();
        $bonusPolicy->title = "Get 15% Instant CTSE Reward";
        $bonusPolicy->description = "Purchase CTSE Today and get 15% more CTSE Reward Instantly. Let's play with CTSE";
        $bonusPolicy->start_date = "2022-06-02";
        $bonusPolicy->end_date = "2022-06-03";
        $bonusPolicy->bonus = "15";
        $bonusPolicy->save();

        $bonusPolicy = new BonusPolicy();
        $bonusPolicy->title = "Get 10% Instant CTSE Reward";
        $bonusPolicy->description = "Purchase CTSE Today and get 10% more CTSE Reward Instantly. Let's play with CTSE";
        $bonusPolicy->start_date = "2022-06-04";
        $bonusPolicy->end_date = "2022-06-05";
        $bonusPolicy->bonus = "10";
        $bonusPolicy->save();

        $bonusPolicy = new BonusPolicy();
        $bonusPolicy->title = "Get 05% Instant CTSE Reward";
        $bonusPolicy->description = "Purchase CTSE Today and get 05% more CTSE Reward Instantly. Let's play with CTSE";
        $bonusPolicy->start_date = "2022-06-05";
        $bonusPolicy->end_date = "2022-06-06";
        $bonusPolicy->bonus = "05";
        $bonusPolicy->save();


        $referral = new Referral();
        $referral->user_id = 1;
        $referral->referral_code = "CTSE_ADMINISTRATOR";
        $referral->save();

        return 0;
    }
}
