<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            
            return route('user.login');
        }
    }


//    public function handle($request, Closure $next)
//    {
//        if (\Illuminate\Support\Facades\Auth::check()) {
//            return $next($request);
//        }
//        return redirect()->route('user.login');
//    }


}
