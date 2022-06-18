<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendBackupMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pathToZip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pathToZip)
    {
        $this->pathToZip = $pathToZip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.backup')
            ->attachFromStorage($this->pathToZip, 'backup.zip');
    }
}
