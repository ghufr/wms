<?php

use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

// Dede

// Route::get('/', function () {
// 	return view('warehouse');
// })->name("warehouse");

Route::get('/',[WarehouseController::class, 'list'])
->name("warehouse");



// Route::get('/detail', function () {
// 	return view('warehouse_detail');
// })->name("warehouse.show");

Route::get('/{id}', [WarehouseController::class, "show"])
->name("warehouse.show");



Route::post('/', [WarehouseController::class, 'create'])
->name('warehouse.create');

Route::post('/{id}/edit', [WarehouseController::class, "edit"])
->name('warehouse.edit');



/*
Route::get('/',[WarehouseController::class, 'list'] 
)->name("warehouse");
Route::get('/show', function () {
	return view('warehouse_detail');
})->name("warehouse.show");
Route::post('/',[WarehouseController::class, 'create'])->name('warehouse.create'); //ini rencananya bakal pake modal doang
*/  