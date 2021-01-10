<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Hisyam
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
