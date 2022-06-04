<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\Transaction;
use Illuminate\Http\Request;

class CTSESellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard.sell.index');
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
            'method' => 'required',
            'amount' => 'required|numeric',
        ]);

        if (!$validatedData['method'] == 'CTSE') {
            return redirect()->back()->withErrors("Please select CTSE method");
        }

        if (ReferralBalance(auth()->user()->id) < $validatedData['amount']) {
            return redirect()->back()->withErrors("Insufficient CTSE Referral balance");
        }

        $usdtAmount = $validatedData['amount'] * options("coin_exchange_rate");

        // adding a transaction for this user upliner
        Transaction::create([
            'user_id' => auth()->user()->id,
            'coin_id' => 2,
            'amount' => $validatedData['amount'],
            'sum' => 'out',
            'type' => 'reward',
            'status' => 'approved',
            'note' => 'CTSE Sell Referral Reward',
        ]);


        // adding balance
        Transaction::create([
            'user_id' => auth()->user()->id,
            'coin_id' => 1,
            'amount' => $usdtAmount,
            'sum' => 'in',
            'type' => 'Sell',
            'status' => 'success',
        ]);

        return redirect()->back()->with('success', 'CTSE Sold Successfully');
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
