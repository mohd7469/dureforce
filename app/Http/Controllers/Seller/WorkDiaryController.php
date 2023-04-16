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
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class WorkDiaryController extends Controller
{
    
    public function index($contract_uuid=null){
        try {

            $day_plannings=DayPlanning::withAll()->where('created_by',auth()->user()->id);
            if($contract_uuid){
                $contract=Contract::where('uuid',$contract_uuid)->firstOrFail();
                $day_plannings=$day_plannings->where('contract_id',$contract->id);
            }
            $day_plannings=$day_plannings->paginate(10);
            $contracts=getUserContracts($contract_uuid);

            $emptyMessage="Tasks Not Found";
            $timezones = Timezone::select('id','name')->get();
            return view('templates.basic.user.seller.work_diary.index',compact('day_plannings','emptyMessage','contracts','timezones'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with(['error' => 'Failled to get day plannings']);
        }
    }
    
    public function store(CreateTaskRequest $request){
        try {

            $previousUrl = URL::previous();
            $previousRouteName = Route::getRoutes()->match(Request::create($previousUrl))->getName();
            
            $start_time=$request->start_time;
            $end_time=$request->end_time;
            $worked_hours=0;
            $worked_minutes=0;
            list($st_hours, $st_minutes, $st_seconds) = explode(':', $start_time);
            list($et_hours, $et_minutes, $et_seconds) = explode(':', $end_time);

            $st_hours_minutes=$st_hours*60+$st_minutes;
            $et_hours_minutes=$et_hours*60+$et_minutes;
            $diff_minutes = $et_hours_minutes - $st_hours_minutes;
            $with_minutes_hours=$diff_minutes/60;
            $worked_hours=intval($with_minutes_hours);
            $worked_minutes=$diff_minutes%60;


            $existing_day_plannings = DayPlanning::where('planning_date', $request->planning_date)
                    ->where('contract_id', $request->contract_id)
                    ->whereHas('tasks', function ($query) use ($start_time, $end_time) {
                        $query->where(function ($subquery) use ($start_time, $end_time) {
                            $subquery->where('start_time', '<=', $start_time)
                                ->where('end_time', '>=', $start_time);
                        })
                        ->orWhere(function ($subquery) use ($start_time, $end_time) {
                            $subquery->where('start_time', '<=', $end_time)
                                ->where('end_time', '>=', $end_time);
                        })
                        ->orWhere(function ($subquery) use ($start_time, $end_time) {
                            $subquery->where('start_time', '>=', $start_time)
                                ->where('end_time', '<=', $end_time);
                        });

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
                        'time_in_hours' => $worked_hours,
                        'time_in_minutes' => $worked_minutes,
                    ]);
    
                    $day_planning->total_day_hours=$day_planning->total_day_hours+$with_minutes_hours;
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
                    $redirect_url = route('seller.work-diary.index');
                    if($previousRouteName=="work-diary.detail"){
                        $redirect_url = $previousUrl ;
                    }
               
                DB::commit();
            }

            return response()->json(['success' => 'Task Added Successfully' , 'redirect' => $redirect_url]);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollback();
            return response()->json(['error' => 'Faiiled to add task. Please try again later']);
        }
    }

    public function update(){
        
    }
    public function delete($uuid){
        try {

            DB::beginTransaction();
                $day_planning=DayPlanning::where('uuid',$uuid)->first();
                $day_planning_tasks=DayPlanningTask::where('day_planning_id',$day_planning->id)->get();
                if($day_planning_tasks){
                    $day_planning_tasks->each->delete();
                }
                $day_planning->delete();
            DB::commit();
            return response()->json(['success' => 'Work diary day planning deleted successfully']);


        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            return response()->json(['error' => 'Failled to delete work diary day planning']);

        }
    }

    public function deleteWorkDiaryTask($uuid){
        try {

            DB::beginTransaction();
                $task_to_delete=DayPlanningTask::with('day')->where('uuid',$uuid)->first();
                $minutes=$task_to_delete->time_in_hours*60+$task_to_delete->time_in_minutes;
                $hours=$minutes/60;
                $day_planning = $task_to_delete->day;
                $day_planning->total_day_hours= $day_planning->total_day_hours- $hours;
                $day_planning->save();
                $task_to_delete->delete();
            DB::commit();
            return response()->json(['success' => 'Work diary task deleted successfully']);


        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
            return response()->json(['error' => 'Failled to delete work diary task']);

        }

    }
    public function workDiaryDetail($uuid){
        
        try {
                $day_planning=DayPlanning::with('contract')->where('uuid',$uuid)->firstOrFail();
                $work_diary_tasks=collect([]);
                if($day_planning){
                    $work_diary_tasks=DayPlanningTask::WithAll()->where('day_planning_id',$day_planning->id)->paginate(10);
                }
                $emptyMessage = "Work Diary Not Found";
                $contracts=getUserContracts($day_planning->contract->uuid);
                $contract=$day_planning->contract;
                $timezones = Timezone::select('id','name')->get();
                return view('templates.basic.user.seller.work_diary.contract_tasks',compact('day_planning','work_diary_tasks','emptyMessage','contracts','timezones','contract'));

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with(['error' => 'Failled to get work diary details']);

        }

    }
}
