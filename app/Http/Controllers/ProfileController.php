<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\LanguageLevel;
use App\Models\Skills;
use App\Models\Degree;
use App\Models\User;
use App\Models\UserBasic;
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
        $degrees=Degree::select('id','title')->get();
        $skills=Skills::select('id','name')->get();
        $user=User::withAll()->find(2);
        $categories=Category::select('id','name')->get();
        $cities=City::select('id','name')->where('country_id',$user->country_id)->get();
        $countries=Country::select('id','name')->get();
        $languages=WorldLanguage::select('id','iso_language_name')->get();
        $language_levels=LanguageLevel::select('id','name')->get();
        $basicProfile=$user->basicProfile ? $user->basicProfile : new UserBasic();
        $user_languages=$user->languages ? $user->languages: [];

        $userexperiences = User::with('experiences')->where('id', 2)->first();
        $usereducations = User::with('education')->where('id', 2)->first();
        $degrees=Degree::select('id','title')->get();

             
        return view($this->activeTemplate.'profile.signup_basic',compact('categories','cities','languages','language_levels','user','basicProfile','user_languages','countries','userexperiences','usereducations','skills','degrees'));

    }
    
    /**
     * getProfileData
     *
     * @return void
     */
    public function getProfileData()
    {

        $languages=WorldLanguage::select('id','iso_language_name')->get();
        $language_levels=LanguageLevel::select('id','name')->get();
        $countries=Country::select('id','name')->get();

        return response()->json(['languages' => $languages,'language_levels' => $language_levels,'countries' =>$countries ]);

    }

   
    
    /**
     * saveUserBasics
     *
     * @param  mixed $request
     * @return void
     */
    public function saveUserBasics(Request $request)
    {
        
        $request_data = $request->all();

        $rules=[
            'profile_picture ' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id'  => 'required|array',
            'category_id.*' =>'exists:categories,id',
            'designation'  =>'required|string',
            'about'   =>  'required|string',
            'phone_number'   =>  ['required',new PhoneNumberValidate],
            'city_id'=>'required|exists:world_cities,id',
            'languages'=>'required|array',
            'languages.*.language_id'=>'required|exists:world_languages,id',
            'languages.*.language_level_id'=>'required|exists:language_levels,id',
        ];
        $validator = Validator::make($request_data, $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } 
        else
        {
            try {
                
                DB::beginTransaction();
                
                $user=User::find(2);
                $user->basicProfile()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                    'city_id'=>$request_data['city_id'],
                    'designation'=>$request_data['designation'],
                    'about'=>$request_data['about'],
                    'phone_number'=>$request_data['phone_number'],
                ]);
                $user->languages()->delete();
                $user->languages()->createMany($request_data['languages']);
                $user->categories()->sync($request_data['category_id']);

                if ($request->has('profile_picture') && $request->profile_picture!='undefined') {

                    $path = imagePath()['attachments']['path'];
                    $file=$request->profile_picture;
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $user->basicProfile()->update(['profile_picture'=>$url]);

                }
                $user->save();

                DB::commit();
                return response()->json(["success" => "User Basics Updated Successfully"]);
                
            } catch (\Throwable $exception) {
                
                DB::rollback();
                // return response()->json(['error'=>$exception->getMessage()]);
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
        $rules=[
            'skills'  => 'required|array|max:15|min:5',
            'skills.*' =>'exists:skills,id',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } 
        else
        {
            try {
                
                DB::beginTransaction();
                $user=User::find(2);
                $user->rate_per_hour=$request->hourly_rate;
                $user->skills()->sync($request->skills);
                $user->save();
                DB::commit();
                return response()->json(["success" => "User Basics Updated Successfully"]);
            }
            catch (\Throwable $exception) {
                DB::rollback();
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);

                
            }
        }
    }
}
