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
use App\Models\UserBasic;
use DB;
use App\Models\UserCompany;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserPayment;
use App\Models\UserSkill;
use App\Models\WorldLanguage;
use App\Rules\PhoneNumberValidate;
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
     * @param  mixed $request
     * @return void
     */
    public function saveCompany(Request $request)
    {
        $rules = [
            'email' => 'email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',
            // 'phone' => ['required', new PhoneNumberValidate],
             'vat' => 'required|string|min:4|max:15'
           

          

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                $user = User::findOrFail(auth()->id());
                $filename = '';

                if ($request->hasFile('company_logo')) {

                    $location = imagePath()['profile']['user']['path'];
                    $size = imagePath()['profile']['user']['size'];
                    $filename = uploadImage($request->company_logo, $location, $size, auth()->user()->image);
                }

                if(empty($filename)) {
                    $filename = $user->company->logo ?? '';
                }

                $user->company()->delete();

                $user->company()->save(new UserCompany([
                    'name'         => $request->get('name'),
                    'number'        => $request->get('phone'),
                    'logo'         => $filename,
                    'email'        => $request->get('email'),
                    'country_id'     => $request->get('country_id'),
                    'vat'          => $request->get('vat'),
                    'website'          => $request->get('url'),
                    'linked_url' => $request->get('linkedin_url'),
                    'facebook_url' => $request->get('facebook_url')
                ]));
                
                DB::commit();
                return response()->json(['success'=> 'User Company Updated Successfully']);

            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Company .'];
                return back()->withNotify($notify);
                
            }
        }
    }
    
    /**
     * savePaymentMethod
     *
     * @param  mixed $request
     * @return void
     */
    public function savePaymentMethod(Request $request)
    {
        $rules = [
            'card_number' => 'required|max:19|min:13',
            'expiration_date' => 'required|after_or_equal:now',
            'cvv_code' => 'required|min:3|max:5',
            // 'cvv_code' => ['required', new CardCvc($this->get('cvv_code'))],
            'name_on_card'    => 'required',
            'country_id'         => 'required|exists:world_countries,id',
            'city_id'            => 'required|exists:world_cities,id',
            'address'  => 'required',
        ];

        $messages =[
            'card_number.required'     => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required'        => 'CVV Code is required',
            'name_on_card.required'    => 'Name on Card is required',
            'street_address.required'  => 'Street Address is required',
            'country_id'               => 'Country is required',
            'city_id'                  => 'City is required',

        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } 
        else 
        {
            try {

                DB::beginTransaction();
                if(! empty($request->payment_id)) {
                    $userPayment = UserPayment::findOrFail($request->payment_id);
                    $userPayment->delete();
                }
                $userPayment=UserPayment::create([
                    'card_number' => $request->card_number,
                    'expiration_date'=>$request->expiration_date,
                    'cvv_code'=>$request->cvv_code,
                    'name_on_card'=>$request->name_on_card,
                    'country_id'=>$request->country_id,
                    'city_id'=>$request->city_id,
                    'address'=>$request->address,
                    'user_id'=>auth()->id(),
                    'is_primary' => 1,
                    'is_active'  =>1
                ]);
                DB::commit();

                return response()->json(['success'=> 'User Payment Method Updated Successfully','redirect_url' =>route('user.basic.profile',[ 'view' => 'step-3'])]);

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
        $userCompanies=$user->company;
        $user_payment_methods=$user->payments;
        $basicProfile=$user->basicProfile;
        $user_languages=$user->languages;
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels   = LanguageLevel::select('id', 'name')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->get();
        $countries = Country::select('id', 'name')->get();
        return view('templates/basic/profile/view_signup_basic',compact('countries','pageTitle','user','userCompanies','user_payment_methods','basicProfile','cities','user_languages','languages','language_levels'));

    }
    public function buyerProfile(){
      

        $skills = Skills::select('id', 'name')->get();
        $user = auth()->user();
        $user = User::withAll()->find($user->id);
        $categories = Category::select('id', 'name')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->get();
        $countries = Country::select('id', 'name')->get();
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::select('id', 'name')->get();
        $degrees = Degree::select('id', 'title')->get();
        $basicProfile = $user->basicProfile ? $user->basicProfile : new UserBasic();
        $userexperiences = $user->experiences ? $user->experiences : new UserExperiences();
        $usereducations = $user->education ? $user->education : new UserEducation();
        $userskills = $user->skills ? $user->skills : new UserSkill();
        $user_languages = $user->languages ? $user->languages : [];

        $user_languages_ = WorldLanguage::whereIn('id',$user_languages->pluck('language_id')->toArray())->get();
        $user_languages_level_ = LanguageLevel::whereIn('id',$user_languages->pluck('language_level_id')->toArray())->get();
        $user_country_ = Country::where('id', $user->company->country_id)->first();

        return view($this->activeTemplate . 'profile.buyer.signup_basic', compact('categories', 'cities', 'languages', 'language_levels', 'user', 'basicProfile', 'user_languages', 'countries', 'userexperiences', 'userskills','usereducations', 'skills', 'degrees', 'user_languages_', 'user_languages_level_','user_country_'));
    }
    public function BuyerprofilePasswordChange(Request $request){

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
        
        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        else {


            try {
                if (Hash::check($request->old_password, Auth::user()->password)) { 
                    Auth::user()->fill([
                     'password' => Hash::make($request->new_password)
                     ])->save();
                 
                     Auth::logout();

                     return response()->json(['success'=> 'User Password Updated Successfully','redirect_url' =>route('user.login')]);
                     

                 
                 }

                
               

            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);


            }
        }
        
        
    }


}
