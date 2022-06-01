<?php

namespace App\Http\Controllers\user;

use App\Events\ReferralCommission;
use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\User;
use App\Models\user\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        $buyCoin = Coin::where('symbol', 'CTSE')->first();

        $coin = Coin::where('symbol', $validatedData['method'])->where('status', 'active')->first();

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
                    'coin_id' => $coin->id,
                    'amount' => $validatedData['amount'],
                    'sum' => 'out',
                    'type' => 'convert',
                    'status' => 'success',
                ]);

                // adding balance
                Transaction::create([
                    'user_id' => auth()->user()->id,
                    'coin_id' => $buyCoin->id,
                    'amount' => $amount,
                    'sum' => 'in',
                    'type' => 'convert',
                    'status' => 'success',
                ]);

                // checking if this is first convert
                $allConvertTransactions = Transaction::where('user_id', auth()->user()->id)->where('type', 'convert')->count();
                if ($allConvertTransactions > 1) {

                    // checking if convert amount is enough
                    $minAmount = options("min_convert_amount_for_commission");
                    if ($validatedData['amount'] >= $minAmount) {
                        Log::info('Convert amount is enough for referral commission');
                        event(new ReferralCommission(auth()->user()->id, $amount, $buyCoin->id,));
                    }
                }

                // updating this user status
                $user = User::find(auth()->user()->id);
                $user->status = "active";
                $user->save();

                return redirect()->back()->with('success', 'Convert Successfully');
            } else {
                return redirect()->back()->withErrors('You don\'t have enough balance');
            }

            return redirect()->back()->with('success', 'USDT Convert Successfully');
        } else {
            return redirect()->back()->withErrors('Minimum Convert Amount is ' . options("min_convert_amount") . " USDT");
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
