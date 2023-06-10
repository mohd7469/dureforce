<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $access = null)
    {
        $staff =  Auth::guard('admin')->user();
        // dd($staff->staff_access);
        $staffAccess = [];
        $permissions = $staff->admin_permissions->toArray();
        foreach($permissions as $val)
        {
            $staffAccess[] =  json_encode($val['pivot']['permission_id']);
        }
        if(in_array($access, $staffAccess))
        {
            return $next($request);
        }
        abort(403);
    }
}
