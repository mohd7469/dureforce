<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserExperiences;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserPayment;
use DB;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function getexperience(){
            $userexperiences = User::with('experiences')->where('id', 1)->first();
            
            $usereducations = User::with('education')->where('id', 1)->first();
            
        
            return view('templates.basic.profile.partials.profile_basic_design', compact('userexperiences','usereducations'));
      }
    public function store(Request $request)
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
       
        $user = User::find(2);        

        try {

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
    public function storeEducation(Request $request){
      

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
       
        $user = User::find(2);        

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



        $user = User::find(2);
        
        
        try {
            
            foreach($request->input('institute_name')  as $key => $value  ) {

                UserEducation::updateOrCreate([
                    'user_id' =>$user->id
                ],
                [

                    'school_name'     => $request->get('institute_name')[$key],
                    'education'     => $request->get('institute_name')[$key],
                    // 'is_working'    => isset($request['isCurrent'][$key]) ? 1 : 0,
                    'degree'  => $request->get("degree")[$key],
                    'field_of'   => $request->get("field")[$key],
                    'start_date'    => $request->get("start_date_institute")[$key] ??  null,
                    'end_date'      => $request->get("start_date_job")[$key] ?? null,
                    // 'country_id'    => $request->get("job_location")[$key]
                    'description'     => $request->get('institute_description')[$key],

                ]);
               
            }

            return response()->json(["success" => "User Experience Added Successfully"], 200);

        }catch (\Exception $exp) {
            $notify[] = ['error', 'Document could not be uploaded.'];
            return back()->withNotify($notify);
        }

    }
    public function getpayment(){
        $userpayments = User::with('payments')->where('id', 1)->first();
        
        return view('templates.basic.project_profile.partials.profile_payment_design', compact('userpayments'));
    }
    public function storePayment(Request $request){
        
        $validator = \Validator::make($request->all(), [
            'card_number' => 'required|string|max:150',
            'expiration_date' => 'date|required',
            'cvv_code' => 'required',
            'name_on_card' => 'required',
            'country' => 'required|string|max:150',
            'city' => 'required|string|max:150',
            'street_address' => 'required|string|max:250',
            'street_address_two' => 'required|string|max:250',
        
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }

         $user = User::find(1);
    
        try {
             UserPayment::updateOrCreate([
                 'user_id' =>$user->id
                ],
                 [
                    'card_number'     => $request->get('card_number'),
                    'expiration_date' => $request->get('expiration_date'),
                    'cvv_code'    => $request->get("cvv_code"),
                    'name_on_card'   => $request->get('name_on_card'),
                    'country'       => $request->get('country'),
                    'city'   => $request->get('city'),
                    'street_address'    => $request->get('street_address'),
                    'street_address_two'    => $request->get('street_address_two')
                ]);
               
               
            
            return response()->json(["success" => "User Payment submitted"], 200);

        } catch (\Exception $exp) {
            $notify[] = ['error', 'Document could not be uploaded.'];
            return back()->withNotify($notify);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
