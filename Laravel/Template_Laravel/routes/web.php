<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('/products/list');
});

Route::get('/products', [ProductsController::class, 'index']);
