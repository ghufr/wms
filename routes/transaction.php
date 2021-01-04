<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('transactions');
})->name("transactions");
Route::get('/input', [TransactionController::class, "input"])->name("transactions.input");
Route::get('/list', [TransactionController::class, "list"])->name("transactions.list");
Route::get('/{id}', [TransactionController::class, "get"])->name('transactions.get');
Route::post('/', [TransactionController::class, "create"])->name("transactions.create");
