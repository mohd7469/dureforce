<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Degree;
use App\Models\LanguageLevel;
use App\Models\Skills;
use App\Models\User;
use App\Models\UserBasic;
use App\Models\UserCompany;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserPayment;
use App\Models\UserSkill;
use App\Models\WorldLanguage;
use App\Rules\PhoneNumberValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Khsing\World\Models\City;
use Khsing\World\Models\Country as ModelsCountry;

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
     * profile
     *
     * @return void
     */
    public function profile()
    {

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
        return view($this->activeTemplate . 'profile.signup_basic', compact('categories', 'cities', 'languages', 'language_levels', 'user', 'basicProfile', 'user_languages', 'countries', 'userexperiences', 'userskills','usereducations', 'skills', 'degrees'));

    }

    /**
     * getProfileData
     *
     * @return void
     */
    public function getProfileData()
    {

        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $degrees = Degree::select('id', 'title')->get();

        return response()->json(['languages' => $languages, 'language_levels' => $language_levels, 'countries' => $countries, 'degrees' => $degrees]);

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
            'profile_picture ' => 'image|mimes:jpeg,png,jpg|max:2048',
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
                return response()->json(["success" => "User Basics Updated Successfully"]);

            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);


            }
        }
    }

    /**
     * saveSkills
     *
     * @return void
     */
    public function saveSkills(Request $request)
    {
        $rules = [
            'skills' => 'required|array|max:15|min:5',
            'skills.*' => 'exists:skills,id',
            'hourly_rate' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                $user = auth()->user();
                $user->rate_per_hour = $request->hourly_rate;
                $user->skills()->sync($request->skills);
                $user->save();
                DB::commit();
                return response()->json(["success" => "Skills and Rates Updated Successfully"]);
            } catch (\Throwable $exception) {
                DB::rollback();
                $notify[] = ['errors', 'Failled To Save User Skills and Rate .'];
                return back()->withNotify($notify);


            }
        }
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
            'card_number'     => 'required',
            'expiration_date' => 'required|date',
            'cvv_code'        => 'required',
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
                $notify[] = ['success', 'Successfully Updated Profile.'];
                return response()->json(['success'=> 'User Payment Method Updated Successfully']);

            } catch (\Throwable $th) {

                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Update User Payment Method .'];
                return back()->withNotify($notify);

            }
        }
    }
    
    /**
     * getCities
     *
     * @param  mixed $country_id
     * @return void
     */
    public function getCities(Request $request)
    {
        try {
            
            $cities=City::select('id', 'name')->where('country_id', $request->country_id)->get();
            return response()->json(['cities' => $cities]);
        }
        catch (\Throwable $th) {

            $notify[] = ['errors', 'Failled To Fetch Cities'];
            return back()->withNotify($notify);

        }
    }
}
