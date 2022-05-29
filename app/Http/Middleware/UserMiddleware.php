<?php

namespace App\Http\Middleware;

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
        if (Auth::user()->role == 'user') {
            if (auth()->user()->google != null) {
                if (!$request->session()->exists('googleauth')) {
                    return redirect()->route('googleauth')->withErrors('Google Authentication Required');
                }
            }
            return $next($request);
        } elseif (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index.index');
        }
        return redirect()->route('login');
    }
}
