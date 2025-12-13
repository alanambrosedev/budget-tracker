<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/summary', [DashboardController::class, 'summary'])->name('summary');
    Route::resource('incomes', IncomeController::class);
});
