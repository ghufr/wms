<?php

use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

// Dede

Route::get('/',[WarehouseController::class, 'list'])
->name("warehouse");

Route::get('/{id}', [WarehouseController::class, "show"])
->name("warehouse.show");

Route::post('/', [WarehouseController::class, 'create'])
->name('warehouse.create');

Route::post('/{id}/edit', [WarehouseController::class, "edit"])
->name('warehouse.edit');