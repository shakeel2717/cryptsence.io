<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TourWinnerController extends Controller
{
    public function tourSelf()
    {
        $users = User::where('status', 'active')->get();
        return view('admin.dashboard.tour.self', compact('users'));
    }


    public function tourDirect()
    {
        $users = User::where('status', 'active')->get();
        return view('admin.dashboard.tour.direct', compact('users'));
    }


    public function tourLevel()
    {
        $users = User::where('status', 'active')->get();
        return view('admin.dashboard.tour.level', compact('users'));
    }
}
