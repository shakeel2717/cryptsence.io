<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromotionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $message;
    public $user;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $user, $subject)
    {
        $this->message = $message;
        $this->user = $user;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.promotion');
    }
}
