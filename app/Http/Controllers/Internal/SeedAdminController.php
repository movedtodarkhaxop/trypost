<?php

declare(strict_types=1);

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class SeedAdminController extends Controller
{
    /**
     * One-time bootstrap for deployments with no shell/exec access to the
     * container (e.g. Render's free tier). UserSeeder itself no-ops if any
     * user already exists, so this is safe to call more than once.
     */
    public function __invoke(): JsonResponse
    {
        $exitCode = Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\UserSeeder',
            '--force' => true,
        ]);

        return response()->json([
            'exit_code' => $exitCode,
            'output' => Artisan::output(),
        ]);
    }
}
