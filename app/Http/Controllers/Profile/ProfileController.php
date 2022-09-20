<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserExperiences;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserPayment;
use DB;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
       
        $user = User::find(1);
        // dd($request->all());

        try {
            foreach($request->input('job_title')  as $key => $value  ) {
                $userExperiance = new UserExperiences;
                
                $userExperiance->title = $request->get("job_title")[$key];
                $userExperiance->user_id = $user->id;
                $userExperiance->isCurrent = json_decode($request->get("isCurrent")[$key]) ??  0;
                $userExperiance->company = $request->get("company")[$key];
                $userExperiance->description = $request->get("job_description")[$key];
                $userExperiance->end = $request->get("end_date_job")[$key] ??  null;
                $userExperiance->start = $request->get("start_date_job")[$key] ?? null;
                $userExperiance->location = $request->get("location")[$key];

                $userExperiance->save();    
               
                
               
            }
            return response()->json(["success" => "User Experience submitted"], 200);

        } catch (\Exception $exp) {
            $notify[] = ['error', 'Document could not be uploaded.'];
            return back()->withNotify($notify);
        }
       
            

    
    }
    public function storeEducation(Request $request){

        $user = User::find(1);
        
        
        try {
            foreach($request->input('institute_name')  as $key => $value  ) {
               
                $userEducation = new UserEducation();
                $userEducation->institute_name = $request->get("institute_name")[$key];
                $userEducation->user_id = $user->id;
                $userEducation->isCurrent = json_decode($request->get("isCurrent")[$key]) ??  0;
                $userEducation->degree = $request->get("degree_id")[$key];
                $userEducation->degree = $request->get("degree")[$key];
                $userEducation->field = $request->get("field")[$key];
                
                $userEducation->end = $request->get("end_date_institute")[$key]??  null;
                $userEducation->start = $request->get("start_date_institute")[$key]??  null;
                $userEducation->description = $request->get("institute_description")[$key];

                $userEducation->save();
               
            }
            return response()->json(["success" => "User Education submitted"], 200);

        } catch (\Exception $exp) {
            $notify[] = ['error', 'Document could not be uploaded.'];
            return back()->withNotify($notify);
        }

    }
    public function storePayment(Request $request){
        $user = User::find(1);
     
    
        try {
            
               
                $userPayment = new UserPayment();
                $userPayment->card_number = $request->card_number;
                $userPayment->user_id = $user->id;
                $userPayment->expiration_date = $request->expiration_date;
                $userPayment->cvv_code = $request->cvv_code;
                $userPayment->name_on_card = $request->name_on_card;
                
                $userPayment->country = $request->country;
                $userPayment->city = $request->city;
                $userPayment->street_address = $request->street_address;
                $userPayment->street_address_two = $request->street_address_two;

                $userPayment->save();
               
            
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
