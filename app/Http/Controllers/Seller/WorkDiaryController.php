<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\StoreTaskCommentRequest;
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
use App\Models\TaskComment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use PhpParser\Node\Stmt\TryCatch;

class WorkDiaryController extends Controller
{
    
    public function index($contract_uuid=null){
        try {
            $last_login_role_id=getLastLoginRoleId();
            $day_plannings=DayPlanning::withAll();
            if ($last_login_role_id == Role::$Freelancer) {
                $day_plannings->where('created_by',auth()->user()->id);
            }
            elseif($last_login_role_id == Role::$Client){
                $day_plannings->where('client_id',auth()->user()->id);
            }
            else{

            }
            
            if($contract_uuid){
                $contract=Contract::where('uuid',$contract_uuid)->firstOrFail();
                $day_plannings=$day_plannings->where('contract_id',$contract->id);
            }
            $day_plannings=$day_plannings->paginate(10);
            $contracts=getUserContracts($contract_uuid);

            $emptyMessage="Tasks Not Found";
            $timezones = Timezone::select('id','name')->get();
            $notify[] = ["success","Task comment added successfully"];
            return view('templates.basic.user.seller.work_diary.index',compact('day_plannings','emptyMessage','contracts','timezones'))->withNotify($notify);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $notify[] = ["error","Failled to save task comment"];
            return redirect()->back()->withNotify($notify);
        }
    }
    public function taskComments($task_uuid){
        try {

            $day_planning_task=DayPlanningTask::where('uuid',$task_uuid)->firstOrFail();
            $comments=TaskComment::with('user')->orderBy('created_at','desc')->where('day_planning_task_id',$day_planning_task->id)->paginate(10);
            $emptyMessage="Comments Not Found";
            return view('templates.basic.user.seller.work_diary.task_comments',compact('comments','day_planning_task','emptyMessage'));


        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with(['error' => 'Failled to get day plannings task comments']);
        }

    }
    public function storetaskComment(StoreTaskCommentRequest $request){
        try {
            $data=$request->only('day_planning_task_id','comment');
            $last_login_role_id=getLastLoginRoleId();
            $role='';
            if ($last_login_role_id == Role::$Freelancer) {
                $role=Role::$FreelancerName;
            }
            elseif($last_login_role_id == Role::$Client){
                $role=Role::$ClientName;
            }
            else{
                $role='';
            }
            $data['role']=$role;
            TaskComment::create($data);

            return redirect()->back()->with(['success' => 'Comment Added Successfully']);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with(['error' => 'Failled to add day plannings task comment']);
        }
    }

    public function store(CreateTaskRequest $request){
        try {
            $previousUrl = URL::previous();
            $previousRouteName = Route::getRoutes()->match(Request::create($previousUrl))->getName();
            
            $start_time=$request->start_time;
            $end_time=$request->end_time;
            $already_uploaded_files= json_decode($request->already_uploaded_files,true);
            $worked_hours=0;
            $worked_minutes=0;
            list($st_hours, $st_minutes, $st_seconds) = explode(':', $start_time);
            list($et_hours, $et_minutes, $et_seconds) = explode(':', $end_time);

            $st_hours_minutes = $st_hours * 60 + $st_minutes;
            $et_hours_minutes = $et_hours * 60 + $et_minutes;
            $diff_minutes     = $et_hours_minutes - $st_hours_minutes;

            $with_minutes_hours=$diff_minutes / 60;
            $worked_hours=intval($with_minutes_hours);
            $worked_minutes=$diff_minutes % 60 ;
            $day_planning_task_pre_state=null;
            if(!is_null($request->task_id)){
                $day_planning_task_pre_state=DayPlanningTask::find($request->task_id);
                $day_planning_task_pre_state->delete();
            }

            $already_day_plannings = DayPlanning::where('planning_date', $request->planning_date)
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

                 })->with('tasks');
            $existing_day_plannings = $already_day_plannings->exists();

