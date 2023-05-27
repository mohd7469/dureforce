<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractFeedback;
use App\Models\Job;
use App\Models\Role;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class ContractFeedbackController extends Controller
{

    public function store(Request $request)
    {

//        try {
//            $this->validate($request, [
//                'reason_end_contract_id' => 'required',
//                'feedback_for_id' => 'required',
//                'recomended_score' => 'required',
//                'skills_score' => 'required',
//                'contract_id' => 'required',
//                'quality_of_work_score' => 'required',
//                'adherence_of_schedule_score' => 'required',
//                'availability_score' => 'required',
//                'communication_score' => 'required',
//                'about' => 'required',
//                'feedback' => 'required',
//            ]);
            $request_data = $request->all();
            $user = Auth::user();
            $uuid=$request_data['contract_id'];
            DB::beginTransaction();
            $last_role_id=getLastLoginRoleId();
            if(!isset($request_data['skills_rating'])){
                $request_data['skills_rating']=0;
            }
            if(!isset($request_data['quality_rating'])){
                $request_data['quality_rating']=0;
            }
            if(!isset($request_data['schedule_rating'])){
                $request_data['schedule_rating']=0;
            }
            if(!isset($request_data['communication_rating'])){
                $request_data['communication_rating']=0;
            }
            if(!isset($request_data['cooperation_rating'])){
                $request_data['cooperation_rating']=0;
            }
            if(!isset($request_data['availabilty_rating'])){
                $request_data['availabilty_rating']=0;
            }
            if(isset($request_data['rating_num'])){
                $request_data['rating_num']=0;
            }

            $totalScore = $request_data['skills_rating']+$request_data['quality_rating']+$request_data['schedule_rating']+$request_data['communication_rating']+$request_data['cooperation_rating']+$request_data['availabilty_rating'];

                $feedback = ContractFeedback::create([
                "role_id" => $last_role_id,
                "reason_end_contract_id" => $request_data['reason'],
                "not_recomended_reason_id" => $request_data['reasonCause'],
                "feedback_for_id" => $request_data['contract_send_to'],
                'contract_id'=> $request_data['contract_id'],
                "recomended_score" => $request_data['rating_num'],
                "skills_score" => $request_data['skills_rating'],
                "quality_of_work_score" => $request_data['quality_rating'],
                "availability_score" => $request_data['availabilty_rating'],
                "adherence_of_schedule_score" => $request_data['schedule_rating'],
                "communication_score" => $request_data['communication_rating'],
                "cooperation_score" => $request_data['cooperation_rating'],
                "total_score" => $totalScore,
                "about" => $request_data['about'],
                "feedback" => $request_data['feedback'],

            ]);

        $contract=Contract::find($uuid);
        $contract->status_id = Contract::STATUSES['Completed'];
        $contract->updated_at = Carbon::now();
        $contract->save();

        DB::commit();

        return response()->json(['code' => 200]);

//        }
//        catch (\Exception $exp) {
//            DB::rollback();
//            Log::error($exp->getMessage());
//            return response()->json(["error" => $exp->getMessage()]);
//        }

    }

    public function storenew(Request $request){
        try{
            $request_data = $request->all();
            $user = Auth::user();
            $last_role_id=$user->last_role_activity;

            if($last_role_id == Role::$Freelancer){
                $feedback_for_id = $request_data['contract_send_to'];
            }
            else{
                $feedback_for_id = $request_data['contract_send_by'];
            }
            DB::beginTransaction();

            $contract=Contract::find($request_data['contract_id']);
            if ($contract){

             ContractFeedback::create([
                "role_id" => $last_role_id,
                "feedback_for_id" => $feedback_for_id,
                "contract_id" => $contract->id,
                "total_score" => $request_data['rating']  ?? null,
                "feedback" => $request_data['feedback']  ?? null,
                "created_by"=> $user->id,
                "updated_by" => $user->id,

            ]);
            $contract->status_id = Contract::STATUSES['Completed'];
            $contract->updated_at = Carbon::now();
            $contract->save();

            }

            DB::commit();
            return response()->json(['code' => 200]);
        }
        catch (\Exception $exp) {
            DB::rollback();
            errorLogMessage($exp);
            return response()->json(["error" => $exp->getMessage()]);
        }
    }

}
