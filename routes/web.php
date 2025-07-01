<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});


Route::middleware(['auth', 'role:manager|employee|volunteer'])->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers/filter', [CustomerController::class, 'filter'])->name('customers.filter');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
});
    // Customer overview and filtering
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers/filter', [CustomerController::class, 'filter'])->name('customers.filter');

    // View customer details
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');

    // Edit customer
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
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
    Route::get('/foodpackage', [FoodpackageController::class, 'edit'])->name('foodpackage.edit');
});

require __DIR__.'/auth.php';
