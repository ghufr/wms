<?php

use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Cantika
Route::get('/',[SupplierController::class, 'list'] 
)->name("suppliers");
Route::get('/input', function () {
	return view('supplier_detail');
})->name("suppliers.input");
Route::post('/',[SupplierController::class, 'create'])->name('suppliers.create');
