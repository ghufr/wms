<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Fildzah
Route::get('/', [CategoryController::class, 'list'])->name("categories");
Route::get('/input', function () {
	return view('category_detail');
})->name("category.input");
Route::post('/', [CategoryController::class, 'create'])->name('categories.create');

Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
Route::get('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');