<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\LanguageLevel;
use App\Models\User;
use App\Models\UserBasic;
use App\Models\WorldLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $categories=Category::select('id','name')->get();
        $countries=ModelsCountry::select('id','name')->get();   
        $languages=WorldLanguage::select('id','iso_language_name')->get();
        $language_levels=LanguageLevel::select('id','name')->get();

        return view($this->activeTemplate.'profile.signup_basic',compact('categories','countries','languages','language_levels'));

    }
    
    /**
     * getProfileData
     *
     * @return void
     */
    public function getProfileData()
    {
        $languages=WorldLanguage::select('id','iso_language_name')->get();
        return response()->json(['languages' => $languages ]);
    }

   
    
    /**
     * saveUserBasics
     *
     * @param  mixed $request
     * @return void
     */
    public function saveUserBasics(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);

        $rules=[
            'file ' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id'  => 'required|exists:categories,id',
            'designation'  =>'required|string',
            'about'   =>  'required|string',
            'phone_number'   =>  'required|integer',
            'country_id'=>'required|exists:delivery_modes,id',
            'languages'=>'required|array',
            'languages.*.language_id'=>'required|exists:world_languages,id',
            'languages.*.language_level'=>'required|exists:language_levels,id',
        ];

        $validator = Validator::make($request_data, $rules);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } 
        else
        {
            try {

                $user=User::find(1);
                $user->basicProfile()->create([
                    'city_id'=>$request_data['country_id'],
                    'profile_picture'=>$request_data['profile_picture'],
                    'designation'=>$request_data['designation'],
                    'about'=>$request_data['about'],
                    'phone_number'=>$request_data['phone_number'],
                ]);
               
                return response()->json(["success_message" => "User Basics Updated Successfully"]);
                
            } catch (\Throwable $exception) {
                return response()->json(["server_error" => $exception->getMessage()]);
            }
        }
    }
}
