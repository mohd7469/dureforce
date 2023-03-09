<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Country;
use App\Models\UserLogin;
use App\Models\ServiceFee;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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

    public function showRegistrationForm()
    {
        $pageTitle = "Sign Up";
//        $info = json_decode(json_encode(getIpInfo()), true);

        $mobile_code =null;
        // $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countries = Country::WithOutManual()->orderBy('name', 'ASC')->get();
        return view($this->activeTemplate . 'user.auth.register', compact('pageTitle', 'mobile_code', 'countries'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
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


        $validate = Validator::make($data, [
            'firstname' => 'sometimes|required|string|max:50',
            'lastname' => 'sometimes|required|string|max:50',
            'country' => "required",
            'email' => 'required|string|email|max:90|unique:users',
            'password' => ['required', 'confirmed', $password_validation],
            'username' => 'required|alpha_num|unique:users|min:6',
            'captcha' => 'sometimes|required',
//            'role' => "required",
            'agree' => $agree
        ]);
        return $validate;
    }

    public function register(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $this->validator($request->all())->validate();

            if (isset($request->captcha)) {
                if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                    $notify[] = ['error', "Invalid captcha"];
                    return back()->withNotify($notify)->withInput();
                }
            }

            Session::put('registerUsername', $request->get('username'));
            $user = $this->create($request->all());
            
            $this->guard()->login($user);
            $user->last_activity_at=Carbon::now();
            $user->last_login_at=Carbon::now();
            $user->is_session_active = true;
            $user->save();
            event(new Registered($user ));
            Log::info($user);
            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        });

    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $general = GeneralSetting::first();
        $serviceFee = ServiceFee::where('slug', 'new-user')->first();

        //User Create
        $user=User::create([
            'service_fee_id' =>$serviceFee->id,
            'first_name' =>isset($data['firstname']) ? $data['firstname'] : null,
            'last_role_activity' =>isset($data['role']) ? $data['role'] : null,
            'last_name' =>isset($data['lastname']) ? $data['lastname'] : null,
            'email' =>strtolower(trim($data['email'])),
            'country_id' =>isset($data['country']) ? $data['country'] : null,
            'password' =>Hash::make($data['password']),
            'username' =>trim($data['username'])
    
        ]);
        
        $user->assignRole($data['role']);
        //Login Log Create
        $ip = $_SERVER["REMOTE_ADDR"];
        $userLogin = new UserLogin();
        $info = json_decode(json_encode(getIpInfo()), true);
//        $userLogin->longitude = @implode(',', $info['long']);
//        $userLogin->latitude = @implode(',', $info['lat']);

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        // $userLogin->user_ip = $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();
        return $user;

    }

    public function checkUser(Request $request)
    {
        $exist['data'] = null;
        $exist['type'] = null;
        if ($request->email) {
            $exist['data'] = User::where('email', $request->email)->first();
            $exist['type'] = 'email';
        }
        if ($request->username) {
            $exist['data'] = User::where('username', $request->username)->first();
            $exist['type'] = 'username';
        }
        return response($exist);

    }

    public function registered()
    {
        return redirect()->route('user.verification.notice');
    }

}
