<?php

namespace App\Http\Middleware;

use Closure;

class CheckBiblioteca
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
        if (auth()->user()->checkBiblio()) {
            return $next($request);
        }

        return redirect()->route('home')->with('estado', 'No eres un ratón de Biblioteca ...');
    }
}
