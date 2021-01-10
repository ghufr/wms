<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Ghufron
Route::get('/', [DashboardController::class, 'view'])->name("dash");
