<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Authenticator;
use App\Models\LoginHistory;
use App\Models\user\Referral;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Facades\Agent;
use Stevebauman\Location\Facades\Location;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }


    public function googleauth()
    {
        if (session()->has('googleauth')) {
            return redirect()->route('user.index.index');
        }
        return view('auth.googleauth');
    }

    public function googleauthReq(Request $request)
    {
        $validatedData = $request->validate([
            'secret' => 'required|min:6|max:6',
        ]);

        // checking if this Code is match.
        $Authenticator = new Authenticator();
        $checkCode = $Authenticator->verifyCode(auth()->user()->google, $validatedData['secret'], 0);
        if (!$checkCode) {
            return redirect()->back()->withErrors('Invalid Code, Please try again! Authentication Failed!.');
        }

        session(['googleauth' => true]);

        return redirect()->route('user.index.index');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $location = Location::get();

        if (env('APP_ENV') != 'local') {
            // creating Log Entry
            $history = new LoginHistory();
            $history->user_id = Auth::user()->id;
            $history->device = getDevice();
            $history->os = Agent::platform();
            $history->os_version = Agent::version($history->os);
            $history->browser = Agent::browser();
            $history->browser_version = Agent::version($history->browser);
            $history->country = $location->countryName;
            $history->city = $location->cityName;
            $history->zip = $location->zipCode;
            $history->save();
        }

        // checking if this user not have valid referral code
        if (auth()->user()->referral == null) {
            Log::info('User not have valid referral code');
            $referral = Referral::create([
                'user_id' => auth()->user()->id,
                'referral_code' => random(10),
            ]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        session()->forget('googleauth');

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
