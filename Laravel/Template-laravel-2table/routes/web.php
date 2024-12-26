<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ClassController::class)->group(function () {
    Route::get('/class', 'index')->name('class.index');
    Route::get('/class/create', 'create')->name('class.create');
    Route::post('class', 'store')->name('class.store');
    Route::get('/class/{class}/edit', 'edit')->name('class.edit');
    Route::post('/class/{class}/update', 'update')->name('class.update');
    Route::delete('/class/{class}\destroy', 'destroy')->name('class.destroy');
    Route::get('/class/search', 'search')->name('class.search');
});
