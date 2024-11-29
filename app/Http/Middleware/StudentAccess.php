<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('student')->check()) {
            return $next($request);
        }
        
        // 404 sahifaga yo'naltirish
        abort(404);
    }
}
