<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReferralRewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function stack(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // checking if balance is enough
        if (ReferralBalance(auth()->user()->id) < $validatedData['amount']) {
            return redirect()->back()->withErrors('Insufficient Reward Balance');
        }

        // Proccess to send this coin to Stack

        Log::info('User: ' . auth()->user()->name . ' Referral Reward: ' . $validatedData['amount']);
            // send this to stack
            $transactionOut = new Transaction();
            $transactionOut->user_id = auth()->user()->id;
            $transactionOut->type = 'reward';
            $transactionOut->coin_id = 2;
            $transactionOut->amount = $validatedData['amount'];
            $transactionOut->sum = 'out';
            $transactionOut->status = 'approved';
            $transactionOut->note = 'rewards to stack';
            $transactionOut->save();

            Log::info('User: ' . auth()->user()->name . ' Referral Reward Removed: ' . $validatedData['amount']);
            // adding new transaction

            // adding balance into user account
            $transaction = new Transaction();
            $transaction->user_id = auth()->user()->id;
            $transaction->amount = $validatedData['amount'];
            $transaction->coin_id = 2;
            $transaction->type = 'stack';
            $transaction->status = 'approved';
            $transaction->note = 'rewards to stack';
            $transaction->sum = 'in';
            $transaction->save();

            return redirect()->back()->with('success', 'Reward sent to Stack');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
