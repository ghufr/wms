<?php

use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Cantika
Route::get('/', [SupplierController::class, 'list'])->name("suppliers");
Route::get('/input', function () {
	return view('supplier_detail');
})->name("suppliers.input");
Route::post('/', [SupplierController::class, 'create'])->name('suppliers.create');

Route::get('/edit/{id}', [SupplierController::class, "edit"])->name('suppliers.edit');
Route::get('/delete/{id}', [SupplierController::class, "delete"])->name('suppliers.delete');
Route::post('/update/{id}', [SupplierController::class, "update"])->name('suppliers.update');