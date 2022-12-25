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
use App\Models\Role;
use App\Models\SkillCategory;
use App\Models\Skills;
use App\Models\User;
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
        try {

            $proposals = Proposal::with('module.user')->where('user_id', Auth::user()->id)->get();
            $submitted_proposals = $proposals->where('status_id',Proposal::STATUSES['SUBMITTED']);
            $archived_proposals = $proposals->where('status_id',Proposal::STATUSES['ARCHIVED']);
            $active_proposals = $proposals->where('status_id',Proposal::STATUSES['ACTIVE']);

            return view('templates.basic.buyer.propsal.my-proposal-list')->with('proposals', $proposals)->with('archived_proposals', $archived_proposals)->with('submitted_proposals', $submitted_proposals)->with('active_proposals',$active_proposals);

        } catch (\Exception $e) {

            return response()->json(["error" => "There is a technical error"]);

        }



    }
    public function details($uuid)
    {
        try {

            $proposal = Proposal::with(['module.user.country','attachment','milestone','delivery_mode'])->where('uuid', $uuid)->first();

            // dd($proposal->toArray());

            return view('templates.basic.buyer.propsal.proposal_details')->with('proposal',$proposal);

        } catch (\Exception $e) {

            return response()->json(["error" => "There is a technical error"]);

        }



    }

    /**
     * proposal
     *
     * @param mixed $uuid
     * @return void
     */
    public
    function createProposal($uuid)
    {

        $job = Job::where('uuid', $uuid)->withAll()->first();
        $skill_categories = SkillCategory::select('name', 'id')->get();
        $delivery_modes = DeliveryMode::Active()->select(['id', 'title'])->get();
        foreach ($skill_categories as $skillCat) {
            $skills = Skills::where('skill_category_id', $skillCat->id)->groupBy('skill_category_id')->get();
        }
        $pageTitle = "Proposal";
        return view('templates.basic.jobs.Proposal.submit-proposal', compact('pageTitle', 'job', 'skills', 'delivery_modes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function savePropsal(Request $request, $job_uuid)
    {
        $user = Auth::user();

        $job = Job::where('uuid', $job_uuid)->first();
        $request_data = [];
        parse_str($request->data, $request_data);

        try {
            DB::beginTransaction();
            $proposal = $job->proposal()->create([
                "user_id" => $user->id,
                "delivery_mode_id" => $request_data['delivery_mode_id'],
                "hourly_bid_rate" => isset($request_data['hourly_bid_rate']) ? $request_data['hourly_bid_rate'] : null,
                "fixed_bid_amount" => isset($request_data['total_project_price']) ? $request_data['total_project_price'] : null,
                "bid_type" => isset($request_data['bid_type']) ? $request_data['bid_type'] : '',
                "start_hour_limit" => isset($request_data['start_hour_limit']) ? $request_data['start_hour_limit'] : null,
                "end_hour_limit" => isset($request_data['end_hour_limit']) ? $request_data['end_hour_limit'] : null,
                "cover_letter" => $request_data['cover_letter'],
                "status_id" => Proposal::STATUSES['SUBMITTED'],
            ]);


            if (isset($request_data['bid_type']) && $request_data['bid_type'] == Proposal::$bid_type_milestone) {

                $milestones_data = array_values($request_data['milestones']);
                if (count($milestones_data) > 0) {

                    $proposal->milestone()->createMany($milestones_data);
                    $milestones_collection = collect($milestones_data);
                    $total_amount = $milestones_collection->sum('amount');
                    $proposal->amount_receive = $total_amount * 0.80;

                }

            } elseif (isset($request_data['bid_type']) && $request_data['bid_type'] == Proposal::$by_project) {

                $proposal->amount_receive = $request_data['total_project_price'] * 0.80;
                $proposal->project_start_date = $request_data['project_start_date'];
                $proposal->project_end_date = $request_data['project_end_date'];
                $proposal->bid_type = 'Project';

            } else {
                $proposal->amount_receive = $request_data['hourly_bid_rate'] * 0.80;

            }
            $proposal->save();

           
           
            if ($request->hasFile('file')) {

                foreach ($request->file as $file) {
                    $path = imagePath()['attachments']['path'];
                    try {
                        $filename = uploadAttachments($file, $path);

                        $file_extension = getFileExtension($file);
                        $url = $path . '/' . $filename;
                        $proposal_attachment = new ProposalAttachment;
                        $proposal_attachment->name = $filename;
                        $proposal_attachment->uploaded_name = $file->getClientOriginalName();
                        $proposal_attachment->url = $url;
                        $proposal_attachment->type = $file_extension;
                        $proposal_attachment->is_published = "Active";
                        $proposal_attachment->proposal_id = $proposal->id;
                        $proposal_attachment->save();

                    } catch (\Exception $exp) {
                        $notify[] = ['error', 'Document could not be uploaded.'];
                        return back()->withNotify($notify);
                    }

                }
            }

            DB::commit();

            return response()->json(["redirect" => route('seller.jobs.listing'), "message" => "Proposal submitted"]);

        } catch (\Exception $exp) {
            DB::rollback();
            return response()->json(["error" => $exp->getMessage()]);
        }
    }

    
    function validatePropsal(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);
        $rules = [];
        $custom_messages =[

            'start_hour_limit.required_with' => 'Enter min hours field value or make empty max hours field',
            'end_hour_limit.required_with' => 'Enter max hours field value or make empty min hours field',
            'start_hour_limit.min' => 'Min hours field value must be greater than 0',
            'end_hour_limit.gt' => 'Max hours field value must be greater than min hours field',

        ];

        // hourly budget type
        if ($request_data['job_type'] == BudgetType::$hourly) {

            $rules = [
                'delivery_mode_id' => 'required|exists:delivery_modes,id',
                'hourly_bid_rate' => 'required|numeric|min:1',
                'amount_receive' => 'required',
                'start_hour_limit' => 'required_with:end_hour_limit|numeric|min:1',
                'end_hour_limit' => 'required_with:start_hour_limit|numeric|gt:start_hour_limit',
                'cover_letter' => 'required|string|min:20'
            ];


        } // fixed budget
        elseif ($request_data['job_type'] == BudgetType::$fixed) {

            if ($request_data['bid_type'] == 'milestone') {
                $rules = [
                    'delivery_mode_id' => 'required|exists:delivery_modes,id',
                    'milestones.*.description' => 'string|required',
                    'milestones.*.start_date' => 'date|required|after_or_equal:now',
                    'milestones.*.end_date' => 'date|required|after_or_equal:milestones.*.start_date',
                    'milestones.*.amount' => 'string|required',
                    'total_project_price' => 'required',
                    'amount_receive' => 'required',
                    'cover_letter' => 'required|string|min:20'
                ];
            } elseif ($request_data['bid_type'] == 'by_project') {
                $rules = [

                    'delivery_mode_id' => 'required|exists:delivery_modes,id',
                    'project_end_date' => 'required|date|after_or_equal:project_start_date',
                    'project_start_date' => 'required|date|after_or_equal:now',
                    'total_project_price' => 'required',
                    'amount_receive' => 'required',
                    'cover_letter' => 'required|string|min:20'

                ];
            }
        }
        $validator = Validator::make($request_data, $rules,$custom_messages);
        if ($validator->fails()) {

            return response()->json(["error" => $validator->errors()]);

        } else
            return response()->json(["validated" => "Propsal Data Is Valid"]);
    }
}
