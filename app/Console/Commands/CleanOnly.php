<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $this->call('migrate');
        $this->call('schedule:clear-cache');


        return 0;
    }
}
