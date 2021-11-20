<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }

            if (Auth::guard($guard)->check() && Auth::user()->role=='Super') {
                return redirect()->route('admin.dashboard');
            }
            else if(Auth::guard($guard)->check() && Auth::user()->role=='Doctor') {
                return redirect()->route('doctor.dashboard');
            }
            else if(Auth::guard($guard)->check() && Auth::user()->role=='Hospital') {
                return redirect()->route('hospital.dashboard');
            }
            else if(Auth::guard($guard)->check() && Auth::user()->role=='Patient') {
                return redirect()->route('patient.home');
            }
        }

        return $next($request);
    }
}
