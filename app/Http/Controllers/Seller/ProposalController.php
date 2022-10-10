<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropsalStoreRequest;
use App\Models\BudgetType;
use App\Models\DeliveryMode;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Milestone;
use App\Models\Proposal;
use App\Models\ProposalAttachment;
use App\Models\SkillCategory;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function activeTemplate;
use function back;
use function dd;
use function getFileExtension;
use function imagePath;
use function response;
use function uploadAttachments;
use function view;

class ProposalController extends Controller
{

    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Submit a proposal";
        return view($this->activeTemplate .'proposal',compact('pageTitle'));

    }
    
    /**
     * proposal
     *
     * @param  mixed $uuid
     * @return void
     */
    public function createProposal($uuid)
    {

        $job = Job::where('uuid',$uuid)->withAll()->first();
        $skill_categories = SkillCategory::select('name', 'id')->get();
        $delivery_modes = DeliveryMode::Active()->select(['id','title'])->get();
        foreach($skill_categories as $skillCat){
            $skills = Skills::where('skill_category_id', $skillCat->id)->groupBy('skill_category_id')->get();
        }
        $pageTitle = "Proposal";
        return view('templates.basic.jobs.Proposal.submit-proposal', compact('pageTitle','job','skills','delivery_modes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePropsal(Request $request, $job_uuid)
    {
        $user = Auth::user();

        $job = Job::where('uuid',$job_uuid)->first();
        $request_data = [];
        parse_str($request->data, $request_data);


        try {
            DB::beginTransaction();
            $proposal =$job->proposal()->create([
                "user_id" => $user->id,
                "delivery_mode_id" => $request_data['delivery_mode_id'],
                "hourly_bid_rate" => isset($request_data['hourly_bid_rate']) ? $request_data['hourly_bid_rate'] : null,
                "fixed_bid_amount" => isset($request_data['total_project_price']) ? $request_data['total_project_price'] : null,
                "bid_type" => isset($request_data['bid_type']) ? $request_data['bid_type'] : '' ,
                "start_hour_limit" => isset($request_data['start_hour_limit']) ? $request_data['start_hour_limit'] : null,
                "end_hour_limit" => isset($request_data['end_hour_limit']) ? $request_data['end_hour_limit'] : null,
                "cover_letter" => $request_data['cover_letter'],
            ]);



            if ( isset($request_data['bid_type']) && $request_data['bid_type'] == Proposal::$bid_type_milestone){

                $milestones_data=array_values($request_data['milestones']);
                if(count($milestones_data)>0){
                    
                    $proposal->milestone()->createMany($milestones_data);
                    $milestones_collection=collect($milestones_data);
                    $total_amount = $milestones_collection->sum('amount');
                    $proposal->amount_receive=$total_amount*0.80;

                }
                
            }

            elseif( isset($request_data['bid_type']) && $request_data['bid_type'] ==  Proposal::$by_project){
                
                $proposal->amount_receive=$request_data['total_project_price']*0.80;
                $proposal->project_start_date=$request_data['project_start_date'];
                $proposal->project_end_date=$request_data['project_end_date'];

            }
            else
            {
                $proposal->amount_receive=$request_data['hourly_bid_rate']*0.80;

            }

            $proposal->save();

            //            if ($request->hasFile('file')) {
            //
            //                foreach ($request->file as $file) {
            //                    $path = imagePath()['attachments']['path'];
            //                    try {
            //                        $filename = uploadAttachments($file, $path);
            //
            //                        $file_extension = getFileExtension($file);
            //                        $url = $path . '/' . $filename;
            //                        $proposal_attachment = new ProposalAttachment;
            //                        $proposal_attachment->name = $filename;
            //                        $proposal_attachment->uploaded_name = $file->getClientOriginalName();
            //                        $proposal_attachment->url = $url;
            //                        $proposal_attachment->type = $file_extension;
            //                        $proposal_attachment->is_published = "Active";
            //                        $proposal_attachment->proposal()->save($proposal);
            //
            //                    } catch (\Exception $exp) {
            //                        $notify[] = ['error', 'Document could not be uploaded.'];
            //                        return back()->withNotify($notify);
            //                    }
            //
            //                }
            //            }

            DB::commit();

            return response()->json(["redirect" => route('seller.jobs.listing'), "message" => "Proposal submitted"]);

        } catch (\Exception $exp) {
            DB::rollback();
            return response()->json(["error" => $exp->getMessage()]);
        }
    }

    
    public function validatePropsal(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);
        $rules=[];
        // hourly budget type
        if($request_data['job_type'] == BudgetType::$hourly){
            
            $rules=[
                'delivery_mode_id' => 'required|exists:delivery_modes,id',
                'hourly_bid_rate' => 'required|integer|min:1',
                'amount_receive' => 'required',
                'start_hour_limit' => 'required_with:end_hour_limit|integer|min:1',
                'end_hour_limit' => 'required_with:start_hour_limit|integer|gt:start_hour_limit',
                'cover_letter' => 'string'
            ];
            
        }
        // fixed budget
        elseif($request_data['job_type'] == BudgetType::$fixed)
        {

            if ($request_data['bid_type']=='milestone'){
                $rules=[
                    'delivery_mode_id' => 'required|exists:delivery_modes,id',
                    'milestones.*.description' => 'string|required',
                    'milestones.*.start_date' => 'date|required|after_or_equal:now',
                    'milestones.*.end_date' => 'date|required|after_or_equal:milestones.*.start_date',
                    'milestones.*.amount' => 'string|required',
                    'total_project_price' => 'required|integer',
                    'amount_receive' => 'required',
                    'cover_letter' => 'string|min:20'
                ];
            }
            elseif( $request_data['bid_type'] == 'by_project' ){
               $rules = [

                    'delivery_mode_id' => 'required|exists:delivery_modes,id',
                    'project_end_date' => 'required|date|after_or_equal:project_start_date',
                    'project_start_date' => 'required|date|after_or_equal:now',
                    'total_project_price' => 'required|integer',
                    'amount_receive' => 'required',
                    'cover_letter' => 'string|min:20'

                ];
            }
        }
        $validator = Validator::make($request_data, $rules);
        if ($validator->fails()) {

            return response()->json(["error" => $validator->errors()]);

        } else
            return response()->json(["validated" => "Propsal Data Is Valid"]);
    }
}
