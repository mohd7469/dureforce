<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Providers\RouteServiceProvider;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegistrationForm()
    {
        $pageTitle = "Sign Up";
        $info = json_decode(json_encode(getIpInfo()), true);
        $mobile_code = @implode(',', $info['code']);
        $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view($this->activeTemplate . 'user.auth.register', compact('pageTitle', 'mobile_code', 'countries'));
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

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
            'email' => 'required|string|email|max:90|unique:users',
            'password' => ['required', 'confirmed', $password_validation],
            'username' => 'required|alpha_num|unique:users|min:6',
            'captcha' => 'sometimes|required',
            'type' => "required",
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
            event(new Registered($user = $this->create($request->all())));
            // $user = $this->create($request->all());

            $this->guard()->login($user);

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        });

    }
    protected function create(array $data)
    {
        $general = GeneralSetting::first();
        //User Create
        $user = new User();
        $user->first_name = isset($data['firstname']) ? $data['firstname'] : null;
        $user->last_name = isset($data['lastname']) ? $data['lastname'] : null;
        $user->email = strtolower(trim($data['email']));
        $user->password = Hash::make($data['password']);
        $user->username = trim($data['username']);
        // $user->country_code = '';
        // $user->mobile = '';
        // $user->address = [
        //     'address' => '',
        //     'state' => '',
        //     'zip' => '',
        //     'country' => isset($data['country']) ? $data['country'] : null,
        //     'city' => ''
        // ];
        // $user->status = 1;
        // $user->ev = $general->ev ? 0 : 1;
        // $user->sv = $general->sv ? 0 : 1;
        // $user->ts = 0;
        // $user->tv = 1;
        // $user->type = $data['type'];
        $user->save();


        // $adminNotification = new AdminNotification();
        // $adminNotification->user_id = $user->id;
        // $adminNotification->title = 'New member registered';
        // $adminNotification->click_url = urlPath('admin.users.detail', $user->id);
        // $adminNotification->save();


        //Login Log Create
        $ip = $_SERVER["REMOTE_ADDR"];
        // $exist = UserLogin::where('user_ip', $ip)->first();
        $userLogin = new UserLogin();

        //Check exist or not
        // if ($exist) {
        //     $userLogin->longitude = $exist->longitude;
        //     $userLogin->latitude = $exist->latitude;
        //     $userLogin->city = $exist->city;
        //     $userLogin->country_code = $exist->country_code;
        //     $userLogin->country = $exist->country;
        // } else {
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude = @implode(',', $info['long']);
            $userLogin->latitude = @implode(',', $info['lat']);
            // $userLogin->city = @implode(',', $info['city']);
            // $userLogin->country_code = @implode(',', $info['code']);
            // $userLogin->country = @implode(',', $info['country']);
        // }

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
