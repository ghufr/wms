<?php

use Illuminate\Support\Facades\Route;

// Dede

Route::get('/', function () {
	return view('warehouse');
})->name("warehouse");
