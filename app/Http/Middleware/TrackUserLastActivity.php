<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Auth;

class TrackUserLastActivity extends Middleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Auth::user()->timestamps = false;
            Auth::user()->update([
                'last_active_at' => now(),
            ]);
            Auth::user()->timestamps = true;
        }

        return $next($request);
    }
}
