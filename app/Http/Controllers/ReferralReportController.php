<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralReportController extends Controller
{
    public function direct()
    {
        return view('user.dashboard.referral.direct');
    }


    public function level1()
    {
        return view('user.dashboard.referral.level1');
    }

    public function level2()
    {
        return view('user.dashboard.referral.level2');
    }

    public function level3()
    {
        return view('user.dashboard.referral.level3');
    }
}
