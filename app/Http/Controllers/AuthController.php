<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $credentials = $req->only('email', 'password');


        if (Auth::attempt($credentials)) {
            if (!Auth::user()->verified) {
                return back()->withErrors([
                    'verification' => 'Please wait until your verification process accepted',
                ]);
            }
            $req->session()->regenerate();
            return redirect(route('dash'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    function register(Request $req)
    {
        $credentials = $req->only('name', 'email');
        $credentials['password'] = Hash::make($req->password);
        $usr = User::find(1);

        if ($usr) {
            $credentials['role'] = 'staff';
            $credentials['verified'] = false;
        } else {
            $credentials['role'] = 'manager';
            $credentials['verified'] = true;
        }


        if (User::where('email', $credentials['email'])->exists()) {

            return back()->withErrors([
                'email' => 'Email already taken, please login...'
            ]);
        }

        User::create($credentials);

        return redirect(route('login'));
    }
    function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect(route('home'));
    }
}
