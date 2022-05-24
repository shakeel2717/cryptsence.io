<?php

namespace App\Console\Commands;

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
        $user->name = "Administrator";
        $user->username = "admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('asdfasdf');
        $user->role = "admin";
        $user->save();



        return 0;
    }
}
