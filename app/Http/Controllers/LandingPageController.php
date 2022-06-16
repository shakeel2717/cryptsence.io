<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CoinpaymentsAPI;
use Exception;

class LandingPageController extends Controller
{
    public function index()
    {

        return view('landing.index');
    }


    public function privacy()
    {
        return view('landing.privacy');
    }
}
