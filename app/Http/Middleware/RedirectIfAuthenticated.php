<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class RedirectIfAuthenticated
{
    public function handle($request, callable $next, ...$guards)
    {
        return $next($request);
    }
}
