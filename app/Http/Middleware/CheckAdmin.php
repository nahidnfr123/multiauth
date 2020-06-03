<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::user()){
            if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super_admin')) {
                return $next($request);
            }

            // If a non admin user is logged in and trying to access admin page show 404
            abort(404, 'Page Not Found.');
        }
        // User is not logged in show admin page ...
        return redirect(route('admin.login'));
    }
}
