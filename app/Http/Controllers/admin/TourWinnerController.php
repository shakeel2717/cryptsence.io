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
}
