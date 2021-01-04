<?php

use Illuminate\Support\Facades\Route;

// Hisyam

Route::get('/', function () {
	return view('products');
})->name("products");
