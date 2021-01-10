<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TransactionController::class, "list"])->name("transactions");
Route::get('/input', [TransactionController::class, "input"])->name("transactions.input");
Route::get('/edit/{id}', [TransactionController::class, "edit"])->name('transactions.edit');

// Create
Route::post('/', [TransactionController::class, "create"])->name("transactions.create");

// Delete
// Route::get('/delete/{id}', [TransactionController::class, "delete"])->name('transactions.delete');

// Update
// Route::post('/update/{id}', [TransactionController::class, "update"])->name('transactions.update');
