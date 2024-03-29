<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BonusPolicy;
use App\Models\LoginHistory;
use App\Models\user\Referral;
use App\Models\user\StakingBonus;
use App\Models\user\Transaction;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = LoginHistory::where('user_id', auth()->user()->id)->latest()->limit(4)->get();
        $transactions = Transaction::where('user_id', auth()->id())->latest()->limit(3)->get();
        $stakingBonuses = StakingBonus::where('user_id', auth()->id())->latest()->limit(3)->get();
        $policies = BonusPolicy::whereIn('id', GetTodayActivePolicy())->get();
        return view('user.dashboard.index', compact('histories', 'transactions', 'stakingBonuses', 'policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
