<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Nft;
use App\Models\Subscription;
use App\Models\user\Transaction;
use Illuminate\Http\Request;

class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nfts = Nft::where('status', true)->get();
        $myNfts = Subscription::where('user_id', auth()->user()->id)->where('type', 'nft')->get();
        return view('user.dashboard.nft.index', compact('nfts', 'myNfts'));
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
        $nft = Nft::findOrFail($id);
        return view('user.dashboard.nft.show', compact('nft'));
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

        $nft = Nft::findOrFail($id);

        // checking if balance is sufficient
        if (balance('USDT.TRC20', auth()->user()->id) < $nft->price) {
            return redirect()->back()->withErrors('Insufficient Balance, Please Top Up');
        }

        // activating the NFT Subscriptions
        $subscription = new Subscription();
        $subscription->user_id = auth()->user()->id;
        $subscription->nft_id = $nft->id;
        $subscription->type = 'nft';
        $subscription->status = true;
        $subscription->save();

        // deducting balance
        Transaction::create([
            'user_id' => auth()->user()->id,
            'coin_id' => 1,
            'amount' => $nft->price,
            'sum' => 'out',
            'type' => 'nft purchase',
            'status' => 'success',
        ]);

        return redirect()->route('user.nft.index')->with('success', 'Congratulations! You have successfully purchased a NFT.');
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
