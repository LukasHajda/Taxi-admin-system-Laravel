<?php

namespace App\Http\Middleware;

use Closure;

class CheckRolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (auth()->check()) {
            $user = auth()->user();

           if ($role == 'admin' && $user->admin) return $next($request);
           if ($role == 'driver' && ($user->driver || $user->operator || $user->supervisor || $user->admin)) return $next($request);
           if ($role == 'supervisor' && ($user->supervisor || $user->admin)) return $next($request);
           if ($role == 'operator' && ($user->supervisor || $user->admin || $user->operator)) return $next($request);
        }

        return route('login');
    }
}
