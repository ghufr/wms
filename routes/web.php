<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    Route::prefix('transactions')->group(__DIR__ . '/transaction.php');
    Route::prefix('products')->group(__DIR__ . '/products.php');
    Route::prefix('suppliers')->group(__DIR__ . '/suppliers.php');
    Route::prefix('categories')->group(__DIR__ . '/categories.php');
    Route::get('/profile', [UserController::class, 'profile'])->name("user.profile");
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::prefix('warehouse')->group(__DIR__ . '/warehouse.php');
    Route::prefix('dashboard')->group(__DIR__ . '/dashboard.php');
    Route::prefix('user')->group(__DIR__ . '/user.php');
});


// Guest routes
Route::middleware(['auth'])->group(function () {
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
});
