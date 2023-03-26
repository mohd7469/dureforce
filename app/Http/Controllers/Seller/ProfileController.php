<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\StorePortfolioRequest;
use App\Http\Requests\StoreTestimonialClientResponseRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Mail\TestimonialEmail;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Degree;
use App\Models\LanguageLevel;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Khsing\World\Models\City;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserPortFolio;
use App\Models\WorldLanguage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use App\Models\Country;
use App\Models\UserTestimonial;
use Illuminate\Support\Facades\Mail;

//use Khsing\World\Models\Country;

class ProfileController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public $activeTemplate;
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
            'hourly_rate' => 'required|gt:0',

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
    public function getUserProfile(Request $request ,$uuid='')
    {
        $pageTitle = 'Seller Profile';
        $is_active = 1;
        $user = User::withAll()->find(auth()->user()->id);
        //$skills=Skills::select('id','name')->get();
        $skills = getRedisData(Skills::$Model_Name_Space,Skills::$Redis_key);
        $userskills=$user->skills;
        $user_experience = $user->experiences;
        $user_education  = $user->education;
        $user_portfolios = $user->portfolios; 
        $countries = Country::WithOutManual()->select('id', 'name')->orderBy('name', 'asc')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->get();
        $basicProfile=$user->basicProfile;
        $user_languages=$user->languages;
        // $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $languages = getRedisData(WorldLanguage::$Model_Name_Space,WorldLanguage::$Redis_key);
        $language_levels = LanguageLevel::where('is_active',1)->select('id', 'name')->get();
        // $language_levels = getRedisData(LanguageLevel::$Model_Name_Space,LanguageLevel::$Redis_key);
        // $categories = Category::select('id', 'name')->get();
        $categories = getRedisData(Category::$Model_Name_Space,Category::$Redis_key,$is_active);
        //$degrees = Degree::where('is_active',1)->select('id', 'title')->get();
        $degrees = getRedisData(Degree::$Model_Name_Space,Degree::$Redis_key,$is_active);
        $user_portfolio = '';
        if($uuid){
            
            $user_portfolio=UserPortFolio::where('uuid',$uuid)->first();
        }
        return view($this->activeTemplate.'user.seller.seller_profile',compact('pageTitle','skills','user','user_experience','user_education','cities','basicProfile','userskills','user_languages','languages','language_levels','categories','countries','degrees','user_portfolios','user_portfolio'));
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
            'description' => 'required|min:10',
            'company_name'=> 'required',
            'country_id'  => 'required',
            'start_date'  => 'required|before:today|after:' . Config('settings.minimum_system_start_date'),            
            'end_date'    => 'before:today|after_or_equal:start_date',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
        try {
            
            $user = auth()->user();        
            $user->experiences()->create(
                $request->only(['job_title','description','company_name','country_id','start_date','end_date','is_working'])
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
            'description' => 'required|min:10',
            'company_name'=> 'required',
            'country_id'  => 'required',
            'start_date'  => 'required|before:today|after:' . Config('settings.minimum_system_start_date'),            
            'end_date'    => 'before:today|after_or_equal:start_date',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       

        try {
            
            $user = auth()->user();        
            UserExperiences::find($seller_experience_id)->update(
                $request->only(['job_title','description','company_name','country_id','start_date','end_date','is_working'])
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
            'start_date.after' => 'From date must be a date after 01/01/1900',
            'end_date.before' => 'To date should be before today date',
            'end_date.after' => 'To date should be after From date '
        ];
        $validator = \Validator::make($request->all(), 
        [
            'school_name'   => 'required',
            'field_of_study'=> 'required',
            'description' => 'required|min:10',
            'degree_id'  => 'required',
            'start_date'  => 'required|before:today|after:' . Config('settings.minimum_system_start_date'),
            'end_date'    => 'before:today|after:start_date',
        ],$custom_messages);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
        $user = auth()->user();        

        try {
            $user->education()->create($request->only('school_name','education','field_of_study','description','degree_id','start_date','end_date','is_enrolled'));
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
            'start_date.after' => 'From date must be a date after 01/01/1900',
            'end_date.before' => 'To date should be before today date',
            'end_date.after' => 'To date should be after From date '
        ];
        $validator = \Validator::make($request->all(), 
        [
            'school_name'   => 'required',
            'field_of_study'=> 'required',
            'description' => 'required|min:10',
            'degree_id'  => 'required',
            'start_date'  => 'required|before:today|after:' . Config('settings.minimum_system_start_date'),            
            'end_date'    => 'before:today|after:start_date',
        ],$custom_messages);
        
        if ($validator->fails())
        {
            return response()->json(['validation_errors'=>$validator->errors()]);
        }
       
        $user = auth()->user();        

        try {

            UserEducation::find($seller_education_id)->update($request->only('school_name','education','field_of_study','description','degree_id','start_date','end_date','is_enrolled'));
            
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
    public function saveUserPortfolio(StorePortfolioRequest $request)
    {
        DB::beginTransaction();
        try {

            $request_data = [];

            $request_data=$request->all();
            $request_data['user_id'] = auth()->user()->id;
            $id= $request->has('id') ? $request->id :''; 
            $portfolio=UserPortFolio::updateOrCreate(['id' => $id],
                $request_data
            );
            if($request->has('skills'))
                $portfolio->skills()->sync($request_data['skills']);

            if ($request->has('uploaded_files')) {
                if(!$portfolio->wasRecentlyCreated && $portfolio->wasChanged()){
                    $portfolio->attachments()->delete();
                }
                
                $attachments=json_decode($request->uploaded_files,true);
                if($attachments)
                    $portfolio->attachments()->createMany($attachments);
            }

            DB::commit();
            if($request_data['submit']=='preview'){
                if($portfolio->wasRecentlyCreated ){
                    $portfolio->is_draft=true;
                    $portfolio->save();
                }
                
                $notify[] = ['success', 'Portfolio preview updated successfully.'];
                Log::info(["portfolio" => $portfolio]);
                return redirect()->route('seller.profile.portfolio.view',$portfolio->uuid)->withNotify($notify);
            }
            else{
                $portfolio->is_draft=false;
                $portfolio->save();
                $notify[] = ['success', 'Portfolio has been added successfully.'];
                Log::info(["portfolio" => $portfolio]);
                return redirect()->route('profile.portfolio',auth()->user()->uuid)->withNotify($notify);
            }
            

        } catch (\Exception $exp) {

            Log::error(["portfolio" => $exp->getMessage()]);
            $notify[] = ['errors', 'Failled To Add Portfolio.'];
            return back()->withNotify($notify);

        }
    }
    
    
    
    public function getpassword(){
        return view( 'templates.basic.user.seller.new_password');
    }
    
    /**
     * sellerprofilePasswordChange
     *
     * @param  mixed $request
     * @return void
     */
    public function sellerprofilePasswordChange(Request $request){

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


                    return response()->json(['success' => 'Seller Password Updated Successfully', 'redirect_url' => route('user.home')]);


                }


            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);
                


            }
        }

    }
    
    /**
     * profilePictureUpdate
     *
     * @param  mixed $request
     * @return void
     */
    public function profilePictureUpdate(Request $request){
        
        $user=auth()->user();
        if ($request->hasFile('profile_pic')) {

            $path = imagePath()['attachments']['path'];
            $file=$request->profile_pic;
            $filename = uploadAttachments($file, $path);
            $file_extension = getFileExtension($file);
            $url = $path . '/' . $filename;
            $user->basicProfile->profile_picture=$url;
            $user->basicProfile->save();
            return response()->json(['success'=>'Profile picture updated successfully']);
        }
        else
            return response()->json(['errors'=>['Failled to update profile picture']]);
    }

    

    public function deletePortfolio($uuid){
        try {

            $user_portfolio=UserPortFolio::where('uuid',$uuid)->firstOrFail();
            $user_portfolio->attachments()->delete();
            $user_portfolio->skills()->detach();
            $user_portfolio->delete();
            $notify[] = ['success', 'Portfolio Deleted Successfully'];
            return redirect()->route('profile.portfolio',auth()->user()->uuid)->withNotify($notify);

        }
        catch (\Exception $exp) {
            Log::error([" Portfolio Edit " => $exp->getMessage() ]);
            $notify[] = ['errors', 'Failled To Fetch  Portfolio.'];
            return back()->withNotify($notify);

        }
    }
   
    public function requestForTestimonial(StoreTestimonialRequest $request){
        
        try {

            DB::beginTransaction();
            $request->merge(['user_id' => Auth::user()->id]);
            $user_testimonial=UserTestimonial::create($request->all());
            Mail::to($user_testimonial->client_email)->send(new TestimonialEmail($user_testimonial));
            DB::commit();

            return response()->json(['success'=>'Tesitmonial request generated successfully']);

        } catch (\Throwable $th) {

            DB::rollback();
            Log::info("Error In requestForTestimonial " .$th->getMessage());
            return response()->json(['error'=>'Failled to generate testimonial request']);

        }
    }

    public function testimonialResponse(Request $request){
        
        try {
            $user_testimonial=UserTestimonial::with('user')->where('token',$request->token)->firstOrFail();
            $user_testimonial->token=null;
            $user_testimonial->save();
            $user=$user_testimonial->user;

            return view('responses\testimonial_response_latest',compact('user_testimonial','user'));

        }
        catch (\Throwable $th) {

            Log::info("Error In Recieving Testimonial Response " .$th->getMessage());
            return "Server Error Please try again";

        }
    }

    public function thankYou(){
        // $user_testimonial = UserTestimonial::find(3);
        // $user=User::find(1);
        // $response_url =route('response.testimonial',['token' => $user_testimonial->token]);
        // return view('layout_email\testimonial\testimonial',compact('user_testimonial','user','response_url'));

    }

    public function savetestimonialResponse(StoreTestimonialClientResponseRequest $request){
        try {
            if(UserTestimonial::find($request->user_testimonial_id)->client_response != ''){
                $message = 'Your response has already been saved Thank You';
                return view('responses.thank_you')->with('message');

            }
            UserTestimonial::where('id',$request->user_testimonial_id)->update(
                $request->only(
                    'client_response',
                    'communication_rating',
                    'expertise_rating',
                    'professionalism_rating',
                    'quality_rating',
                    'client_response_full_name',
                    'client_response_role',
                    'client_response_company',
                    'client_response_linkedin_profile_url'
                )
            );
            $message = 'Your response has been saved Thank You';
            return view('responses.thank_you')->with('message');
        }
        catch (\Throwable $th) {

            Log::info("Error In Saving Testimonial Response " .$th->getMessage());
            $notify[] = ['error', 'Server Error Please try again'];
            return $notify;

        }

    }
}
