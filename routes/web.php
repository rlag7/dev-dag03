<?php

use App\Http\Controllers\ProductSupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FoodpackageController;
use App\Http\Controllers\AllergyController;

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

// Customer managing routes
Route::middleware(['auth', 'role:manager|employee|volunteer'])->group(function () {
    Route::post('/customers/filter', [CustomerController::class, 'filter'])->name('customers.filter');
    Route::resource('customers', CustomerController::class);
});

// MANAGER routes
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/supplier/filter', [SupplierController::class, 'filter'])->name('supplier.filter');
    Route::get('/supplier/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');

    // ✅ Correcte edit en update routes voor producten per leverancier
    Route::get('/supplier/{supplier}/product/{product}/edit', [ProductSupplierController::class, 'edit'])
        ->name('product_supplier.edit');
    Route::put('/supplier/{supplier}/product/{product}', [ProductSupplierController::class, 'update'])
        ->name('product_supplier.update');



    // Other manager-only routes
    Route::get('/foodpackage', [FoodpackageController::class, 'index'])->name('foodpackage.index');
    Route::get('/foodpackage/{id}/edit', [FoodPackageController::class, 'edit'])->name('foodpackage.edit');
    Route::put('/foodpackage/{id}', [FoodPackageController::class, 'update'])->name('foodpackage.update');
    Route::get('/allergie', [AllergyController::class, 'index'])->name('allergie.index');
    Route::get('/allergie/{family}', [AllergyController::class, 'show'])->name('allergie.show');
    Route::get('/allergie/{allergy}/edit', [AllergyController::class, 'edit'])->name('allergie.edit');
    Route::put('/allergie/{allergy}', [AllergyController::class, 'update'])->name('allergie.update');

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

require __DIR__.'/auth.php';
