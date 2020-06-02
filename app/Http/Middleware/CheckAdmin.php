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
            return redirect()->back()->withErrors('error', 'Invalid credentials.' );
        }
        return redirect(route('admin.login'))->with('Info', 'Please login as a admin to access the admin panel.');
    }
}
