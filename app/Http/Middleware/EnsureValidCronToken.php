<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureValidCronToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $configured = config('trypost.cron.token');

        if (! is_string($configured) || $configured === '' || ! hash_equals($configured, (string) $request->bearerToken())) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
