<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NftReferralRewardController extends Controller
{
    public function direct()
    {
        return view('user.dashboard.nft.referral.direct');
    }


    public function level1()
    {
        return view('user.dashboard.nft.referral.level1');
    }

    public function level2()
    {
        return view('user.dashboard.nft.referral.level2');
    }

    public function level3()
    {
        return view('user.dashboard.nft.referral.level3');
    }
}
