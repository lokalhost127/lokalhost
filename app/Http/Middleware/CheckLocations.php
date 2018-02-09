<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->getPathInfo() == '/locations/create') {
            return redirect('/home');
        } else
            return $next($request);
    }
}
