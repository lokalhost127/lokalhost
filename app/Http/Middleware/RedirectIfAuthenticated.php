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
            echo("case admin");
          if (Auth::guard($guard)->check() && !Auth::guard('web')->check() ) {
              echo("true");
              echo("ADMIN");
              return redirect()->route('admin.dashboard');

          }
          elseif (Auth::guard('web')->check())
          {
              echo("OMG YOU WERE LOGGED IN AS USER!!!");
              return redirect('/locations');
          }

          break;
          case 'web':
              print("case web");
              if(Auth::guard($guard)->check() && !Auth::guard('admin')->check() )
              {
                  echo("true");
                  echo("LOGGED AS USER");
//                  return redirect()->route('/locations');
              }
              elseif (Auth::guard('admin')->check())
              {
                  echo("OMG YOU WERE LOGGED IN AS ADMIN!!!");
                  return redirect()->route('admin.dashboard');
              }

              break;
        default:
            echo("case guest");
          if (Auth::guard($guard)->check()) {
              echo("GUEST");
              return redirect('/home');
          }
          break;
      }

      return $next($request);
    }
}
