<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\KYC;
use Illuminate\Http\Request;

class KYCController extends Controller
{
    public function approve($id)
    {
        $kyc = KYC::findOrFail($id);
        $kyc->status = 'approved';
        $kyc->save();

        return redirect()->back()->with('success', 'KYC has been approved');
    }


    public function decline($id)
    {
        $kyc = KYC::findOrFail($id);
        $kyc->delete();

        return redirect()->back()->with('success', 'KYC has been Declined');
    }
}
