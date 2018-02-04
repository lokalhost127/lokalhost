<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {
        case 'admin':
          if (Auth::guard($guard)->check() && !Auth::guard('web')->check() ) {
              return redirect()->route('admin.dashboard');

          }
          elseif (Auth::guard('web')->check())
          {
              return redirect('/locations');
          }

          break;
          case 'web':
              if(Auth::guard($guard)->check() && !Auth::guard('admin')->check() )
              {
               return redirect()->route('/locations');
              }
              elseif (Auth::guard('admin')->check())
              {
                  return redirect()->route('admin.dashboard');
              }

              break;
        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/home');
          }
          break;
      }

      return $next($request);
    }
}
