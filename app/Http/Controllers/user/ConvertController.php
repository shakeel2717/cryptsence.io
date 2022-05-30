<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Transaction;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard.convert.index');
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
            'method' => 'required|max:255|exists:coins,symbol',
            'amount' => 'required|max:255|min:1',
        ]);

        // checking if this Form Currency is USDT.TRC20
        if ($validatedData['method'] == 'USDT.TRC20') {
            // getting CTSE Rate
            $price = options("coin_exchange_rate");
            // converting USDT to CTSE
            if ($validatedData['amount'] >= options("min_convert_amount")) {
                $amount = $validatedData['amount'] / $price;

                // checking if user have enough balance
                if (balance('USDT.TRC20', auth()->user()->id) >= $validatedData['amount']) {
                    // deducting balance
                    Transaction::create([
                        'user_id' => auth()->user()->id,
                        'currency' => 'USDT.TRC20',
                        'amount' => $validatedData['amount'],
                        'sum' => 'out',
                        'type' => 'convert',
                        'status' => 'success',
                    ]);

                    // adding balance
                    Transaction::create([
                        'user_id' => auth()->user()->id,
                        'currency' => 'CTSE',
                        'amount' => $amount,
                        'sum' => 'in',
                        'type' => 'convert',
                        'status' => 'success',
                    ]);

                    return redirect()->back()->with('success', 'Convert Successfully');
                } else {
                    return redirect()->back()->withErrors('You don\'t have enough balance');
                }

                // // adding transaction
                // $transaction = new Transaction();
                // $transaction->user_id = auth()->user()->id;
                // $transaction->currency = 'CTSE';
                // $transaction->amount = $amount;
                // $transaction->type = 'convert';
                // $transaction->sum = 'in';
                // $transaction->status = 'approved';
                // $transaction->note = 'convert from USDT';
                // $transaction->save();

                // // updating user balance
                // $transaction = new Transaction();
                // $transaction->user_id = auth()->user()->id;
                // $transaction->currency = 'USDT.TRC20';
                // $transaction->amount = $validatedData['amount'];
                // $transaction->type = 'convert';
                // $transaction->sum = 'out';
                // $transaction->status = 'approved';
                // $transaction->note = 'convert to CTSE';
                // $transaction->save();

                return redirect()->back()->with('success', 'USDT Convert Successfully');
            } else {
                return redirect()->back()->withErrors('Minimum Convert Amount is ' . options("min_convert_amount") . " USDT");
            }
        } else {
            return redirect()->back()->withErrors('This Form Currency is not supported yet.');
        }
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
