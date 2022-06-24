<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserModeSpecified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() == null || $request->user()->user_mode != null) {
            return $next($request);
        }
        else {
            return redirect(route('profile.mode-select'));
        }
    }
}
