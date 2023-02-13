<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // checking suspend status
        if (auth()->user()->status == 'suspend') {
            // logout
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route("login")->withErrors("Account Suspended, Please Contact Support");
        }
        
        if (Auth::user()->role == 'user') {
            if (auth()->user()->google != null) {
                if (!$request->session()->exists('googleauth')) {
                    return redirect()->route('googleauth')->withErrors('Google Authentication Required');
                }
            }
            if (auth()->user()->address == "") {
                $user = User::find(auth()->user()->id);
                $user->address = addressGenerate();
                $user->save();
                auth()->user()->address = $user->address;
            }
            return $next($request);
        } elseif (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index.index');
        }
        return redirect()->route('login');
    }
}
