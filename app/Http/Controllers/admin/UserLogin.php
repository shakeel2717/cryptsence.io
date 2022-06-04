<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Controller
{
    public function usersLogin(Request $request, $id)
    {
        $user = User::find($id);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        session()->forget('googleauth');

        $request->session()->regenerateToken();

        session(['googleauth' => true]);

        //login Auth
        Auth::guard('web')->loginUsingId($user->id);

        return redirect('/');
    }
}
