<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        if(!Auth::guard('admin')->check())
        {
            if(($request->getPathInfo()=='/admin/login') || ($request->getPathInfo()=='/admin/login'))
            {
                return $next($request);
            }
            else{return redirect('/home');}

        }
        elseif (Auth::guard('admin')->check()){
            return $next($request);
        }


    }

}
