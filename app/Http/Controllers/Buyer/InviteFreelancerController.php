<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Mail\Notifications\SendNotificationsMail;
use App\Models\InviteFreelancer;
use App\Models\Job;
use App\Models\Notification;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InviteFreelancerController extends Controller
{
    public function saveInvitation(Request $request,$job_id){
        $rules = [
            'message' => 'required|min:4|max:1000',

        ];

        $messages =[
            'message.required'     => 'Message is required',


        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }
        try {
            DB::beginTransaction();

           $invitation=  InviteFreelancer::create([
                "user_id"=>$request['user_id'],
                "job_id"=>$job_id,
                "message"=>$request['message'],
            ]);
            DB::commit();
            $job = Job::find($job_id);

            $user_email = User::where('id',$request['user_id'])->pluck('email')->first();
            $email_template = EmailTemplate::where('is_active',1)->where('type','invitation')->with('attachments')->first();

            //$email_template->attachments->url;

            $data['invitation'] = $invitation;
            $data['job'] = $job;
            $data['email_template'] = $email_template;
            if(Proposal::where('user_id',$request['user_id'])->where('module_id',$job_id)->exists()){
                return response()->json(["error" => "This user has already submitted proposal for this job."]);

            }
            Mail::to($user_email)->send(new SendNotificationsMail($data,InviteFreelancer::$EMAIL_TEMPLATE));

            $users= array($request['user_id']);
            $title = InviteFreelancer::NOTIFICATION['INVITATION_TITLE'].$job->title;
            $body = $job->description;
            $payload = $job;
            $url = InviteFreelancer::NOTIFICATION['INVITATION_URL'].$invitation->uuid;
            $notification_type = InviteFreelancer::NOTIFICATION['INVITATION_TYPE'];
            $notification_data = NotificationHelper::generateNotificationData($title,$body,$payload,$url,$notification_type);
            NotificationHelper::GENERATENOTIFICATION($notification_data,$users);

            return response()->json(["success" => "Invitation sent Successfully"]);

        } catch (\Exception $exp) {
            DB::rollback();
            errorLogMessage($exp);
            return response()->json(["error" => $exp->getMessage()]);
        }
    }
    public function invitedFreelancer($job_uuid){

        try {
             $job = Job::where('uuid',$job_uuid)->first();
             $invited_freelancers = InviteFreelancer::where('job_id',$job->id)->with('user')->get();

            return view('templates.basic.jobs.invitation.invited-freelancer')->with('invited_freelancers',$invited_freelancers);

        } catch (\Exception $exp) {
            DB::rollback();
            errorLogMessage($exp);
            return response()->json(["error" => $exp->getMessage()]);
        }
    }
    public function userInvitations(){

        try {
             $invitations = InviteFreelancer::IsActive()->where('user_id',auth()->user()->id)->with('job')->orderBy("created_at",'DESC')->paginate(10);
            return view('templates.basic.user.seller.invitation.invite_listing')->with('invitations',$invitations);

        } catch (\Exception $exp) {
            DB::rollback();
            errorLogMessage($exp);
            return response()->json(["error" => $exp->getMessage()]);
        }
    }

    public function  show($uuid){
        $InviteFreelancer=InviteFreelancer::with(['job','job.proposal','user'])->where('uuid',$uuid)->first();
        $proposal = $InviteFreelancer->job->proposal->where('user_id',auth()->user()->id)->first();

        $proposal_submitted = false;
        if (!empty($proposal)){

            $proposal_submitted = true;
        }

        return view('templates.basic.user.seller.invitation.invite_details',compact('InviteFreelancer','proposal_submitted','proposal'));
    }
}
