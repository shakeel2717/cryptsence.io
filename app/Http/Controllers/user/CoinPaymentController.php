<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\btcPayments;
use App\Models\User;
use App\Models\user\Transaction;
use App\Models\user\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoinPaymentController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('CoinPayment webhook Reached');

        Log::info('CoinPayment webhook Request: ' . json_encode($request->all()));

        $merchant_id = env('COINPAYMENTSMERCHANT');
        $ipn_secret = env('IPN_SECRET');
        Log::info('CoinPayment webhook  Init');
        $txn_id = $request->txn_id;
        $payment = btcPayments::where("txn_id", $txn_id)->first();



        if (!isset($request->ipn_mode) || $request->ipn_mode != 'hmac') {
            edie("IPN Mode is not HMAC");
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            edie("No HMAC Signature Sent.");
        }

        $requestFile = file_get_contents('php://input');
        if ($requestFile === false || empty($requestFile)) {
            edie("Error in reading Post Data");
        }

        if (!isset($request->merchant) || $request->merchant != trim($merchant_id)) {
            edie("No or incorrect merchant id.");
        }

        $hmac =  hash_hmac("sha512", $requestFile, trim($ipn_secret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
            edie("HMAC signature does not match.");
        }

        // checking if this Request comes from ipn_type=Deposit
        if (isset($request->ipn_type) || $request->ipn_type == 'deposit') {
            Log::info('Deposit Request Found');
            if ($request->status == 100 && $request->status_text == "Deposit confirmed") {
                // Proccess for Payment
                // getting this user
                $user = User::where('email', $request->label)->first();
                if (!$user) {
                    edie("User not Found. User Email: " . $request->label);
                }

                // Inserting New Transaction Request Storing into session
                $task = new btcPayments();
                $task->user_id = $user->id;
                $task->amount = $request->amount;
                $task->address = $request->address;
                $task->timeout = "Deposit TID";
                $task->dest_tag = $request->label;
                $task->from_currency = "N/A";
                $task->status = "complete";
                $task->to_currency = "N/A";
                $task->txn_id = $request->txn_id;
                $task->confirms_needed = $request->confirms;
                $task->checkout_url = "N/A";
                $task->status_url = "N/A";
                $task->qrcode_url = "N/A";
                $task->save();


                // getting this user Payment ID
                $deposit = new Transaction();
                $deposit->user_id = $user->id;
                $deposit->amount = $request->amount;
                $deposit->type = 'deposit';
                $deposit->sum = 'in';
                $deposit->coin_id = 1;
                $deposit->status = 'approved';
                $deposit->txn_id = $request->txn_id;
                $deposit->note = 'coinPayment Gateway';
                $deposit->save();
                Log::info('CoinPayment Payment Success from Deposit');
            }
        } else {
            $order_currency = $payment->to_currency; //BTC
            $order_total = $payment->amount; //BTC
            Log::info('This is not Deposit Request');
            $amount1 = floatval($request->amount1); //IN USD
            $amount2 = floatval($request->amount2); //IN BTC
            $currency1 = $request->currency1; //USD
            $currency2 = $request->currency2; //BTC
            $status = intval($request->status);

            if ($currency2 != $order_currency) {
                edie("Currency Mismatch");
            }

            if ($amount2 < $order_total) {
                edie("Amount is lesser than order total");
            }

            if ($status == 1 || $status == 2) {
                // Payment is complete
                $payment->status = "success";
                $payment->save();

                // Inserting User Plan
                // checking if alrady inserted
                $transaction = Transaction::where('user_id', $payment->user_id)->where('txn_id', $txn_id)->count();
                if ($transaction < 1) {
                    // getting this user Payment ID
                    $deposit = new Transaction();
                    $deposit->user_id = $payment->user_id;
                    $deposit->amount = $amount1;
                    $deposit->type = 'deposit';
                    $deposit->sum = 'in';
                    $deposit->coin_id = 1;
                    $deposit->status = 'approved';
                    $deposit->txn_id = $txn_id;
                    $deposit->note = 'coinPayment Gateway';
                    $deposit->save();
                    Log::info('CoinPayment Payment Success');

                    // inserting notification
                    $notification = new UserNotification();
                    $notification->user_id = $payment->user_id;
                    $notification->type = 'plus-circle';
                    $notification->title = $amount1 . ' Deposit Successfull';
                    $notification->content = 'You have received ' . $amount1 . ' USDT for your deposit';
                    $notification->save();
                } else {
                    Log::info('CoinPayment Payment Already Inserted');
                }
            } else if ($status >= 100) {
                // Payment is complete
                $payment->status = "complete";
                $payment->save();

                // checking if alrady inserted
                $transaction = Transaction::where('user_id', $payment->user_id)->where('txn_id', $txn_id)->count();
                if ($transaction < 1) {
                    // getting this user Payment ID
                    $deposit = new Transaction();
                    $deposit->user_id = $payment->user_id;
                    $deposit->amount = $amount1;
                    $deposit->type = 'deposit';
                    $deposit->sum = 'in';
                    $deposit->coin_id = 1;
                    $deposit->status = 'approved';
                    $deposit->txn_id = $txn_id;
                    $deposit->note = 'coinPayment Gateway';
                    $deposit->save();

                    // inserting notification
                    $notification = new UserNotification();
                    $notification->user_id = $payment->user_id;
                    $notification->type = 'plus-circle';
                    $notification->title = $amount1 . ' Deposit Successfull';
                    $notification->content = 'You have received ' . $amount1 . ' USDT for your deposit';
                    $notification->save();
                    Log::info('CoinPayment Payment Status 100 Success');
                } else {
                    Log::info('CoinPayment Payment Already Inserted 100');
                }
            } else if ($status < 0) {
                // Payment Error
                $payment->status = "error";
                $payment->save();

                // inserting notification
                $notification = new UserNotification();
                $notification->user_id = $payment->user_id;
                $notification->type = 'x-circle';
                $notification->title = $amount1 . ' Deposit Timeout';
                $notification->content = 'Your deposit of ' . $amount1 . ' USDT has been timed out';
                $notification->save();
            } else {
                // Payment Pending
                $payment->status = "pending";
                $payment->save();

                // inserting notification
                $notification = new UserNotification();
                $notification->user_id = $payment->user_id;
                $notification->type = 'clock';
                $notification->title = $amount1 . ' Deposit Pending';
                $notification->content = 'Waiting for payment to be completed, Please send ' . $amount1 . ' USDT to the address given';
                $notification->save();
            }
        }
        Log::info('Coin Payment Finish');
    }
}
