<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropsalStoreRequest;
use App\Models\BudgetType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Milestone;
use App\Models\Proposal;
use App\Models\ProposalAttachment;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $job_uuid)
    {
        $user = Auth::user();
        $job_id = Job::where('uuid',$job_uuid)->pluck('id')->first();
        $request_data = [];
        parse_str($request->data, $request_data);

        try {
            DB::beginTransaction();

            $proposal = Proposal::create([
                "user_id" => $user->id,
                "delivery_mode_id" => $request_data['delivery_mode_id'],
                "job_id" => $job_id,
                "hourly_bid_rate" => isset($request_data['hourly_bid_rate']) ? $request_data['hourly_bid_rate'] : null,
                "fixed_bid_amount" => isset($request_data['fixed_bid_amount']) ? $request_data['fixed_bid_amount'] : null,
                "bid_type" => $request['bid_type'],
                "amount_receive" => $request['amount_receive'],
                "start_hour_limit" => isset($request_data['start_hour_limit']) ? $request_data['start_hour_limit'] : null,
                "end_hour_limit" => isset($request_data['end_hour_limit']) ? $request_data['end_hour_limit'] : null,
                "cover_letter" => $request_data['cover_letter'],
            ]);

            if ($request->has('bid_type') AND $request['bid_type']=="Milestone"){
                $milestone = new Milestone();
                $milestone->description = $request['description'];
                $milestone->start_date = $request['start_date'];
                $milestone->end_date = $request['end_date'];
                $milestone->amount = $request['amount'];
                $milestone->proposal()->save($proposal);
            }

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
                        $proposal_attachment->proposal()->save($proposal);

                    } catch (\Exception $exp) {
                        $notify[] = ['error', 'Document could not be uploaded.'];
                        return back()->withNotify($notify);
                    }

                }
            }

            DB::commit();

            return response()->json(["redirect" => route('user.job.index'), "message" => "Proposal submitted"]);

        } catch (\Exception $exp) {
            DB::rollback();
            return response()->json(["error" => $exp->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }

    public function validatePropsal(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);
        $rules=[];
       
        if($request_data['job_type'] == BudgetType::$hourly){
            
            $validator = Validator::make($request_data, 
                [
                    'delivery_mode_id' => 'required|exists:delivery_modes,id',
                    'hourly_bid_rate' => 'required|integer|min:1',
                    'amount_receive' => 'integer',
                    'start_hour_limit' => 'integer|min:1',
                    'end_hour_limit' => 'integer|min:1',
                    'cover_letter' => 'string',
                ]
            
            );
        }

        elseif($request_data['job_type'] == BudgetType::$fixed)
        {
            $validator = Validator::make($request_data, 
            [
                    'delivery_mode_id' => 'required|exists:delivery_modes,id',
                    'hourly_bid_rate' => 'required|integer|min:1',
                    'amount_receive' => 'integer',
                    'start_hour_limit' => 'integer|min:1',
                    'end_hour_limit' => 'integer|min:1',
                    'cover_letter' => 'string',
            ]
            
            );
        }
        

        if ($validator->fails()) {

            return response()->json(["error" => $validator->errors()]);

        } else
            return response()->json(["validated" => "Propsal Data Is Valid"]);
    }
}
