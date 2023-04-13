<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Contract;
use App\Models\Country;
use App\Models\DayPlanningTask;

use App\Models\Role;
use App\Models\Timezone;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\DayPlanning;
class WorkDiaryController extends Controller
{
    
    public function index(){

        $day_plannings=DayPlanning::withAll()->where('created_by',auth()->user()->id)->paginate(10);
        $contracts=getUserContracts();
        $emptyMessage="Tasks Not Found";
        $timezones = Timezone::select('id','name')->get();
        return view('templates.basic.user.seller.work_diary.index',compact('day_plannings','emptyMessage','contracts','timezones'));

    }
    
    public function store(CreateTaskRequest $request){
        try {

            $existing_day_plannings=DayPlanning::select('id','planning_date')
            ->where('planning_date',$request->planning_date)
            ->where('contract_id',$request->contract_id)
            ->whereHas('tasks',function ($query) use ($request){
                    $query->whereBetween('start_time',[$request->start_time,$request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

            if($existing_day_plannings){
                return response()->json(['error' => 'The Entered hours are already added against this day']);

            }
            else{

                DB::beginTransaction();

                $contract=Contract::withAll()->find($request->contract_id);
            
                $day_planning=DayPlanning::updateOrCreate(
                    [
                        'contract_id' => $request->contract_id,
                        'planning_date' => $request->planning_date
                    ],
                    [
                        'job_id' => $contract->offer->proposal->module_id,
                        'offer_id' => $contract->module_offer_id,
                        'status_id' => DayPlanning::STATUSES['ApprovalNotYet_Requested'],
                        'client_id' => $contract->offer->offer_send_by_id,
    
                    ]);
                    $hours_worked=$request->end_time-$request->start_time;
                    $day_planning_task=$day_planning->tasks()->create([
                        
                        'job_id'       => $day_planning->job_id,
                        'contract_id'  => $day_planning->contract_id,
                        'offer_id'     => $day_planning->offer_id,
                        'status_id'    => DayPlanning::STATUSES['ApprovalNotYet_Requested'],
                        'client_id'    => $day_planning->client_id,
                        'description'  => $request->description,
                        'timezone'     => $request->timezone_id,
                        'start_time'   => $request->start_time,
                        'end_time'     => $request->end_time,
                        'time_in_hours' => $hours_worked
                    ]);
    
                    $day_planning->total_day_hours=$day_planning->total_day_hours+$hours_worked;
                    $day_planning->save();

                    if($request->has('uploaded_files')){
                        foreach ($request->uploaded_files as $file) 
                        {
    
                            $path = imagePath()['attachments']['path'];
                            $filename = uploadAttachments($file, $path);
    
                            $file_extension = getFileExtension($file);
                            $url = $path . '/' . $filename;
                            $uploaded_name = $file->getClientOriginalName();
                            $day_planning_task->attachments()->create([
    
                                'name' => $filename,
                                'uploaded_name' => $uploaded_name,
                                'url'           => $url,
                                'type' =>$file_extension,
                                'is_published' =>1
        
                            ]);
        
                         }
                    }
    
                DB::commit();
            }

            return response()->json(['success' => 'Task Added Successfully' , 'redirect' => route('seller.work-diary.index')]);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollback();
            return response()->json(['error' => 'Faiiled to add task. Please try again later']);
        }
    }

    public function update(){
        
    }
    public function delete(){
        
    }
}
