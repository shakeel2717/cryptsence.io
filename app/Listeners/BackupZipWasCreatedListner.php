<?php

namespace App\Listeners;

use App\Events\BackupZipWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class BackupZipWasCreatedListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BackupZipWasCreated $event)
    {
        Log::info('BackupZipWasCreatedListner: ' . $event->pathToZip);
    }
}
