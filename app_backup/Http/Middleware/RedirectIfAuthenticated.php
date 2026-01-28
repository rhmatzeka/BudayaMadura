<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (\Illuminate\Support\Facades\Auth::guard($guard)->check()) {
                return redirect(route('home'));
            }
        }
        return $next($request);
    }
}
