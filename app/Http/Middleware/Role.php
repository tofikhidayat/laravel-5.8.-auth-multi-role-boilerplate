<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \App\Role  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (! $request->user()->authorizeRoles($roles)) {
            abort(403, 'This action is unauthorized.');
        }
        
        return $next($request);
    }
}
