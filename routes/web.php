<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
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
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/filter', [ClientController::class, 'filter'])->name('clients.filter');

    // View customer details
    Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');

    // Edit customer
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
});


require __DIR__.'/auth.php';
