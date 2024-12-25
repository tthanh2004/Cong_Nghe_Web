<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::post('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    Route::get('/products/search', 'search')->name('search');
});
