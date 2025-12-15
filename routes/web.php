<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::fallback(function () {
    return 'Miantenance Mode On';
});

Route::controller(DashboardController::class)->domain('app.example.com')->middleware(['auth', 'web'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::resource('tasks')->only(['index', 'store']);
});

Route::scopeBindings()->group(function () {
    Route::get('/users/{user}/tasks/{task}', function (User $user, Task $task) {
        return $task;
    });
});
Route::bind('task', function ($val) {
    return Task::where('slug', $val)->firstOrFail();
});
Route::middleware(['auth'])->group(function () {
    Route::get('/summary', [DashboardController::class, 'summary'])->name('summary');
    Route::resource('incomes', IncomeController::class);
});

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::middleware(['auth.basic'])->group(function () {
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
