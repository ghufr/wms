<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Hisyam

Route::get('/',[ProductController::class, 'list'])->name("products");

// Route::get('/Product', [PagesController::class, 'product_detail']);


Route::get('/input', function () {
    return view('product_detail');
})->name("product_input");

Route::post('/',[ProductController::class, 'create'])->name("product.create");

Route::get('/edit/{id}', [ProductController::class, 'edit'])->name("products.edit");
Route::get('/delete/{id}', [ProductController::class, 'delete'])->name("products.delete");
Route::get('/update/{id}', [ProductController::class, 'update'])->name("products.update");




