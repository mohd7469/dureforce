<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Khsing\World\Models\City;
use App\Models\UserEducation;
use App\Models\UserExperiences;

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
     * saveExperience
     *
     * @param  mixed $request
     * @return void
     */
    public function saveExperience(Request $request)
    {
        //dd($request->experiences);
        $validator = \Validator::make($request->all(), 
        [
            'experiences' => 'required|array',
            'experiences.*.job_title'   => 'required',
            'experiences.*.description' => 'required',
            'experiences.*.company_name'=> 'required',
            'experiences.*.country_id'  => 'required',
            'experiences.*.start_date'  => 'required|before:today',
            'experiences.*.end_date'    => 'before:today|after_or_equal:experiences.*.start_date',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
   

        try {
            
            $user = auth()->user();        
            $user->experiences()->delete();
            $user->experiences()->createMany(
                $request->experiences
            );
           
            return response()->json(["success" => "User Experience Added Successfully"], 200);

        } catch (\Exception $exp) {

            $notify[] = ['errors', 'Failled To Addd Experience.'];
            return back()->withNotify($notify);

        }
       
            

    
    }  

    /**
     * storeEducation
     *
     * @param  mixed $request
     * @return void
     */
    public function saveEducation(Request $request){
      

        $validator = \Validator::make($request->all(), 
        [
            'educations' => 'required|array',
            'educations.*.school_name'   => 'required',
            'educations.*.education' => 'required',
            'educations.*.field_of_study'=> 'required',
            'educations.*.description'  => 'required',
            'educations.*.degree_id'  => 'required',
            'educations.*.start_date'  => 'required|before:today',
            'educations.*.end_date'    => 'before:today|after_or_equal:educations.*.start_date',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
        $user = auth()->user();        

        try {
            $user->education()->delete();
            $user->education()->createMany(
                $request->educations
            );
           
            return response()->json(["success" => "User Education Added Successfully"], 200);

        } catch (\Exception $exp) {
            return response()->json(['error' => $exp->getMessage()]);
            $notify[] = ['errors', 'Failled To Addd Experience.'];
            return back()->withNotify($notify);

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
                return response()->json(["success" => "Skills and Rates Updated Successfully",'redirect_url' => route('user.home')]);
            } catch (\Throwable $exception) {
                DB::rollback();
                $notify[] = ['errors', 'Failled To Save User Skills and Rate .'];
                return back()->withNotify($notify);


            }
        }
    }
    
    
    
}
