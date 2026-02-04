<?php

use App\Http\Controllers\Web\LaptopController;
use Illuminate\Support\Facades\Route;


// Admin role

Route::get('/', function () {
    return view('welcome');
});

// Laptop

Route::get('/laptops', [LaptopController::class, 'index'])->name('laptops.index');
Route::get('/laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
Route::post('/laptops', [LaptopController::class, 'store'])->name('laptops.store');
Route::get('/laptops/{laptop}', [LaptopController::class, 'show'])->name('laptops.show');
Route::get('/laptops/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptops.edit');
Route::put('/laptops/{laptop}', [LaptopController::class, 'update'])->name('laptops.update');
Route::delete('/laptops/{laptop}', [LaptopController::class, 'destroy'])->name('laptops.destroy');

// 

// Route::get('/phones',)

// User role 