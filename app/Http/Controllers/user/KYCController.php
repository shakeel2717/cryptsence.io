<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\Kyc;
use Illuminate\Http\Request;

class KYCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard.profile.kyc.index');
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
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'country' => 'required|max:255',
            'document' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // checking if this user already verified
        if (auth()->user()->kyc_status == 1) {
            return redirect()->back()->withErrors('You already verified your KYC');
        }

        // checking if already request in queue
        $security = Kyc::where('user_id', auth()->user()->id)->where('status','pending')->count();
        if ($security > 0) {
            return redirect()->back()->withErrors('Yor KYC Request Already in Progress.. Please Wait...!');
        }

        $kyc = new Kyc();
        $kyc->user_id = auth()->user()->id;
        $kyc->name = $validatedData['name'];
        $kyc->address = $validatedData['address'];
        $kyc->phone = $validatedData['phone'];
        $kyc->country = $validatedData['country'];
        if (isset($validatedData['document'])) {
            // get picture
            $profile = $request->file('document');
            $profile_name = auth()->user()->username . time() . '.' . $profile->getClientOriginalExtension();
            $profile->move(public_path('assets/kyc'), $profile_name);
            $kyc->document = $profile_name;
            $kyc->save();
            return redirect()->back()->with('success', 'KYC has been Submitted successfully');
        } else {
            return redirect()->back()->withErrors('Please upload a valid document');
        }
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
