<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype == 'student') {
            return $next($request);
        }
        else if (Auth::check() && Auth::user()->usertype == 'admin') {
            return redirect('/admin/dashboard'); // Redirect admin users to admin dashboard
        }
            abort(403);
      }
    }
