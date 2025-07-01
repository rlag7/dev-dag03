<?php

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

// MANAGER routes
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers/filter', [CustomerController::class, 'filter'])->name('customers.filter');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/foodpackage', [FoodpackageController::class, 'index'])->name('foodpackage.index');
    Route::get('/foodpackage/{id}/edit', [FoodPackageController::class, 'edit'])->name('foodpackage.edit');
    Route::put('/foodpackage/{id}', [FoodPackageController::class, 'update'])->name('foodpackage.update');
   // Route::get('/allergie', [AllergyController::class, 'index'])->name('allergie.index');
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
