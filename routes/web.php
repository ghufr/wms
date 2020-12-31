<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dash');
    })->name("dash");

    Route::get('/warehouse', function () {
        return view('warehouse');
    })->name("warehouse");

    Route::get('/suppliers', function () {
        return view('suppliers');
    })->name("suppliers");

    Route::get('/products', function () {
        return view('products');
    })->name("products");

    Route::get('/categories', function () {
        return view('categories');
    })->name("categories");

    Route::get('/transactions', function () {
        return view('transactions');
    })->name("transactions");

    Route::get('/profile', function () {
        return view('profile');
    })->name("profile");
});

// TODO: Manager Routes

// Public routes
Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");


Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
