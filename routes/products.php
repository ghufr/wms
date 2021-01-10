<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Hisyam

Route::get('/', [ProductController::class, 'list'])->name("products");
Route::get('/input', [ProductController::class, 'input'])->name("products.input");
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name("products.edit");


Route::post('/', [ProductController::class, 'create'])->name("products.create");
Route::get('/delete/{id}', [ProductController::class, 'delete'])->name("products.delete");
Route::post('/update/{id}', [ProductController::class, 'update'])->name("products.update");
