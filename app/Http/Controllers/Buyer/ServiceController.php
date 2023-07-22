<?php
namespace App\Http\Controllers\Buyer;
use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Proposal;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class ServiceController extends Controller
{
    public $activeTemplate;
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function bookService(Request $request,$uuid){
        DB::beginTransaction();
        try {
           
            $user=auth()->user();
            $service=Service::with('defaultProposal.attachments')->with('skills')->with('deliverable')->where('uuid',$uuid)->firstOrFail();
            if($service->isBooked()){
                $notify[] = ['error',"Service Already Booked"];
                return redirect()->back()->withNotify($notify);
            }
            $job=Job::create(
                
                [
                "user_id"   => $user->id,
                "module_id" => $service->id,
                "module_type" => get_class($service),
                "job_type_id"   => JobType::$OneTime,
                "country_id"    => $service->user->country_id,
                "category_id"   => $service->category_id,
                "sub_category_id" => $service->sub_category_id ,
                "rank_id"       => null ,
                "project_stage_id"  => null ,
                "budget_type_id"    => BudgetType::$hourly ,
                "title"     =>   $service->title,
                "description"   => $service->description ,
                "fixed_amount"  => null  ,
                "hourly_start_range"    => ($service->rate_per_hour-5) < 1 ? $service->rate_per_hour :$service->rate_per_hour-5 ,
                "hourly_end_range"  => $service->rate_per_hour+5 ,
                "project_length_id" => null ,
                "expected_start_date"   => Carbon::now(),
                "status_id" => Job::$Approved,
                "is_private" => true,

            ]);
            $deliverables=$service->deliverable->pluck('id')->toArray();
            $skills=$service->skills;

            $job->deliverable()->attach($deliverables);
            $job->skill()->saveMany($skills);

            $service_proposal=$service->defaultProposal;
            $proposal=$service_proposal->toArray();
            $proposal['status_id']=Proposal::STATUSES['SUBMITTED'];
            $job_proposal=$job->proposal()->create($proposal);
            
            $job_proposal->attachment()->createMany($service_proposal->attachments->toArray());
            DB::commit();
            Log::info(["ServiceBooked" => 'Service Booked SuccessFully']);
            $notify[] = ['success','Service Booked SuccessFully'];
            return redirect()->route('buyer.job.single.view',$job->uuid)->withNotify($notify);

        } catch (\Throwable $th) {
            DB::rollBack();

            // Log::error(['Error In Booking Service' => $th->getMessage()]);
            errorLogMessage($th);
            $notify[] = ['error',"Failled To Book Service"];
            return redirect()->back()->withNotify($notify);

        }

    }
}
?>