<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->usertype == 'admin' || Auth::user()->usertype == 'superadmin') {
            return $next($request);
        } else {
            return redirect('/dashboard');
        }
    }
}
