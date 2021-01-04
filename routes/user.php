<?php

use Illuminate\Support\Facades\Route;

// Hisyam
Route::get('/profile', function () {
	return view('profile');
})->name("profile");
