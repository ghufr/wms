<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('dash'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    function register(Request $request)
    {
        $credentials = $request->only('name', 'email');
        $credentials['password'] = Hash::make($request->password);

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
