<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;

Route::get('/', [HomeController::class, 'index']);
Route::get('posts', [MedicineController::class, 'index']);
Route::get('medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::resource('medicines', MedicineController::class);
