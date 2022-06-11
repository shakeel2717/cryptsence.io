<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\user\Transaction;
use App\Models\user\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = Coin::limit(1)->get();
        return view('user.dashboard.withdraw.index', compact('coins'));
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
        $validateddata = $request->validate([
            'coin_id' => 'required|exists:coins,id',
            'amount' => 'required|numeric|min:10',
            'wallet' => 'required',
        ]);
        $coin = Coin::find($validateddata['coin_id']);

        // checking if the balance is enough
        if (balance($coin->symbol, auth()->user()->id) < $validateddata['amount']) {
            return redirect()->back()->withErrors('Your balance is not enough');
        }

        $fees = $validateddata['amount'] * options('withdraw_fees') / 100;
        $amount = $validateddata['amount'] - $fees;

        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->coin_id = $validateddata['coin_id'];
        $withdraw->amount = $amount;
        $withdraw->address = $validateddata['wallet'];
        $withdraw->save();


        // deducting the balance
        $withdrawTransaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'coin_id' => $validateddata['coin_id'],
            'amount' => $amount,
            'sum' => 'out',
            'type' => 'withdraw',
            'status' => 'pending',
        ]);

        // deducting the balance
        Transaction::create([
            'user_id' => auth()->user()->id,
            'coin_id' => $validateddata['coin_id'],
            'amount' => $fees,
            'sum' => 'out',
            'type' => 'withdrawal fees',
            'status' => 'complete',
            'note' => $withdrawTransaction->id,
        ]);

        return redirect()->back()->with('success', 'Your withdraw request has been sent');
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
