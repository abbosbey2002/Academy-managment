<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'student') {
                return redirect('/student/dashboard');
            }
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}

