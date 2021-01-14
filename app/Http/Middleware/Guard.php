<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Guard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->designation_id == 1) {
            return redirect()->route('home');
        }

        if (Auth::user()->designation_id == 4) {
            return $next($request);
        }

        if (Auth::user()->designation_id == 2) {
            return redirect()->route('employee-profile');
        }
    }
}
