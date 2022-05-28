<?php

namespace App\Console\Commands;

use App\Models\admin\Option;
use App\Models\Coin;
use App\Models\User;
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
        $user->name = "Shakeel Ahmad";
        $user->username = "shakeel2717";
        $user->email = "shakeel2717@gmail.com";
        $user->password = bcrypt('asdfasdf');
        $user->save();

        $user = new User();
        $user->name = "Rahel Anwaar";
        $user->username = "raheel";
        $user->email = "raheel@gmail.com";
        $user->password = bcrypt('asdfasdf');
        $user->save();

        $user = new User();
        $user->name = "Administrator";
        $user->username = "admin";
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

        $option = new Option();
        $option->name = "coin_exchange_rate";
        $option->value = "0.01";
        $option->save();

        $option = new Option();
        $option->name = "min_convert_amount";
        $option->value = "10";
        $option->save();


        $option = new Option();
        $option->name = "min_ctse_for_stake";
        $option->value = "3000";
        $option->save();


        $option = new Option();
        $option->name = "ctse_stake_bonus_monthly";
        $option->value = "5";
        $option->save();



        return 0;
    }
}
