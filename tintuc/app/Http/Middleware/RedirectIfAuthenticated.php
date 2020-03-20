<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
        // switch ($guard) {
        //     case 'admin':
        //         # code...
        //     return redirect()->route('admin');
        //         break;
            
        //     default:
        //         # code...
        //         return redirect('/admin/user');
        //         break;
        // }
        // return $next($request);
    }
}
