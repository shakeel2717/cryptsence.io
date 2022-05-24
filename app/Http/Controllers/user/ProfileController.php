<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard.profile.index');
    }


    public function changePassword()
    {
        return view('user.dashboard.profile.change-password');
    }


    public function updatePassword()
    {
        $validatedData = request()->validate([
            'cpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        // checking if this user password is correct
        if (Hash::check(request('cpassword'), auth()->user()->password)) {
            // updating the user password
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make(request('password'));
            $user->save();
            // redirecting to the profile page
            return redirect()->route('user.profile.index')->with('success', 'Password updated successfully');
        } else {
            // redirecting to the profile page
            return redirect()->route('user.profile.index')->withErrors('Current password is incorrect');
        }
    }


    public function recentLogin()
    {
        $histories = LoginHistory::where('user_id', auth()->user()->id)->latest()->get();
        return view('user.dashboard.profile.recentLogin', compact('histories'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'phone' => 'required|max:255',
            'region' => 'required|max:255',
            'zip' => 'required|max:255',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->phone = $validatedData['phone'];
        $user->region = $validatedData['region'];
        $user->zip = $validatedData['zip'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');


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
