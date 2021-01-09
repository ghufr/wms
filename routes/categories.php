<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Fildzah
Route::get('/', [CategoryController::class, 'list']
)->name("categories");

Route::get('/input', function () {
	return view('category_detail');
})->name("category.input");

Route::post('/', [CategoryController::class, 'create'])-> name ('categories.create');
