<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Degree;
use App\Models\LanguageLevel;
use App\Models\Skills;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModuleOffer;
use App\Models\Job;
use App\Models\ModuleOfferMilestone;
use App\Models\Role;
use App\Models\UserBasic;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCompany;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserPayment;
use App\Models\UserSkill;
use App\Models\WorldLanguage;
use App\Rules\PhoneNumberValidate;
use Illuminate\Support\Facades\DB as FacadesDB;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;


use Illuminate\Support\Facades\Validator;
use Khsing\World\Models\City;

class ProfileController extends Controller
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    /**
     * saveCompany
     *
     * @param mixed $request
     * @return void
     */
    public function saveCompany(Request $request)
    {
    

        $rules = [
            'email' => 'email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',
            'vat' => 'required|string|min:4|max:15',
            'url' => ['nullable', "regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'linkedin_url' => ['nullable', "regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'facebook_url' => ['nullable', "regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {

            try {
                DB::beginTransaction();
                $user = User::findOrFail(auth()->user()->id);
                $filename = '';

                if ($request->hasFile('company_logo') && $request->company_logo != 'undefined') {

                    $path = imagePath()['attachments']['path'];
                    $file = $request->company_logo;
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $user->company()->update(['logo' => $url]);

                    // $location = imagePath()['profile']['user']['path'];
                    // $size = imagePath()['profile']['user']['size'];
                    // $filename = uploadImage($request->company_logo, $location, $size, auth()->user()->image);
                }

                if (empty($filename)) {
                    $url = $user->company->logo ?? '';
                }

                $user->company()->delete();

                $user->company()->save(new UserCompany([
                    'name' => $request->get('name'),
                    'number' => $request->get('phone'),
                    'logo' => $url,
                    'email' => $request->get('email'),
                    'country_id' => $request->get('country_id'),
                    'vat' => $request->get('vat'),
                    'website' => $request->get('url'),
                    'linked_url' => $request->get('linkedin_url'),
                    'facebook_url' => $request->get('facebook_url')
                ]));

                DB::commit();
                return response()->json(['success' => 'User Company Updated Successfully']);

            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Company .'];
                return back()->withNotify($notify);

            }
        }
    }

    /**
     * saveUserBasics
     *
     * @param mixed $request
     * @return void
     */
    public function saveUserBasics(Request $request)
    {

        $request_data = $request->all();

        $rules = [
            'profile_picture ' => 'image|mimes:jpeg,png,jpg|max:5000',
            'designation' => 'required|string',
            'about' => 'required|string',
            'phone_number' => ['required', new PhoneNumberValidate],
            'city_id' => 'required|exists:world_cities,id',
            'languages' => 'required|array',
            'languages.*.language_id' => 'required|exists:world_languages,id',
            'languages.*.language_level_id' => 'required|exists:language_levels,id',
        ];
        if (in_array('Freelancer', auth()->user()->getRoleNames()->toArray())) {
            $rules['category_id'] = 'required|array';
            $rules['category_id.*'] = 'exists:categories,id';
        }

        $validator = Validator::make($request_data, $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();

                $user = auth()->user();
                $user->basicProfile()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'city_id' => $request_data['city_id'],
                        'designation' => $request_data['designation'],
                        'about' => $request_data['about'],
                        'phone_number' => $request_data['phone_number'],
                    ]);
                $user->languages()->delete();
                $user->languages()->createMany($request_data['languages']);
                if (in_array('Freelancer', auth()->user()->getRoleNames()->toArray())) {
                    $user->categories()->sync($request_data['category_id']);
                }

                if ($request->has('profile_picture') && $request->profile_picture != 'undefined') {

                    $path = imagePath()['attachments']['path'];
                    $file = $request->profile_picture;
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $user->basicProfile()->update(['profile_picture' => $url]);

                }
                $user->save();

                DB::commit();
                return response()->json(["success" => "User Basics Updated Successfully", 'redirect_url' => route('user.basic.profile', ['view' => 'step-1'])]);


            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);


            }
        }
    }

    /**
     * savePaymentMethod
     *
     * @param mixed $request
     * @return void
     */
    public function savePaymentMethod(Request $request)
    {
        $rules = [
            'card_number' => 'required|numeric|digits_between:13,19',
            'expiration_date' => 'required|date|after_or_equal:now',
            'cvv_code' => 'required|numeric|digits_between:3,4',
            'name_on_card' => 'required',
            'country_id' => 'required|exists:world_countries,id',
            'city_id' => 'required|exists:world_cities,id',
            'address' => 'required',
        ];

        $messages = [
            'card_number.required' => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required' => 'CVV Code is required',
            'name_on_card.required' => 'Name on Card is required',
            'street_address.required' => 'Street Address is required',
            'country_id' => 'Country is required',
            'city_id' => 'City is required',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                if ($request->update_payment_id) {


                    $userPayment = UserPayment::find($request->update_payment_id);

                    $userPayment->card_number = $request->card_number;
                    $userPayment->expiration_date = $request->expiration_date;
                    $userPayment->cvv_code = $request->cvv_code;
                    $userPayment->name_on_card = $request->name_on_card;
                    $userPayment->user_id = auth()->user()->id;
                    $userPayment->country_id = $request->country_id;
                    $userPayment->city_id = $request->city_id;
                    $userPayment->address = $request->address;
                    $userPayment->is_primary = 1;
                    $userPayment->is_active = 1;
                    $userPayment->save();
                    DB::commit();


                    $notify[] = ['success', 'User Payment Method Updated Profile.'];

                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('user.basic.profile', ['view' => 'step-1'])]);


                } else {
                    $userPayment = UserPayment::create([
                        'card_number' => $request->card_number,
                        'expiration_date' => $request->expiration_date,
                        'cvv_code' => $request->cvv_code,
                        'name_on_card' => $request->name_on_card,
                        'country_id' => $request->country_id,
                        'city_id' => $request->city_id,
                        'address' => $request->address,
                        'user_id' => auth()->user()->id,
                        'is_primary' => 1,
                        'is_active' => 1
                    ]);
                    DB::commit();

                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('user.basic.profile', ['view' => 'step-1'])]);

                }
                if (!empty($request->payment_id)) {
                    $userPayment = UserPayment::findOrFail($request->payment_id);
                    $userPayment->delete();
                }

            } catch (\Throwable $th) {

                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Update User Payment Method .'];
                return back()->withNotify($notify);

            }
        }
    }

    /**
     * getUserProfile
     *
     * @return void
     */
    public function getUserProfile()
    {

        $pageTitle = 'Buyer Profile';
        $user = User::WithBuyerAll()->find(auth()->user()->id);
        $userCompanies = $user->company;
        $user_payment_methods = $user->payments;
        $basicProfile = $user->basicProfile;
        $user_languages = $user->languages;
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::where('is_active',1)->select('id', 'name')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->orderBy('name', 'ASC')->get();
       
        $countries = Country::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('templates/basic/profile/view_signup_basic', compact('countries', 'pageTitle', 'user', 'userCompanies', 'user_payment_methods', 'basicProfile', 'cities', 'user_languages', 'languages', 'language_levels'));

    }

    public function buyerProfile()
    {


        $skills = Skills::select('id', 'name')->get();
        $user = auth()->user();
        $user = User::withAll()->find($user->id);
        $categories = Category::select('id', 'name')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->orderBy('name', 'ASC')->get();
        $countries = Country::select('id', 'name')->orderBy('name', 'ASC')->get();
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::where('is_active',1)->select('id', 'name')->get();
        $degrees = Degree::where('is_active',1)->select('id', 'title')->get();
        $basicProfile = $user->basicProfile ? $user->basicProfile : new UserBasic();
        $userexperiences = $user->experiences ? $user->experiences : new UserExperiences();
        $usereducations = $user->education ? $user->education : new UserEducation();
        $userskills = $user->skills ? $user->skills : new UserSkill();
        $user_languages = $user->languages ? $user->languages : [];

        $user_languages_ = WorldLanguage::whereIn('id', $user_languages->pluck('language_id')->toArray())->get();
        $user_languages_level_ = LanguageLevel::whereIn('id', $user_languages->pluck('language_level_id')->toArray())->get();
        $user_country_ = $user->company? Country::where('id', $user->company->country_id)->first():null;
        $user_loc_ = $user->company ? Country::where('id', $user->company->country_id)->first() : null;


        return view($this->activeTemplate . 'profile.buyer.signup_basic', compact('categories', 'user_loc_', 'cities', 'languages', 'language_levels', 'user', 'basicProfile', 'user_languages', 'countries', 'userexperiences', 'userskills', 'usereducations', 'skills', 'degrees', 'user_languages_', 'user_languages_level_', 'user_country_'));
    }

    public function buyerprofilePasswordChange(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'old_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {


            try {
                if (Hash::check($request->old_password, Auth::user()->password)) {
                    Auth::user()->fill([
                        'password' => Hash::make($request->new_password)
                    ])->save();


                    return response()->json(['success' => 'User Password Updated Successfully', 'redirect_url' => route('buyer.basic.profile', ['profile' => 'step-5']) ]);


                }


            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);


            }
        }


    }

    public function buyersavePaymentMethod(Request $request)
    {

        $rules = [
            'card_number' => 'required|numeric|digits_between:13,19',
            'expiration_date' => 'required|date|after_or_equal:now',
            'cvv_code' => 'required|numeric|digits_between:3,4',
            'name_on_card' => 'required',
            'country_id' => 'required|exists:world_countries,id',
            'city_id' => 'required|exists:world_cities,id',
            'address' => 'required',
        ];

        $messages = [
            'card_number.required' => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required' => 'CVV Code is required',
            'name_on_card.required' => 'Name on Card is required',
            'street_address.required' => 'Street Address is required',
            'country_id' => 'Country is required',
            'city_id' => 'City is required',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                if ($request->update_payment_id) {
                    $userPayment = UserPayment::find($request->update_payment_id);

                    $userPayment->card_number = $request->card_number;
                    $userPayment->expiration_date = $request->expiration_date;
                    $userPayment->cvv_code = $request->cvv_code;
                    $userPayment->name_on_card = $request->name_on_card;
                    $userPayment->country_id = $request->country_id;
                    $userPayment->city_id = $request->city_id;
                    $userPayment->address = $request->address;
                    $userPayment->user_id = auth()->user()->id;
                    $userPayment->is_primary = 1;
                    $userPayment->is_active = 1;
                    $userPayment->save();
                    DB::commit();

                    $notify[] = ['success', 'User Payment Method Updated Profile.'];


                    // return response()->json(['success'=> 'User Payment Method Updated Successfully','redirect_url' =>route('buyer.basic.profile',[ 'profile' => 'step-3'])]);
                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('buyer.basic.profile', ['profile' => 'step-1'])]);

                    // return redirect()->route('buyer.basic.profile',[ 'profile' => 'step-1'])->withNotify($notify);


                } else {
                    $userPayment = UserPayment::create([
                        'card_number' => $request->card_number,
                        'expiration_date' => $request->expiration_date,
                        'cvv_code' => $request->cvv_code,
                        'name_on_card' => $request->name_on_card,
                        'country_id' => $request->country_id,
                        'city_id' => $request->city_id,
                        'address' => $request->address,
                        'user_id' => auth()->user()->id,
                        'is_primary' => 1,
                        'is_active' => 1
                    ]);

                    DB::commit();

                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('buyer.basic.profile', ['profile' => 'step-1'])]);

                }
                if (!empty($request->payment_id)) {
                    $userPayment = UserPayment::findOrFail($request->payment_id);
                    $userPayment->delete();
                }

            } catch (\Throwable $th) {

                DB::rollback();
                return response()->json(['error' => 'Failled To Update User Payment Method .']);

            }
        }
    }

    public function buyersaveUserBasics(Request $request)
    {

        $request_data = $request->all();

        $rules = [
            'profile_picture ' => 'image|mimes:jpeg,png,jpg|max:2048',
            'designation' => 'required|string',
            'country_id' => 'required',
            'about' => 'required|string',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',
            'city_id' => 'required|exists:world_cities,id',
            'languages' => 'required|array',
            'languages.*.language_id' => 'required|exists:world_languages,id',
            'languages.*.language_level_id' => 'required|exists:language_levels,id',
        ];
        
        if (getLastLoginRoleId() == Role::$Freelancer) {
            $rules['category_id'] = 'required|array';
            $rules['category_id.*'] = 'exists:categories,id';
        }

        $validator = Validator::make($request_data, $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();

                $user = auth()->user();
                if ($request->email) {
                    $user1 = User::find(auth()->user()->id);
                    $user1->email = $request->email;
                    $user1->country_id = $request->country_id;
                    $user1->save();
                }


                $user->basicProfile()->updateOrCreate(
                    ['user_id' => $user->id],

                    [
                        'city_id' => $request_data['city_id'],
                        'designation' => $request_data['designation'],
                        'about' => $request_data['about'],
                        'phone_number' => $request_data['phone_number'],


                    ]);
                $user->languages()->delete();
                $user->languages()->createMany($request_data['languages']);
                if (in_array('Freelancer', auth()->user()->getRoleNames()->toArray())) {
                    $user->categories()->sync($request_data['category_id']);
                }

                if ($request->has('profile_picture') && $request->profile_picture != 'undefined') {

                    $path = imagePath()['attachments']['path'];
                    $file = $request->profile_picture;
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $user->basicProfile()->update(['profile_picture' => $url]);

                }
                $user->save();

                DB::commit();
                return response()->json(["success" => "User Basics Updated Successfully", 'redirect_url' => route('user.basic.profile', ['profile' => 'step-1'])]);


            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => 'Failled To Save User Profile .']);
            }
        }
    }

    public function buyersaveCompany(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',
            'vat' => 'required|string|min:5|max:15',
            'url' => ['nullable', "regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'linkedin_url' => ['nullable', "regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'facebook_url' => ['nullable', "regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {

            try {
                
                DB::beginTransaction();
                $user = User::findOrFail(auth()->user()->id);
                $filename = '';

                if ($request->hasFile('company_logo')) {

                    $path = imagePath()['attachments']['path'];
//                    $size = imagePath()['profile']['user']['size'];
//                    $filename = uploadImage($request->company_logo, $path, $size, auth()->user()->image);
                    $filename = uploadAttachments($request->company_logo, $path);
                }

                if (empty($filename)) {
                    $url = $user->company->logo ?? '';
                }
                else{
                    $url = $path . '/' . $filename;
                }

                $user->company()->delete();

                $user->company()->save(new UserCompany([
                    'name' => $request->get('name'),
                    'number' => $request->get('phone'),
                    'logo' => $url,
                    'email' => $request->get('email'),
                    'country_id' => $request->get('country_id'),
                    'vat' => $request->get('vat'),
                    'website' => $request->get('url'),
                    'linked_url' => $request->get('linkedin_url'),
                    'facebook_url' => $request->get('facebook_url')
                ]));

                DB::commit();
                return response()->json(['success' => 'User Company Updated Successfully']);

            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['error' => 'Failled To Save User Company .']);
            }
        }
    }

    public function buyerdestroy($id)
    {

        //
        $userPayment = UserPayment::findOrFail($id);
        $userPayment->delete();
        $notify[] = ['success', 'Your Payment Method is Deleted.'];
        return redirect()->route('buyer.basic.profile', ['profile' => 'step-3'])->withNotify($notify);
    }

   

    public function updateProfilePicture(Request $request)
    {
        $path = imagePath()['attachments']['path'];
        $file = $request->company_logo;
        $filename = uploadAttachments($file, $path);
        $file_extension = getFileExtension($file);
        $url = $path . '/' . $filename;
        auth()->user()->company()->update(['logo' => $url]);
        return redirect()->route('buyer.basic.profile', ['profile' => 'step-1']);
    }
  
    
}