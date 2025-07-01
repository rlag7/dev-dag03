<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

// Profiel
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

// Shared customer routes for all roles
Route::middleware(['auth', 'role:manager|employee|volunteer'])->group(function () {
    // Customer overview and filtering
    Route::get('/clients', [CustomerController::class, 'index'])->name('clients.index');
    Route::post('/clients/filter', [CustomerController::class, 'filter'])->name('clients.filter');

    // View customer details
    Route::get('/clients/{id}', [CustomerController::class, 'show'])->name('clients.show');

    // Edit customer
    Route::get('/clients/{id}/edit', [CustomerController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [CustomerController::class, 'update'])->name('clients.update');
});

// EMPLOYEE routes
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
});

// VOLUNTEER routes
Route::middleware(['auth', 'role:volunteer'])->prefix('volunteer')->name('volunteer.')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/foodpackage', [FoodpackageController::class, 'edit'])->name('foodpackage.edit');
});

require __DIR__.'/auth.php';
