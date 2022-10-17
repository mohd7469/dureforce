<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropsalStoreRequest;
use App\Models\BudgetType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Milestone;
use App\Models\Proposal;
use App\Models\ProposalAttachment;
use http\Env\Response;
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show($proposal_uuid)
    {
        try {

            $proposal=Proposal::where('uuid',$proposal_uuid)->withAll()->first();
            $job=$proposal->module;
            $user=$proposal->user;
            $user_skills=$user->skills;
            $propsal_attachments=$proposal->attachment;
            $pageTitle = "View a Proposal";
            return view($this->activeTemplate .'buyer.propsal.proposal',compact('pageTitle','proposal','user','propsal_attachments','user_skills','job'));
            

        } catch (\Throwable $th) {

        }
        
    }
    public function shortlist($proposal_id)
    {

        try {
            $proposal = Proposal::with('job')->find($proposal_id);
            $proposal->is_shortlisted=true;
            $proposal->save();
            return redirect()->route('buyer.job.all.proposals',$proposal->job->uuid);
        } catch (\Throwable $th) {
            return "Some technical error occur";
        }

    }
    public function shortlistedProposals($job_uuid)
    {

        try {
            $job=Job::withAll()->where('uuid',$job_uuid)->first();
            $proposals = $job->proposal->where('is_shortlisted',true);

            $pageTitle = "Job Proposals";
            return view('templates.basic.offers.shortlist',compact('pageTitle','proposals','job'));

        } catch (\Throwable $th) {
            return $th;
//            return "Some technical error occur";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit($proposal_uuid)
    {
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

    public function jobPropsals($job_uuid)
    {

        $job=Job::withAll()->where('uuid',$job_uuid)->first();
        $proposals = $job->proposal->where('is_shortlisted',false);

        $pageTitle = "Job Proposals";
        return view('templates.basic.jobs.Proposal.all-proposal',compact('pageTitle','proposals','job'));
    }
}
