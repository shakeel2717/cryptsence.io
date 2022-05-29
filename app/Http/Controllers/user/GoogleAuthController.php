<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Authenticator;
use App\Models\User;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->google == null) {
            $Authenticator = new Authenticator();
            // $secret = $Authenticator->generateRandomSecret();
            $secret = "VMP2NO24AEDYGEW7";
            $qrCode = $Authenticator->getQR(auth()->user()->username, $secret);
            session(['googleSecret' => $secret]);
            return view('user.dashboard.google.index', compact('secret', 'qrCode'));
        } else {
            return view('user.dashboard.google.googleEdit');
        }
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
        $validatedData = $request->validate([
            'pin' => 'required|min:6|max:6',
        ]);
        // checking if this Code is match.
        $Authenticator = new Authenticator();
        $checkCode = $Authenticator->verifyCode(session('googleSecret'), $validatedData['pin'], 0);
        if (!$checkCode) {
            return redirect()->back()->withErrors('Invalid Code, Please try again! Authentication Failed!.');
        }
        // updating into database
        $task = User::find(auth()->user()->id);
        $task->google = session('googleSecret');
        $task->save();

        return redirect()->back()->with('success', '2fa Security Successfully Updated!');
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

    public function googleEdit()
    {
        return view('user.dashboard.google.googleEdit');
    }

    public function googleUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'pin' => 'required|min:6|max:6',
        ]);
        // checking if this Code is match.
        $Authenticator = new Authenticator();
        $checkCode = $Authenticator->verifyCode(auth()->user()->google, $validatedData['pin'], 0);
        if (!$checkCode) {
            return redirect()->back()->withErrors('Invalid Code, Please try again! Authentication Failed!.');
        }
        // updating into database
        $task = User::find(auth()->user()->id);
        $task->google = null;
        $task->save();

        return redirect()->back()->with('success', '2fa Security Deactivated Successfully');
    }
}
