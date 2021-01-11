<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Hisyam
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::get('/accept/{id}', [UserController::class, 'accept'])->name('user.accept');
Route::get('/decline/{id}', [UserController::class, 'decline'])->name('user.decline');

Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
