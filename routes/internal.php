<?php

declare(strict_types=1);

use App\Http\Controllers\Internal\CronController;
use Illuminate\Support\Facades\Route;

Route::middleware('cron.token')->prefix('internal/cron')->group(function () {
    Route::post('/queue-work', [CronController::class, 'queueWork'])->name('internal.cron.queue-work');
    Route::post('/schedule-run', [CronController::class, 'scheduleRun'])->name('internal.cron.schedule-run');
});
