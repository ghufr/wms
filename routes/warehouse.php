<?php

use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

// Dede

Route::get('/', [WarehouseController::class, 'list'])
	->name("warehouse");

Route::get('/{id}', [WarehouseController::class, "show"])
	->name("warehouse.show");

Route::post('/', [WarehouseController::class, 'create'])
	->name('warehouse.create');

Route::post('/{id}/edit', [WarehouseController::class, "edit"])
	->name('warehouse.edit');


Route::post('/{id}/add-staff', [WarehouseController::class, "addStaff"])->name('warehouse.addStaff');
Route::get('/{id}/delete-staff/{userId}', [WarehouseController::class, "deleteStaff"])->name("warehouse.deleteStaff");
