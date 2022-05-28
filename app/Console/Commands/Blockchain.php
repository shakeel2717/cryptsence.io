<?php

namespace App\Console\Commands;

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
            }
        }

        return 0;
    }
}
