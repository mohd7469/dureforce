<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Degree;
use App\Models\LanguageLevel;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Khsing\World\Models\City;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserPortFolio;
use App\Models\WorldLanguage;
use Khsing\World\Models\Country;

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

        $validator = \Validator::make($request->all(), 
        [
            'experiences' => 'required|array',
            'experiences.*.job_title'   => 'required',
            'experiences.*.description' => 'required',
            'experiences.*.company_name'=> 'required',
            'experiences.*.country_id'  => 'required',
            'experiences.*.start_date'  => 'required|before:today',
            'experiences.*.end_date'    => 'after_or_equal:experiences.*.start_date|before:today',
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

    /**
     * getUserProfile
     *
     * @return void
     */
    public function getUserProfile()
    {
        $pageTitle = 'Seller Profile';
        $user = User::withAll()->find(auth()->user()->id);
        $skills=Skills::select('id','name')->get();
        $userskills=$user->skills;
        $user_experience = $user->experiences;
        $user_education  = $user->education;
        $user_portfolios = $user->portfolios; 
        $countries = Country::select('id', 'name')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->get();
        $basicProfile=$user->basicProfile;
        $user_languages=$user->languages;
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();
        $degrees = Degree::select('id', 'title')->get();
        return view($this->activeTemplate.'user.seller.seller_profile',compact('pageTitle','skills','user','user_experience','user_education','cities','basicProfile','userskills','user_languages','languages','language_levels','categories','countries','degrees','user_portfolios'));
    }
    
    /**
     * addExperience
     *
     * @param  mixed $request
     * @return void
     */
    public function addExperience(Request $request)
    {
        $validator = \Validator::make($request->all(), 
        [
            'job_title'   => 'required',
            'description' => 'required',
            'company_name'=> 'required',
            'country_id'  => 'required',
            'start_date'  => 'required|before:today',
            'end_date'    => 'before:today|after_or_equal:start_date',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
   

        try {
            
            $user = auth()->user();        
            $user->experiences()->create(
                $request->only(['job_title','description','company_name','country_id','start_date','end_date'])
            );
           
            return response()->json(["success" => "User Experience Added Successfully"], 200);

        } catch (\Exception $exp) {

            $notify[] = ['errors', 'Failled To Addd Experience.'];
            return back()->withNotify($notify);

        }
    }
    
    /**
     * editExperience
     *
     * @param  mixed $request
     * @param  mixed $seller_experience_id
     * @return void
     */
    public function editExperience(Request $request,$seller_experience_id)
    {
        $validator = \Validator::make($request->all(), 
        [
            'job_title'   => 'required',
            'description' => 'required',
            'company_name'=> 'required',
            'country_id'  => 'required',
            'start_date'  => 'required|before:today',
            'end_date'    => 'before:today|after_or_equal:start_date',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       

        try {
            
            $user = auth()->user();        
            UserExperiences::find($seller_experience_id)->update(
                $request->only(['job_title','description','company_name','country_id','start_date','end_date'])
            );
           
            return response()->json(["success" => "User Experience Updated Successfully"], 200);

        } catch (\Exception $exp) {

            $notify[] = ['errors', 'Failled To Update Experience.'];
            return back()->withNotify($notify);

        }
    }
        
    /**
     * addEducation
     *
     * @param  mixed $request
     * @return void
     */
    public function addEducation(Request $request)
    {
        $custom_messages =[

            'start_date.required' => 'From date filed is required',
            'start_date.before' => 'From date should be before today date',
            'end_date.before' => 'To date should be before today date',
            'end_date.after' => 'To date should be after From date '
        ];
        $validator = \Validator::make($request->all(), 
        [
            'school_name'   => 'required',
            'field_of_study'=> 'required',
            'description'  => 'required',
            'degree_id'  => 'required',
            'start_date'  => 'required|before:today',
            'end_date'    => 'before:today|after:start_date',
        ],$custom_messages);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
        $user = auth()->user();        

        try {
            $user->education()->create($request->only('school_name','education','field_of_study','description','degree_id','start_date','end_date'));
            return response()->json(["success" => "User Education Added Successfully"], 200);

        } catch (\Exception $exp) {
            return response()->json(['error' => $exp->getMessage()]);
            $notify[] = ['errors', 'Failled To Addd Experience.'];
            return back()->withNotify($notify);

        }
    }
    
    /**
     * editEducation
     *
     * @param  mixed $request
     * @param  mixed $seller_education_id
     * @return void
     */
    public function editEducation(Request $request,$seller_education_id)
    {
        $custom_messages =[
            'start_date.required' => 'From date filed is required',
            'start_date.before' => 'From date should be before today date',
            'end_date.before' => 'To date should be before today date',
            'end_date.after' => 'To date should be after From date '
        ];
        $validator = \Validator::make($request->all(), 
        [
            'school_name'   => 'required',
            'field_of_study'=> 'required',
            'description'  => 'required',
            'degree_id'  => 'required',
            'start_date'  => 'required|before:today',
            'end_date'    => 'before:today|after:start_date',
        ],$custom_messages);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
        $user = auth()->user();        

        try {
            UserEducation::where('id',$seller_education_id)->update($request->only('school_name','education','field_of_study','description','degree_id','start_date','end_date','is_enrolled'));
            return response()->json(["success" => "User Education Updated Successfully"], 200);

        } catch (\Exception $exp) {
            return response()->json(['error' => $exp->getMessage()]);
            $notify[] = ['errors', 'Failled To Addd Experience.'];
            return back()->withNotify($notify);

        }
    }
    
    /**
     * getUserPortfolio
     *
     * @return void
     */
    public function getUserPortfolio()
    {
        $skills=Skills::select('id','name')->get();

        return view($this->activeTemplate.'portfolio.index',compact('skills'));
    }

        
    /**
     * saveUserPortfolio
     *
     * @param  mixed $request
     * @return void
     */
    public function saveUserPortfolio(Request $request)
    {
        DB::beginTransaction();
        try {
            $request_data = [];
            parse_str($request->data, $request_data);
            $request_data['user_id'] = auth()->user()->id;
            $portfolio=UserPortFolio::create(
                $request_data
            );
            if($request->has('skills'))
                $portfolio->skills()->attach($request_data['skills']);

            if ($request->hasFile('file')) {
                $path = imagePath()['attachments']['path'];
                foreach ($request->file as $file) {


                        $filename = uploadAttachments($file, $path);

                        $file_extension = getFileExtension($file);
                        $url = $path . '/' . $filename;
                        
                        $portfolio->attachments()->create([

                            'name' => $filename,
                            'uploaded_name' => $file->getClientOriginalName(),
                            'url'           => $url,
                            'type' =>$file_extension,
                            'is_published' =>1

                        ]);
                }
            }
            DB::commit();
            return response()->json(["success" => "User Portfolio Added Successfully ",'redirect' =>route('seller.profile.view')], 200);

        } catch (\Exception $exp) {
            return response()->json(['error' => $exp->getMessage()]);
            $notify[] = ['errors', 'Failled To Add Portfolio.'];
            return back()->withNotify($notify);

        }
    }
    
    /**
     * validateUserPortfolio
     *
     * @param  mixed $request
     * @return void
     */
    public function validateUserPortfolio(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);
        
        $rules = [
            'name' => 'required',
            'completion_date' => 'required|date|before:today',
            'skills' => 'nullable|array|max:15',
            'skills.*' =>'exists:skills,id',
            'project_url' => 'nullable',
            'description' => 'nullable',
            'video_url'   => ['nullable',"regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'project_url' => ['nullable',"regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"]
        ];

        $validator = Validator::make($request_data, $rules);
        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        } 
        else
            return response()->json(["validated" => "Portfolio Data Is Valid"]);
    }
}
