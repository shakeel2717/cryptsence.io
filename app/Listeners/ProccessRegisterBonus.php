<?php

namespace App\Listeners;

use App\Events\RegisterBonus;
use App\Models\user\Transaction;
use App\Models\user\UserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProccessRegisterBonus
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
     * @param  \App\Events\RegisterBonus  $event
     * @return void
     */
    public function handle(RegisterBonus $event)
    {
        $bonus = options("register_bonus_ctse");

        $deposit = new Transaction();
        $deposit->user_id = $event->user->id;
        $deposit->amount = $bonus;
        $deposit->type = 'Airdrop';
        $deposit->sum = 'in';
        $deposit->coin_id = 2;
        $deposit->status = 'approved';
        $deposit->note = 'Free Airdrop';
        $deposit->save();

        // notification for Bonus
        $notification = new UserNotification();
        $notification->user_id = $event->user->id;
        $notification->type = 'award';
        $notification->title = 'Signup Reward';
        $notification->content = 'You have received ' . $bonus . ' CTSE for signing up, thank you for joining us!';
        $notification->save();

        Log::info('Signup Reward Added for user:' . auth()->user()->username);
    }
}
