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
        $schedule->command('backup:run')
            ->withoutOverlapping()
            ->everyMinute()
            ->emailOutputTo('shakeel2717@gmail.com')
            ->before(function () {
                Log::info('backup:run command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('backup:run command Finished in Scheduler');
                // getting all latest modfied files from storage/app/Cryptsence/
                $files = scandir(storage_path('app/Cryptsence/*'), SCANDIR_SORT_DESCENDING);
                $newest_file = $files[0];
                Log::info('backup:run command Newest file is: '.$newest_file);
            })
            ->runsInMaintenanceMode();


        $schedule->command('blockchain:run')
            ->withoutOverlapping()
            ->twiceDaily()
            ->emailOutputTo('shakeel2717@gmail.com')
            ->before(function () {
                Log::info('blockchain:run command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('blockchain:run command Finished in Scheduler');
            })
            ->runsInMaintenanceMode();


        $schedule->command('get:rates')
            ->withoutOverlapping()
            ->everyTenMinutes()
            ->emailOutputTo('shakeel2717@gmail.com')
            ->before(function () {
                Log::info('get:rates command Starting in Scheduler');
            })
            ->after(function () {
                Log::info('get:rates command Finished in Scheduler');
            });
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
