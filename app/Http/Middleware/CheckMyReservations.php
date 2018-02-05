<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckMyReservations
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
        if(!Auth::guard('web')->check()) {
            return redirect("/home");
        }

        return $next($request);

    }
}
