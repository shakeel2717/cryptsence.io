<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.options.index');
    }
}
