<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FoodpackageController;
use App\Http\Controllers\AllergyController;
use App\Http\Controllers\ProductController; // ✅ NIEUW

// Home & Dashboard
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profielroutes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

// Customer managing routes (gedeeld)
Route::middleware(['auth', 'role:manager|employee|volunteer'])->group(function () {
    Route::post('/customers/filter', [CustomerController::class, 'filter'])->name('customers.filter');
    Route::resource('customers', CustomerController::class);
});

// MANAGER routes
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

    // Supplier routes
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/supplier/filter', [SupplierController::class, 'filter'])->name('supplier.filter');

    // ✅ Let op: deze route moet overeenkomen met jouw view met $supplier
    Route::get('/supplier/{supplier}/product', [SupplierController::class, 'showProducts'])->name('supplier.show');

    // ✅ Product editing
    Route::get('/supplier/{supplier}/product/{product}/edit', [SupplierController::class, 'editProduct'])->name('supplier.product.edit');
    Route::put('/supplier/{supplier}/product/{product}', [SupplierController::class, 'updateProduct'])->name('supplier.product.update');

    // Overige functionaliteit
    Route::get('/foodpackage', [FoodpackageController::class, 'index'])->name('foodpackage.index');
    Route::get('/allergie', [AllergyController::class, 'index'])->name('allergie.index');
});

// EMPLOYEE routes
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
});

// VOLUNTEER routes
Route::middleware(['auth', 'role:volunteer'])->prefix('volunteer')->name('volunteer.')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/foodpackage', [FoodpackageController::class, 'index'])->name('foodpackage.index');
});

// Laravel auth routes
require __DIR__.'/auth.php';

