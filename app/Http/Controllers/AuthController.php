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
            $req->session()->regenerate();
            $name = Auth::user()->name;
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
        $count = User::all()->count();

        if ($count > 0) {
            $credentials['role'] = 'staff';
        } else {
            $credentials['role'] = 'manager';
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
