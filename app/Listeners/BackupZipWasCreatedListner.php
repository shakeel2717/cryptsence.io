<?php

namespace App\Listeners;

use App\Mail\SendBackupMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
    public function handle($event)
    {
        // sending Email to user
        Log::info('Backup Zip was created' . $even->backupDestination);
        // Mail::to(env('APP_BACKUP_EMAIL'))->send(new SendBackupMail($event->pathToZip));
    }
}
