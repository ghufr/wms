<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Fildzah
Route::get('/', [CategoryController::class, 'list'])->name("categories");
Route::get('/input', function () {
	return view('category_detail');
})->name("categories.input");
Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

Route::post('/', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
