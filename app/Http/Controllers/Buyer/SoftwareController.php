<?php
namespace App\Http\Controllers\Buyer;
use App\Http\Controllers\Controller;
use App\Models\BudgetType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Proposal;
use App\Models\Service;
use App\Models\Software\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class SoftwareController extends Controller
{
    public $activeTemplate;
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function bookSoftware(Request $request,$uuid){
        DB::beginTransaction();
        try {
           
            $user=auth()->user();
            $software=Software::with('defaultProposal.attachments')->where('uuid',$uuid)->firstOrFail();
            $job=Job::create([
                "user_id"   => $user->id,
                "job_type_id"   => JobType::$OneTime,
                "country_id"    => null,
                "category_id"   => $software->category_id,
                "sub_category_id" => $software->sub_category_id ,
                "rank_id"       => null ,
                "project_stage_id"  => null ,
                "budget_type_id"    => BudgetType::$fixed ,
                "title"     =>   $software->title,
                "description"   => $software->description ,
                "fixed_amount"  => $software->price ,
                "hourly_start_range"    => null ,
                "hourly_end_range"  => null ,
                "project_length_id" => null ,
                "expected_start_date"   => null,
                "status_id" => Job::$Approved,
                "module_id" => $software->id,
                "module_type" => get_class($software),
                "is_private" => true,

            ]);
            $software_proposal_attachments=$software->defaultProposal->attachments;
            $software_proposal=$software->defaultProposal->toArray();
            $software_proposal['bid_type'] = Proposal::$by_project;
            $job_proposal=$job->proposal()->create($software_proposal);
            $job_proposal->attachment()->createMany($software_proposal_attachments->toArray());
            DB::commit();
            Log::info('Software Booked SuccessFully');
            $notify[] = ['success','Software Booked SuccessFully'];
            return redirect()->back()->withNotify($notify);

        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error(['Error In Booking Software' => $th->getMessage()]);
            $notify[] = ['error',"Failled To Book Software"];
            return redirect()->back()->withNotify($notify); 

        }

    }
}
?>