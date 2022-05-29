<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function users()
    {
        return view('admin.dashboard.report.users');
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

    function dailyProfit()
    {
        return view('admin.dashboard.report.dailyProfit');
    }

    function allStackingBounces()
    {
        return view('admin.dashboard.report.allStackingBounces');
    }


}
