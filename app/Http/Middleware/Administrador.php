<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Administrador
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
        if(auth()->user()->roles[0]->name != "Administrador")
            return redirect()->route('cupon.index');

        return $next($request);
    }
}