            if($existing_day_plannings){
                if($day_planning_task_pre_state){
                    // dd($already_day_plannings->get()->toArray());
                    $day_planning_task_pre_state->restore();
                }
                return response()->json(['error' => 'The Entered hours are already added against this day']);

            }
            else{

                DB::beginTransaction();

                $contract=Contract::withAll()->find($request->contract_id);
            
                $day_planning=DayPlanning::firstOrCreate
                    (
                        [
                            'contract_id' => $request->contract_id,
                            'planning_date' => $request->planning_date
                        ],
                        [
                            'job_id' => $contract->offer->proposal->module_id,
                            'offer_id' => $contract->module_offer_id,
                            'status_id' => DayPlanning::STATUSES['Draft'],
                            'client_id' => $contract->offer->offer_send_by_id,
        
                        ]
                    );


                    $day_planning_task=$day_planning->tasks()->create([
                        'job_id'       => $day_planning->job_id,
                        'contract_id'  => $day_planning->contract_id,
                        'offer_id'     => $day_planning->offer_id,
                        'status_id'    => $request->action == 'draft' ? DayPlanning::STATUSES['Draft'] : DayPlanning::STATUSES['AwaitingApproval'],
                        'client_id'    => $day_planning->client_id,
                        'description'  => $request->description,
                        'timezone'     => $request->timezone_id,
                        'start_time'   => $request->start_time,
                        'end_time'     => $request->end_time,
                        'time_in_hours' => $worked_hours,
                        'time_in_minutes' => $worked_minutes,
                    ]);

                    if($day_planning_task_pre_state){
                        $minutes=$day_planning_task_pre_state->time_in_hours*60+$day_planning_task_pre_state->time_in_minutes;
                        $hours=$minutes/60;
                        $day_planning = $day_planning_task_pre_state->day;
                        $day_planning->update(['total_day_hours'=> $day_planning->total_day_hours- $hours]);
                        // $day_planning->save();
                        $pre_attachments=$day_planning_task_pre_state->attachments;
                        if($pre_attachments)
                        {
                            $pre_attachments->each->delete();
                            if($already_uploaded_files && count($already_uploaded_files)>0){
                                foreach ($already_uploaded_files as $key => $already_uploaded_file) {
                                    $day_planning_task->attachments()->create([
                                        "name" => $already_uploaded_file['name'],
                                        "uploaded_name" => $already_uploaded_file['uploaded_name'],
                                        "url" =>  $already_uploaded_file['url'],
                                        "type" => $already_uploaded_file['type'],
                                    ]);
                                }
                            }
                        }
                    }

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
                    $redirect_url = route('work-diary.contract.day.tasks',$contract->uuid);
                    log::info($redirect_url);
                   
               
                DB::commit();
            }
            $day=Carbon::now()->format('Y-m-d');
            return response()->json(['success' => 'Task Added Successfully' , 'redirect' => $redirect_url,'day' => $request->planning_date, 'uuid' => $contract->uuid]);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollback();
            return response()->json(['error' => 'Faiiled to add task. Please try again later']);
        }
    }

    public function RequestApproval(Request $request,$day_planning_task_uuid){
        try {
            
            DayPlanningTask::where('uuid',$day_planning_task_uuid)->update([
                'status_id' =>   $request->next_status
            ]);
            $notify[] = ["success","Day Planning task status updated successfully"];
            return redirect()->back()->withNotify($notify);

        } catch (\Throwable $th) {

            Log::error($th->getMessage());
            $notify[] = ["error","Failled to update day planning task status. Please try again later"];
            return redirect()->back()->withNotify($notify);
            
        }
    }

    public function update(){
        
    }
    private function contractTasksData($contract_uuid,$day){
        try {
            $data=[];
            $day_planning_tasks=collect([]);
            $data['tasks_in_draft_count_count'] = 0; 
            $data['tasks_in_progress_count'] =  0; 
            $data['tasks_in_awating_approval_count'] = 0; 
            $data['tasks_in_completed_count'] = 0; 
            $data['total_day_hours'] = '0hrs 0m'; 
            $data['total_day_hours_dollars'] = '$0'; 
            $data['tasks_in_progress']=[];
            $data['tasks_in_awating_approval']=[];
            $data['tasks_in_draft']=[];
            $data['tasks_in_completed']=[];


            if($contract_uuid){

                $contract = Contract::with('offer')->with('status')->where('uuid',$contract_uuid)->firstOrFail();
                $rate_per_hour = User::find($contract->offer->offer_send_to_id)->rate_per_hour;

                $day_plannings=DayPlanning::withAll()->where('contract_id',$contract->id)->whereDate('planning_date','=',$day)->first();
                if($day_plannings){
                    $day_planning_tasks=$day_plannings->tasks ? $day_plannings->tasks :collect([]);
                    $total_hours_minutes=($day_planning_tasks->sum('time_in_hours')*60);
                    $total_minutes=$day_planning_tasks->sum('time_in_minutes');
                    $all_in_minutes=$total_minutes+$total_hours_minutes;
                    $minutes=($all_in_minutes)%60;
                    $hours=intval(($all_in_minutes)/60);

                    $data['total_day_hours'] = $hours.'hrs '.$minutes.'m';
                    $data['total_day_hours_dollars'] = '$'. $all_in_minutes*($rate_per_hour/60); 

                    $data['tasks_in_draft_count_count'] =  $day_planning_tasks->where('status_id',DayPlanning::STATUSES['Draft'])->count(); 
                    $data['tasks_in_progress_count'] =  $day_planning_tasks->where('status_id',DayPlanning::STATUSES['In_Progress'])->count(); 
                    $data['tasks_in_awating_approval_count'] =$day_planning_tasks->where('status_id',DayPlanning::STATUSES['AwaitingApproval'])->count(); 
                    $data['tasks_in_completed_count'] = $day_planning_tasks->where('status_id',DayPlanning::STATUSES['Completed'])->count(); 
                }
                $data['contract_uuid']= $contract_uuid;

            }
            
            $filteredTasks    = $day_planning_tasks->where('status_id',DayPlanning::STATUSES['Draft']);
            foreach ($filteredTasks as $task) {
                $data['tasks_in_draft'][] = $task;
            }
            $filteredTasks = $day_planning_tasks->where('status_id',DayPlanning::STATUSES['In_Progress']); 
            foreach ($filteredTasks as $task) {
                $data['tasks_in_progress'][] = $task;
            }
            $filteredTasks = $day_planning_tasks->where('status_id',DayPlanning::STATUSES['AwaitingApproval']);
            foreach ($filteredTasks as $task) {
                $data['tasks_in_awating_approval'][] = $task;
            }
            $filteredTasks = $day_planning_tasks->where('status_id',DayPlanning::STATUSES['Completed']);
            foreach ($filteredTasks as $task) {
                $data['tasks_in_completed'][] = $task;
            }
            $data['contract'] = $contract;


           
            return $data;


        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public function contractTasks(Request $request, $contract_uuid){
        try {
            $today_date=Carbon::parse($request->day)->format('Y-m-d');
            $data=$this->contractTasksData($contract_uuid,$today_date);
            return response()->json(['success' => 'contract day planning data fetched successfully','data'=>$data]);

        } catch (\Throwable $th) {

            DB::rollback();
            Log::error($th->getMessage());
            return response()->json(['error' => $th->getMessage()]);

        }
    }
    public function newTasks(Request $request, $contract_uuid){
        try {
            $today_date=Carbon::now()->format('Y-m-d');

            $data=$this->contractTasksData($contract_uuid,$today_date);
            
            return view('templates.basic.user.seller.work_diary.index_new',compact('data'));

        } catch (\Throwable $th) {

            DB::rollback();
            Log::error($th->getMessage());
            $notify[] = ["error","Failled to get contract tasks"];
            return redirect()->back()->withNotify($notify);

        }
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
