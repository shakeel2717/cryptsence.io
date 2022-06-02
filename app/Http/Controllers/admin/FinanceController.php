<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\User;
use App\Models\user\Transaction;
use App\Models\user\UserNotification;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.finance.index');
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
        $validatedData = $request->validate([
            'email' => 'required|exists:users',
            'method' => 'required',
            'amount' => 'required',
        ]);

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        // checking if this coin or token is valid
        $coin = Coin::where('symbol', $validatedData['method'])->firstOrFail();

        if ($coin) {
            // adding balance into user account
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $validatedData['amount'];
            $transaction->coin_id = $coin->id;
            $transaction->type = 'deposit';
            $transaction->status = 'approved';
            $transaction->note = 'admin deposit';
            $transaction->sum = 'in';
            $transaction->save();

            // inserting notification
            $notification = new UserNotification();
            $notification->user_id = $user->id;
            $notification->type = 'plus-circle';
            $notification->title = 'Deposit';
            $notification->content = 'You have received ' . $validatedData['amount'] . ' ' . $coin->symbol . ' for your deposit';
            $notification->save();
        }

        return redirect()->back()->with('success', 'Deposit has been added successfully');
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
