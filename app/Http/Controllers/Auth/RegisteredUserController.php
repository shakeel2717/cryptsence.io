<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterBonus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user\Referral;
use App\Models\user\Transaction;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Stevebauman\Location\Facades\Location;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($refer = null)
    {
        if ($refer != null) {
            $refer = Referral::where('referral_code', $refer)->firstOrFail();
            if (!validateStaking($refer->user_id)) {
                return "<h1 style='text-align:center;'>To available this link for reference you are required to purchase minimum 1000 CTSE for activate this referral link</h1>";
            }
        } else {
            $refer = null;
        }
        return view('auth.register', compact('refer'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'referral_code' => ['nullable', 'string', 'max:255', 'exists:referrals'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $thisRefer = Referral::where('referral_code', $request->referral_code)->first();
        if ($thisRefer) {
            Log::info('Referral code is valid');
            $refer = $thisRefer->user->username;
            if (!validateStaking($thisRefer->user_id)) {
                return redirect()->back()->with('error', 'You are not eligible to signup under this sponser.');
            }
            Log::info('Refer Username Got');
        } else {
            Log::info('NO Refer FOund');
            $refer = 'default';
        }

        $location = Location::get();

        // remove all spaces from username
        $username = str_replace(' ', '', $request->username);
        // convert to lowercase
        $username = strtolower($username);

        $user = new User();
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->username = $username;
        $user->refer = $refer;
        $user->password = Hash::make($request->password);
        if (env('APP_ENV') != 'local') {
            $user->country = $location->countryName;
            $user->region = $location->regionName;
            $user->city = $location->cityName;
            $user->zip = $location->zipCode;
            $user->latitude = $location->latitude;
            $user->longitude = $location->longitude;
        }
        $user->save();


        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);

        event(new Registered($user));

        // inserting bonus for this user
        Auth::login($user);

        event(new RegisterBonus($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
