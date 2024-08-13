<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorldLanguage;
use App\Rules\PhoneNumberValidate;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserBasic;
use App\Models\Category;
use App\Models\Country;
use App\Models\Degree;
use App\Models\LanguageLevel;
use App\Models\Role;
use App\Models\Skills;
use App\Models\UserSkill;
use Khsing\World\Models\Country as ModelsCountry;
use App\Models\User;
use Khsing\World\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use PhpParser\Node\Stmt\TryCatch;

class CommonProfileController extends Controller
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
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->orderBy('name', 'ASC')->get();
        $countries = Country::select('id', 'name')->orderBy('name', 'ASC')->get();
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
        $countries = Country::select('id', 'name')->orderBy('name', 'ASC')->get();
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
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',
            'city_id' => 'nullable|exists:world_cities,id',
            'languages' => 'required|array',
            'languages.*.language_level_id' => 'required',
            'languages.*.language_id' => 'required|exists:world_languages,id',

        ];
        $messages =[
            'designation.required'     => 'Designation is required',
            'about.required' => 'About is required',
            'phone_number.required'        => 'Phone No is required',
            'city_id.required'    => 'City is required',
            'languages.required'    => 'Please Select Language',
            'languages.*.language_level_id.required'    => 'Please Select Proficiency Level',
            'languages.*.language_id.required'    => 'Please Select at least one Language',

        ];
        
        if (getLastLoginRoleId() == Role::$Freelancer) {
           
            $rules['category_id'] = 'required|array';
            $rules['category_id.*'] = 'exists:categories,id';
        }

        $validator = Validator::make($request_data, $rules,$messages);
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
                if (getLastLoginRoleId() == Role::$Freelancer) {
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
                return response()->json(['error' => 'Failled To Save User Profile' ]);
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

            $cities=City::select('id', 'name','name as text')->where('country_id', $request->country_id)->orderBy('name', 'ASC');
            if ($request->has('search') && $request->search != '') {
                $cities=$cities->where('name', 'like', '%' . $request->search . '%');
            }
            $cities=$cities->paginate(10);
            return response()->json(['cities' => $cities]);
        }
        catch (\Throwable $th) {

            $notify[] = ['errors', 'Failled To Fetch Cities'];
            return back()->withNotify($notify);

        }
    }
    
    /**
     * getUserProfile
     *
     * @return void
     */
    public function getUserProfile($id=null)
    {
        try {
            $pageTitle = 'Seller Profile';
            $user_id = $id == null ? auth()->user()->uuid :$id;
            $user = User::withAll()->where('uuid',$user_id)->firstOrFail();
            $skills=Skills::select('id','name')->get();
            $userskills=$user->skills;
            $basicProfile=$user->basicProfile;
            $user_languages=$user->languages;
            $cities = City::select('id', 'name')->where('country_id', $user->country_id)->get();
            $languages = WorldLanguage::select('id', 'iso_language_name')->get();
            $language_levels = LanguageLevel::select('id', 'name')->get();
            $countries = Country::select('id', 'name')->get();
            $user_experience = $user->experiences;
            $user_education  = $user->education;
            $user_portfolios = $user->portfolios; 
            $categories = Category::select('id', 'name')->get();
            $degrees = Degree::select('id', 'title')->get();
            if(getLastLoginRoleId()==Role::$Freelancer){
                $testimonials= $user->testimonials;
            }
            else{
    
                $testimonials = $user->testimonials()->Approved();
    
            }
            return view($this->activeTemplate.'user.seller.seller_profile',compact('pageTitle','userskills','degrees','countries','language_levels','languages','skills','user','user_experience','user_education','user_portfolios','categories','basicProfile','cities','user_languages','testimonials'));
        } catch (\Throwable $th) {
            Log::info("error in common user profile",[$th->getMessage()]);
        }
        
    }
    
    /**
     * editUserBasics
     *
     * @param  mixed $request
     * @return void
     */
    public function editUserBasics(Request $request)
    {
        $request_data = $request->all();
        $rules = [
            'profile_picture ' => 'image|mimes:jpeg,png,jpg|max:2048',
            'designation' => 'required|string|max:100|min:5',
            'about' => 'required|string',
            'rate' => 'required|gt:0',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',

            // 'phone_number' => ['required', new PhoneNumberValidate],
            'city_id' => 'required|exists:world_cities,id',
            'languages' => 'required|array',
            'languages.*.language_id' => 'required|exists:world_languages,id',
            'languages.*.language_level_id' => 'required|exists:language_levels,id',
        ];
        $messages =[
            'designation.required'     => 'Designation is required',
            'about.required' => 'About is required',
            'phone_number.required'        => 'Phone No is required',
            'city_id.required'    => 'City is required',
            'rate.required'    => 'Rate per hour is required',
            'languages.required'    => 'Please Select Language',
            'languages.*.language_id.required'    => 'Please Select at least one Language',
            'languages.*.language_level_id.required'    => 'Please Select at least one Proficiency Level',
        ];
        if (getLastLoginRoleId() == Role::$Freelancer) {
            $rules['category_id'] = 'required|array';
            $rules['category_id.*'] = 'exists:categories,id';
        }

        $validator = Validator::make($request_data, $rules,$messages);
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
                $user->skills()->sync($request_data['skills']);
                if ($request->has('profile_picture') && $request->profile_picture != 'undefined') {

                    $path = imagePath()['attachments']['path'];
                    $file = $request->profile_picture;
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $user->basicProfile()->update(['profile_picture' => $url]);

                }
                $user->rate_per_hour = $request_data['rate'];
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

    public function userChat()
    {
        $pageTitle='Chat Container';
        $pusher_credentials=getPusherCredentials();
        return Inertia::render('Chat/ChatContainerComponent',['pageTitle' =>$pageTitle , 'pusher_credentials' =>$pusher_credentials]);
    }
    public function hello()
    {
        $pageTitle='Chat Container';
        return Inertia::render('Chat/HelloComponent',['pageTitle' =>$pageTitle]);
    }

    public function SwitchProfile(){
        try {
            $user=auth()->user();
            $user->last_role_activity  =  ($user->last_role_activity == Role::$Freelancer) ? Role::$Client: Role::$Freelancer;
            $user->save();
            return redirect()->route('user.home');
        } catch (\Throwable $th) {
            return $th->getMessage();
           Log::error("Error In Switch Profile :".$th->getMessage());
        }
       
    }
}
