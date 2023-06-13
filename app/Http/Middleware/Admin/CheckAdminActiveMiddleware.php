<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class CheckAdminActiveMiddleware
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
        $username = $request->input('username');


        // Check if the email is provided
        if ($username) {
            // Retrieve the admin from the database
            $admin = Admin::where('username', $username)->first();

            // Check if the admin exists and is active
            if ($admin && $admin->status==1) {
                // Admin is active, proceed with the request
                return $next($request);
            }
        }

        abort(403);



    }
}
