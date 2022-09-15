<?php

namespace App\Http\Controllers\AuthClone;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\GeneralSetting;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountVerifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('regStatus')->except('registrationNotAllowed');

        $this->activeTemplate = activeTemplate();
    }
    public function showVerifyForm()
    {
        $pageTitle = "Verify Account";
        return view($this->activeTemplate . 'profile.account_verify', compact('pageTitle'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $general = GeneralSetting::first();
        $password_validation = Password::min(6);
        if ($general->secure_password) {
            $password_validation = $password_validation->mixedCase()->numbers()->symbols()->uncompromised();
        }
        $agree = 'nullable';
        if ($general->agree) {
            $agree = 'required';
        }
    }
    public function register(Request $request){ }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $general = GeneralSetting::first();
    }
    public function registered()
    {
        return redirect()->route('user.home');
    }

}
