<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\Kyc;
use Illuminate\Http\Request;

class KYCController extends Controller
{
    public function approve($id)
    {
        $kyc = Kyc::findOrFail($id);
        $kyc->status = 'approved';
        $kyc->save();

        $user = User::find($kyc->user_id);
        $user->kyc_status = 1;
        $user->save();

        return redirect()->back()->with('success', 'KYC has been approved');
    }


    public function decline($id)
    {
        $kyc = Kyc::findOrFail($id);
        $kyc->delete();

        $user = User::find($kyc->user_id);
        $user->kyc_status = 2;
        $user->save();

        return redirect()->back()->with('success', 'KYC has been Declined');
    }
}
