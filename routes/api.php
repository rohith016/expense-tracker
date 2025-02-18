<?php

use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Support\Facades\Route;


Route::get('/expenses-by-category', [ExpenseController::class, 'getExpensesByCategory'])
    // demonstrate rate limits the api by throttle middleware
    ->middleware(['auth:sanctum', 'throttle:10,1'])
    ->name('expenses.api');

