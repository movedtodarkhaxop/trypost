<?php

declare(strict_types=1);

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class CronController extends Controller
{
    public function queueWork(): JsonResponse
    {
        $exitCode = Artisan::call('queue:work', [
            '--stop-when-empty' => true,
            '--max-time' => 50,
            '--tries' => 3,
        ]);

        return response()->json([
            'exit_code' => $exitCode,
            'output' => Artisan::output(),
        ]);
    }

    public function scheduleRun(): JsonResponse
    {
        $exitCode = Artisan::call('schedule:run');

        return response()->json([
            'exit_code' => $exitCode,
            'output' => Artisan::output(),
        ]);
    }
}
