<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TransactionController::class, "list"])->name("transactions");
Route::get('/inbound', [TransactionController::class, "inbound"])->name("transactions.inbound");
Route::get('/outbound', [TransactionController::class, "outbound"])->name("transactions.outbound");
Route::get('/edit/{id}', [TransactionController::class, "edit"])->name('transactions.edit');

// Create
Route::post('/create', [TransactionController::class, "create"])->name("transactions.create");
Route::post('/sub', [TransactionController::class, "sub"])->name("transactions.sub");


// Delete
// Route::get('/delete/{id}', [TransactionController::class, "delete"])->name('transactions.delete');

// Update
// Route::post('/update/{id}', [TransactionController::class, "update"])->name('transactions.update');
