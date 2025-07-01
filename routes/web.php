<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AllergyController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\FoodpackageController;

// Dashboard
Route::get('/', fn() => view('welcome'));
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

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

// MANAGER routes
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/allergie', [AllergyController::class, 'index'])->name('allergie.index');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/filter', [ClientController::class, 'filter'])->name('clients.filter');
    Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/foodpackage', [FoodpackageController::class, 'index'])->name('foodpackage.index');
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
