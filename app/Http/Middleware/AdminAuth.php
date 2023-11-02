<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AdminAuth
{
    public function  handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return $next($request);
        }
        return redirect('admin/login');

    }
}