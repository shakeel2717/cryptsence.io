<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\Transaction;
use App\Models\user\Withdraw;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function users()
    {
        return view('admin.dashboard.report.users');
    }

    function kyc()
    {
        return view('admin.dashboard.report.kyc');
    }

    function deposits()
    {
        return view('admin.dashboard.report.deposit');
    }

    function withdrawals()
    {
        return view('admin.dashboard.report.withdrawals');
    }

    function convert()
    {
        return view('admin.dashboard.report.convert');
    }

    function allStackingBounces()
    {
        return view('admin.dashboard.report.allStackingBounces');
    }


    function withdrawalsPending()
    {
        return view('admin.dashboard.report.withdrawalsPending');
    }


    function withdrawalsApprove()
    {
        return view('admin.dashboard.report.withdrawalsApprove');
    }

    public function withdrawApprove($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->status = 'approved';
        $withdraw->save();

        // approving this transaction
        $transaction = Transaction::where('user_id', $withdraw->user_id)->where('type', 'withdraw')->where('amount', $withdraw->amount)->where('status', 'pending')->first();
        $transaction->status = 'approved';
        $transaction->save();

        return redirect()->back()->with('success', 'Withdrawal Approved');
    }

    public function withdrawReject($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->delete();

        // approving this transaction
        $transaction = Transaction::where('user_id', $withdraw->user_id)->where('type', 'withdraw')->where('amount', $withdraw->amount)->where('status', 'pending')->first();
        // getting this Transaction fee
        $transactionFees = Transaction::where('note', $transaction->id)->first();
        $transactionFees->delete();
        $transaction->delete();


        return redirect()->back()->with('success', 'Withdrawal Request Rejected');
    }


    public function nft()
    {
        return view('admin.dashboard.report.nft');
    }
}
