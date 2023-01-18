<?php
namespace App\Http\Controllers\Buyer;
use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Service;
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
            $service=Service::with('defaultProposal.attachments')->where('uuid',$uuid)->firstOrFail();

            $job=Job::create([
                "user_id"   => $user->id,
                "job_type_id"   => JobType::$OneTime,
                "country_id"    => null,
                "category_id"   => $service->category_id,
                "sub_category_id" => $service->sub_category_id ,
                "rank_id"       => null ,
                "project_stage_id"  => null ,
                "budget_type_id"    => BudgetType::$hourly ,
                "title"     =>   $service->title,
                "description"   => $service->description ,
                "fixed_amount"  => null  ,
                "hourly_start_range"    => null ,
                "hourly_end_range"  => null ,
                "project_length_id" => null ,
                "expected_start_date"   => null,
                "status_id" => Job::$Approved,
                "module_id" => $service->id,
                "module_type" => get_class($service),
                "is_private" => true,

            ]);

            $service_proposal=$service->defaultProposal;
            $job_proposal=$job->proposal()->create($service_proposal->toArray());
            $job_proposal->attachment()->createMany($service_proposal->attachments->toArray());
            DB::commit();
            Log::info('Service Booked SuccessFully');
            $notify[] = ['success','Service Booked SuccessFully'];
            return redirect()->back()->withNotify($notify);

        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error(['Error In Booking Service' => $th->getMessage()]);
            $notify[] = ['error',"Failled To Book Service"];
            return redirect()->back()->withNotify($notify);

        }

    }
}
?>