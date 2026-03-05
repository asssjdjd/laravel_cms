<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Web\LaptopController;
use App\Http\Controllers\Web\PhoneController;
use App\Http\Controllers\Web\GadgetController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\LoginController;
use Illuminate\Support\Facades\Route;


// Admin role

Route::get('/', function () {
    return view('welcome');
});

// Test domain configuration (debug)
Route::get('/test-domain', function () {
    return [
        'host' => request()->getHost(),
        'url' => request()->url(),
        'app_url' => config('app.url'),
        'scheme' => request()->getScheme(),
        'forwarded_proto' => request()->header('X-Forwarded-Proto'),
        'forwarded_host' => request()->header('X-Forwarded-Host'),
    ];
});

// Auth Routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Home
Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');

// User Frontend Routes
Route::prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/laptops', [HomeController::class, 'laptops'])->name('user.laptops');
    Route::get('/phones', [HomeController::class, 'phones'])->name('user.phones');
    Route::get('/gadgets', [HomeController::class, 'gadgets'])->name('user.gadgets');
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('user.contact');
    Route::post('/contact-us', [ContactUsController::class, 'store'])->name('user.contact.store');
    Route::get('/debug-laptops', function () {
        $laptops = \App\Models\Product::where('category', 'laptop')->paginate(12);
        dd($laptops);
    });
});

// Admin Routes - Require JWT & Admin Role
Route::middleware(['jwt', 'role:admin'])->group(function () {
    // Laptop
    Route::get('/laptops', [LaptopController::class, 'index'])->name('laptops.index');
    Route::get('/laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
    Route::post('/laptops', [LaptopController::class, 'store'])->name('laptops.store');
    Route::get('/laptops/{laptop}', [LaptopController::class, 'show'])->name('laptops.show');
    Route::get('/laptops/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptops.edit');
    Route::put('/laptops/{laptop}', [LaptopController::class, 'update'])->name('laptops.update');
    Route::delete('/laptops/{laptop}', [LaptopController::class, 'destroy'])->name('laptops.destroy');

    // Phone
    Route::get('/phones',[PhoneController::class, 'index']) -> name('phones.index');
    Route::get('/phones/create',[PhoneController::class,'create']) -> name('phones.create');
    Route::post('/phones',  [PhoneController::class, 'store'])->name('phones.store');
    Route::get('/phones/{phone}', [PhoneController::class,'show']) -> name('phones.show');
    Route::get('/phones/{phone}/edit', [PhoneController::class, 'edit'])->name('phones.edit');
    Route::put('/phones/{phone}', [PhoneController::class, 'update'])->name('phones.update');
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy'])->name('phones.destroy');

    // Gadget
    Route::get('/gadgets',[GadgetController::class, 'index']) -> name('gadgets.index');
    Route::get('/gadgets/create',[GadgetController::class,'create']) -> name('gadgets.create');
    Route::post('/gadgets',  [GadgetController::class, 'store'])->name('gadgets.store');
    Route::get('/gadgets/{gadget}', [GadgetController::class,'show']) -> name('gadgets.show');
    Route::get('/gadgets/{gadget}/edit', [GadgetController::class, 'edit'])->name('gadgets.edit');
    Route::put('/gadgets/{gadget}', [GadgetController::class, 'update'])->name('gadgets.update');
    Route::delete('/gadgets/{gadget}', [GadgetController::class, 'destroy'])->name('gadgets.destroy');

    // Admin Home
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
});
