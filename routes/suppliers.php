<?php

use Illuminate\Support\Facades\Route;

// Cantika
Route::get('/', function () {
	return view('suppliers');
})->name("suppliers");
