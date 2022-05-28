<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function recent()
    {
        return view('user.dashboard.report.transaction.recent');
    }


    public function deposits()
    {
        return view('user.dashboard.report.transaction.deposits');
    }

    public function withdrawals()
    {
        return view('user.dashboard.report.transaction.withdrawals');
    }

    public function convert()
    {
        return view('user.dashboard.report.transaction.convert');
    }

    public function dailyProfit()
    {
        return view('user.dashboard.report.transaction.dailyProfit');
    }

    public function allStackingBounces()
    {
        return view('user.dashboard.report.transaction.allStackingBounces');
    }
    public function allRefers()
    {
        return view('user.dashboard.report.transaction.allRefers');
    }


}
