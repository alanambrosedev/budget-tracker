<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route; // <-- IMPORTANT: Add this line

Route::get('/', [DashboardController::class, 'index']); // <-- Use the Controller method

// Remove the previous closure route if it's still there
