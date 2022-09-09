<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        try {
            DB::beginTransaction();

            $job = Proposal::create([
                "user_id" => $user->id,
                "delivery_mode_id" => $request['delivery_mode_id'],
                "service_fees_id" => $request['service_fees_id'],
                "module_id" => $job_id,
                "hourly_bid_rate" => isset($request_data['project_stage_id']) ? $request_data['project_stage_id'] : null,
                "budget_type_id" => isset($request_data['budget_type_id']) ? $request_data['budget_type_id'] : null,
                "title" => $request_data['title'],
                "description" => $request_data['description'],
                "fixed_amount" => isset($request_data['fixed_amount']) ? $request_data['fixed_amount'] : null,
                "hourly_start_range" => isset($request_data['hourly_start_range']) ? $request_data['hourly_start_range'] : null,
                "hourly_end_range" => isset($request_data['hourly_end_range']) ? $request_data['hourly_end_range'] : null,
                "project_length_id" => $request_data['project_length_id'],
                "expected_start_date" => $request_data['expected_start_date'],
                'status_id' => 1
            ]);


            $deliverables = Deliverable::whereIn('id', $request_data['deliverables'])->get();
            $job->deliverable()->sync($deliverables);

            $dods = DOD::whereIn('id', $request_data['dod'])->get();
            $job->dod()->sync($dods);

            $skills = Skills::whereIn('id', $request_data['skills'])->get();
            $job->skill()->saveMany($skills);

            $path = imagePath()['attachments']['path'];

            if ($request->hasFile('file')) {

                foreach ($request->file as $file) {

                    $this->fileValidate($file);
                    try {
                        $filename = uploadAttachments($file, $path);

                        $file_extension = getFileExtension($file);
                        $url = $path . '/' . $filename;
                        $document = new TaskDocument;
                        $document->name = $filename;
                        $document->uploaded_name = $file->getClientOriginalName();
                        $document->url = $url;
                        $document->type = $file_extension;
                        $document->is_published = "Active";
                        $job->documents()->save($document);

                    } catch (\Exception $exp) {
                        $notify[] = ['error', 'Image could not be uploaded.'];
                        return back()->withNotify($notify);
                    }

                }
            }

            DB::commit();
            return response()->json(["redirect" => 'index', "message" => "Successfully Saved"]);

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
}
