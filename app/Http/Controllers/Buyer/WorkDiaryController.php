<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\DayPlanningApprovalRequest;
use App\Models\DayPlanning;
use App\Models\DayPlanningStatusComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkDiaryController extends Controller
{
    public function approveDayPlanning(DayPlanningApprovalRequest $request){
        try {

            DB::beginTransaction();
                
                $data=$request->only('approval_status_code','comment','day_planning_id');
                $day_planning=DayPlanning::findOrFail($data['day_planning_id']);
                $data['contract_id']=$day_planning->contract_id;
                DayPlanningStatusComment::create($data);
                $day_planning->status_id=$data['approval_status_code'];
                $day_planning->save();
                $contract=$day_planning->contract;
                $contract->approved_hours=$contract->approved_hours+$day_planning->total_day_hours;
                $contract->save();

            DB::commit();
            $notify[] = ["success","Day planning status updated successfully"];
            return redirect()->route('work-diary.index',$day_planning->contract->uuid)->withNotify($notify);
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            $notify[] = ["error","Failled to update day planning status"];
            return back()->withNotify($notify);
        }
    }
}
