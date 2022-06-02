<?php

namespace App\Listeners;

use App\Events\ReferralCommission;
use App\Models\User;
use App\Models\user\Transaction;
use App\Models\user\UserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProccessReferralCommission
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
     * @param  \App\Events\ReferralCommission  $event
     * @return void
     */
    public function handle(ReferralCommission $event)
    {
        Log::info('ReferralCommission Listener Triggered');
        $user = User::find($event->user_id);
        $commission = options('referral_bonus_ctse');
        $amount = $event->balance * $commission / 100;

        Log::info('Getting this User Refer Detail');
        $upline = User::where('username', $user->refer)->first();
        if ($upline) {
            Log::info('user have Valid refer');


            // adding a transaction for this user upliner
            Transaction::create([
                'user_id' => $upline->id,
                'coin_id' => $event->coin_id,
                'amount' => $amount,
                'sum' => 'in',
                'type' => 'reward',
                'status' => 'approved',
                'note' => 'Referral Reward From ' . $user->username,
            ]);

            // inserting notification
            $notification = new UserNotification();
            $notification->user_id = $user->id;
            $notification->type = 'award';
            $notification->title = 'Referral Reward';
            $notification->content = 'You have received ' . $amount . ' CTSE for your referral Reward';
            $notification->save();

            Log::info('Refer Reward for ' . $user->username . ' has been added to ' . $upline->username);
        } else {
            Log::info('NO Refer Fund');
        }
    }
}
