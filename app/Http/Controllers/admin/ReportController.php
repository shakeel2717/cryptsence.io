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
}
