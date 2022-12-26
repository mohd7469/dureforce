<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Auth;

class isProfileCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {
            $user = auth()->user();

            if (in_array(Role::$ClientName, $user->getRoleNames()->toArray())) {

                if ($user->getLanguagesMoreThanOneCount() > 0  && $user->getCompaniesMoreThanOneCount() > 0) {
                    return $next($request);
                } else {
                    $notify[] = ['error', 'Please complete your profile first.'];
                    return redirect()->route('user.basic.profile', ['view' => 'step-1'])->withNotify($notify);
                }
            }

            elseif (in_array(Role::$FreelancerName, $user->getRoleNames()->toArray())) {
                if ($user->getLanguagesMoreThanOneCount() > 0 && $user->getExperienceMoreThanOneCount() > 0 && $user->getSkillsMoreThanOneCount() > 0 && $user->getEduationMoreThanOneCount() > 0) {
                    return $next($request);
                } else {
                    $notify[] = ['error', 'Please complete your profile first.'];
                    return redirect()->route('user.basic.profile', ['view' => 'step-1'])->withNotify($notify);
                    // dd("dad");

                }
            }
        }
        abort(403);
    }
}
