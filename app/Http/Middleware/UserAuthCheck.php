<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuthCheck
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
          
        if (\Session::get('userEmail') == null || \Session::get('userEmail') == null) {
            return redirect('/');
        }
        return $next($request);
    }
}
