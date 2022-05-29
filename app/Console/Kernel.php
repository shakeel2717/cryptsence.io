<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('blockchain:run')
            ->withoutOverlapping()
            ->everyMinute()
            ->emailOutputTo('shakeel2717@gmail.com')
            ->before(function () {
                Log::info('Running blockchain:run command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('Running blockchain:run command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();


        $schedule->command('clean:only')
            ->withoutOverlapping()
            ->twiceDaily()
            ->emailOutputTo('shakeel2717@gmail.com')
            ->runsInMaintenanceMode();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
