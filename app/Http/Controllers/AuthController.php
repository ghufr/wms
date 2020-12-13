<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login()
    {
        // TODO: Implement login
        return redirect(route('dash'));
    }
    function register()
    {
        // TODO: Implement register
        return redirect(route('login'));
    }
    function logout()
    {
        // TODO: Implement logout
        return redirect(route('home'));
    }
}
