<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
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
        if (auth()->user()->checkAdmin()) {
            return $next($request);
        }

        return redirect()->route('home')->with('estado', 'No tienes permiso ...');
    }
}
