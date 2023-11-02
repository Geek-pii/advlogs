<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = Auth::guard($guard)->user();

        switch ($guard) {
            case 'admin':
                if (Auth::guard('admin')->check()) {
                    return redirect('/' . app()->getLocale() . '/admin');
                }
                break;

        }

        return $next($request);
    }
}
