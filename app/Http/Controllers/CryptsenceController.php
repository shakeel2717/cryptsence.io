<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user\Transaction;
use Illuminate\Http\Request;

class CryptsenceController extends Controller
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
        info("reached hoook");
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'address' => 'required|string',
            'user_id' => 'required|integer',
            'secret' => 'required|string',
        ]);

        $secret = env("CTSE_SECRET_KEY");
        // checking if API is valid
        if ($secret != $validated['secret']) {
            return redirect()->back()->withErrors("Invalid API");
        }

        info("reached hoook");
        info('webhook Request: ' . json_encode($request));
        info('validated: ' . json_encode($validated));

        // getting this address user
        $user = User::where('address',$validated['address'])->firstOrFail();
        info('User Found with the Address');
        // adding balance
        Transaction::create([
            'user_id' => $user->id,
            'coin_id' => 2,
            'amount' => $validated['amount'],
            'sum' => 'in',
            'type' => 'received',
            'status' => 'success',
            'note' => $validated['address'],
        ]);
        info('Balance Added into wallet');

        return true;
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
