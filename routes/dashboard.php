<?php

use Illuminate\Support\Facades\Route;

// Ghufron
Route::get('/', function () {
	return view('dash');
})->name("dash");
