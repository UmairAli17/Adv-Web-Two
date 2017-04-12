<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class DetectRoles
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
        $roles = explode('|', $role);
        foreach ($roles as $role) {
            if(Auth::check() && Auth::user()->hasRole($role))
            {
                return $next($request);
            }
        }
        return back();
        return $next($request);
    }
}
