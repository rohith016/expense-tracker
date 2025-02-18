<?php

use App\Http\Controllers\{
    ProfileController,
    CategoryController,
    ExpenseController,
    DashboardController,
};
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /**
     * user actions
     */
    Route::resource('categories', CategoryController::class);
    Route::resource('expenses', ExpenseController::class);
});

require __DIR__.'/auth.php';
