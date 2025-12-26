<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::bind('task_id', function (string $val) {
            return Task::where('uuid', $val)->firstOrFail();
        });
    }
}
