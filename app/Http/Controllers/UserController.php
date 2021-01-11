<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function profile()
    {
        $user = Auth::user();

        return view('profile', ['user' => $user]);
    }

    function delete(Request $req, $id)
    {
        User::destroy($id);
        return redirect(route('dash'));
    }

    function edit()
    {
    }

    function update()
    {
    }

    function accept(Request $req, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->withErrors(['user' => 'User not found']);
        }
        $user->verified = true;
        $user->save();
        return back();
    }
    function decline(Request $req, $id)
    {
        User::where('id', $id)->where('verified', false)->destroy();
        return back();
    }
}
