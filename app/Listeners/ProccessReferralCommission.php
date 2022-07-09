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
                'note' => $user->username,
                'reference' => 'direct reward',
            ]);

            // inserting notification
            $notification = new UserNotification();
            $notification->user_id = $upline->id;
            $notification->type = 'award';
            $notification->title = 'Referral Reward';
            $notification->content = 'You have received ' . $amount . ' CTSE for your referral Reward';
            $notification->save();

            Log::info('Refer Reward for ' . $user->username . ' has been added to ' . $upline->username);

            $uplineSecond = User::where('username', $upline->refer)->first();
            if ($uplineSecond) {
                $commission = 2;
                $amount = $event->balance * $commission / 100;
                Log::info('user have Valid Indirect 1 refer');

                // adding a transaction for this user upliner
                Transaction::create([
                    'user_id' => $uplineSecond->id,
                    'coin_id' => $event->coin_id,
                    'amount' => $amount,
                    'sum' => 'in',
                    'type' => 'reward',
                    'status' => 'approved',
                    'note' => $user->username,
                    'reference' => '1st level reward',
                ]);

                // inserting notification
                $notification = new UserNotification();
                $notification->user_id = $uplineSecond->id;
                $notification->type = 'award';
                $notification->title = 'Referral Reward';
                $notification->content = 'You have received ' . $amount . ' CTSE for your referral Reward';
                $notification->save();

                Log::info('Refer Reward for ' . $user->username . ' has been added to ' . $uplineSecond->username);

                $uplineThird = User::where('username', $uplineSecond->refer)->first();
                if ($uplineThird) {
                    $commission = 2;
                    $amount = $event->balance * $commission / 100;
                    Log::info('user have Valid Indirect 2 refer');

                    // adding a transaction for this user upliner
                    Transaction::create([
                        'user_id' => $uplineThird->id,
                        'coin_id' => $event->coin_id,
                        'amount' => $amount,
                        'sum' => 'in',
                        'type' => 'reward',
                        'status' => 'approved',
                        'note' => $user->username,
                        'reference' => '2nd level reward',

                    ]);

                    // inserting notification
                    $notification = new UserNotification();
                    $notification->user_id = $uplineThird->id;
                    $notification->type = 'award';
                    $notification->title = 'Referral Reward';
                    $notification->content = 'You have received ' . $amount . ' CTSE for your referral Reward';
                    $notification->save();

                    Log::info('Refer Reward for ' . $user->username . ' has been added to ' . $uplineThird->username);

                    $uplineFourth = User::where('username', $uplineThird->refer)->first();
                    if ($uplineFourth) {
                        $commission = 3;
                        $amount = $event->balance * $commission / 100;
                        Log::info('user have Valid Indirect 3 refer');

                        // adding a transaction for this user upliner
                        Transaction::create([
                            'user_id' => $uplineFourth->id,
                            'coin_id' => $event->coin_id,
                            'amount' => $amount,
                            'sum' => 'in',
                            'type' => 'reward',
                            'status' => 'approved',
                            'note' => $user->username,
                            'reference' => '3rd level reward',
                        ]);

                        // inserting notification
                        $notification = new UserNotification();
                        $notification->user_id = $uplineFourth->id;
                        $notification->type = 'award';
                        $notification->title = 'Referral Reward';
                        $notification->content = 'You have received ' . $amount . ' CTSE for your referral Reward';
                        $notification->save();

                        Log::info('Refer Reward for ' . $user->username . ' has been added to ' . $uplineFourth->username);
                    } else {
                        Log::info('NO Indirect 1 Refer Found Refer Fund');
                    }
                } else {
                    Log::info('NO Indirect 1 Refer Found Refer Fund');
                }
            } else {
                Log::info('NO Indirect 1 Refer Found Refer Fund');
            }
        } else {
            Log::info('NO Refer Fund');
        }
    }
}
