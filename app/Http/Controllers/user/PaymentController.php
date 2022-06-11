<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\btcPayments;
use App\Models\user\UserNotification;
use Illuminate\Http\Request;
use CoinpaymentsAPI;
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
        return view('user.dashboard.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.dashboard.payment.create');
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
            'method' => 'required|string',
            'amount' => 'required|numeric|min:1',
        ]);


        $private_key = env('PRIKEY');
        $public_key = env('PUBKEY');
        $method = $validatedData['method'];


        try {
            $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
            $amount = $validatedData['amount'];;
            $currency1 = "USD";
            $currency2 = $method;
            $buyer_email = auth()->user()->email;
            $ipn_url = env('IPN_URL');
            $information = $cps_api->CreateSimpleTransactionWithConversion($amount, $currency1, $currency2, $buyer_email);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

        Log::info(print_r($information, true) ."Result of create transaction");

        // Inserting New Transaction Request Storing into session
        $task = new btcPayments();
        $task->user_id = auth()->user()->id;
        $task->amount = $information['result']['amount'];
        $task->address = $information['result']['address'];
        $task->timeout = $information['result']['timeout'];
        $task->dest_tag = 1;
        $task->from_currency = $currency1;
        $task->to_currency = $currency2;
        $task->txn_id = $information['result']['txn_id'];
        $task->confirms_needed = $information['result']['confirms_needed'];
        $task->checkout_url = $information['result']['checkout_url'];
        $task->status_url = $information['result']['status_url'];
        $task->qrcode_url = $information['result']['qrcode_url'];
        $task->save();

        // inserting notification
        $notification = new UserNotification();
        $notification->user_id = auth()->user()->id;
        $notification->type = 'clock';
        $notification->title = 'Waiting for Payment';
        $notification->content = 'Please sent' . $information['result']['amount'] . ' ' . $currency2 . ' to ' . $information['result']['address'];
        $notification->save();

        // return redirect($task->checkout_url);
        return view('user.dashboard.payment.create', compact('task'));
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
