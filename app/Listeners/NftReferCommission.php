<?php

namespace App\Listeners;

use App\Events\NftReferCommissionEvent;
use App\Models\User;
use App\Models\user\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NftReferCommission
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
     * @param  \App\Events\NftReferCommissionEvent  $event
     * @return void
     */
    public function handle(NftReferCommissionEvent $event)
    {
        Log::info('NftReferCommissionEvent Triggerd');
        $nft = $event->nft;
        // getting this user
        $user = User::find(auth()->user()->id);

        $nftPrice = $nft->nft_category->price;
        if (nftOffer()) {
            $nftPrice = $nft->nft_category->price - ($nft->nft_category->price * nftOffer()->value / 100);
        }


        // checking if this user has valid refer
        $directRefer = User::where('username', $user->refer)->where('nft', true)->first();
        if ($directRefer != "") {
            Log::info('Direct Refer Found, Proccess Start');
            $commission = options('nft_direct_refer_commission');
            $amount = ($nftPrice / options('coin_exchange_rate')) * $commission / 100;

            // deducting balance
            Transaction::create([
                'user_id' => $directRefer->id,
                'coin_id' => 2,
                'amount' => $amount,
                'sum' => 'in',
                'type' => 'reward',
                'status' => 'success',
                'note' => $user->username,
                'reference' => 'nft direct reward',
            ]);

            // checking if this user has valid refer
            $inDirectRefer1 = User::where('username', $directRefer->refer)->where('nft', true)->first();
            if ($inDirectRefer1 != "") {
                Log::info('InDirect 1 Refer Found, Proccess Start');
                $commission = options('nft_in_direct_1_refer_commission');
                $amount = ($nftPrice / options('coin_exchange_rate')) * $commission / 100;

                // deducting balance
                Transaction::create([
                    'user_id' => $inDirectRefer1->id,
                    'coin_id' => 2,
                    'amount' => $amount,
                    'sum' => 'in',
                    'type' => 'reward',
                    'status' => 'success',
                    'note' => $user->username,
                    'reference' => 'nft in-direct 1 reward',
                ]);

                // checking if this user has valid refer
                $inDirectRefer2 = User::where('username', $inDirectRefer1->refer)->where('nft', true)->first();
                if ($inDirectRefer2 != "") {
                    Log::info('InDirect 2 Refer Found, Proccess Start');
                    $commission = options('nft_in_direct_2_refer_commission');
                    $amount = ($nftPrice / options('coin_exchange_rate')) * $commission / 100;

                    // deducting balance
                    Transaction::create([
                        'user_id' => $inDirectRefer2->id,
                        'coin_id' => 2,
                        'amount' => $amount,
                        'sum' => 'in',
                        'type' => 'reward',
                        'status' => 'success',
                        'note' => $user->username,
                        'reference' => 'nft in-direct 2 reward',
                    ]);

                    // checking if this user has valid refer
                    $inDirectRefer3 = User::where('username', $inDirectRefer2->refer)->where('nft', true)->first();
                    if ($inDirectRefer3 != "") {
                        Log::info('InDirect 3 Refer Found, Proccess Start');
                        $commission = options('nft_in_direct_3_refer_commission');
                        $amount = ($nftPrice / options('coin_exchange_rate')) * $commission / 100;

                        // deducting balance
                        Transaction::create([
                            'user_id' => $inDirectRefer3->id,
                            'coin_id' => 2,
                            'amount' => $amount,
                            'sum' => 'in',
                            'type' => 'reward',
                            'status' => 'success',
                            'note' => $user->username,
                            'reference' => 'nft in-direct 3 reward',
                        ]);
                    }
                }
            }
        }
        Log::info('NftReferCommissionEvent Ended');
    }
}
