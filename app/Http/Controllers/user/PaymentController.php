<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\btcPayments;
use App\Models\Coin;
use App\Models\user\UserNotification;
use Illuminate\Http\Request;
use CoinpaymentsAPI;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coin = Coin::find(1);

        // checking if this user already have address
        $address = Address::where('user_id', auth()->user()->id)->where('coin_id', $coin->id)->first();
        if ($address) {
            return view('user.dashboard.payment.index', compact('address'));
        }
        // getting address from the api

        $private_key = env('PRIKEY');
        $public_key = env('PUBKEY');
        $method = $coin->symbol;


        try {
            $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
            $currency1 = "USD";
            $currency2 = $method;
            $buyer_email = auth()->user()->email;
            $ipn_url = env('IPN_URL');
            $information = $cps_api->GetCallbackAddressWithIpn($currency2, $ipn_url, $buyer_email);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

        if($information['error'] != 'ok'){
            return "<h3>Please send USDT TRC20 to this address(TMWT4WwTmvMe3VghDGZQ3fshcGARidpTsU), and take a screenshot of your payment. After successful payment, don't forget to send the payment proof or transaction id for instant Deposit. Our WhatsApp Number: (+971 56 241 9415)</h3>";
        }

        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->coin_id = $coin->id;
        $address->address = $information['result']['address'];
        $address->save();

        return view('user.dashboard.payment.index', compact('address'));
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
