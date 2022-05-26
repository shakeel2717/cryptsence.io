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
}
