<?php

namespace App\Http\Middleware;

use App\Models\UserTestimonial;
use Closure;
use Illuminate\Http\Request;

class ResponsePortalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(UserTestimonial::where('token',$request->token)->exists()){
            return $next($request);
        }
        else{
            return response(view('layout_email\testimonial\token-expired'));
        }
    }
}
