<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Mail\Notifications\SendNotificationsMail;
use App\Models\InviteFreelancer;
use App\Models\Job;
use App\Models\User;
use App\Models\EmailTemplate;
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

            Mail::to($user_email)->send(new SendNotificationsMail($data,InviteFreelancer::$EMAIL_TEMPLATE));

            return response()->json(["success" => "Successfully Saved"]);

        } catch (\Exception $exp) {
            DB::rollback();
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
            return response()->json(["error" => $exp->getMessage()]);
        }
    }
}
