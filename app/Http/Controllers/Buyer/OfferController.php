<?php

namespace App\Http\Controllers\Buyer;

use App\Events\MessageEditedEvent;
use App\Events\NewMessageEvent;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Mail\Notifications\SendNotificationsMail;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\ModuleOffer;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Models\ModuleOfferMilestone;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OfferController extends Controller
{

    public function jobOffers($job_uuid)
    {
       
        $job=Job::with('moduleOffer.attachments')->with('proposal')->where('uuid',$job_uuid)->first();
        $offers = $job->moduleOffer;
        $pending_offers=$offers->whereIn('status_id','!=',ModuleOffer::STATUSES['ACCEPTED']);
        $accepted_offers=$offers->where('status_id',ModuleOffer::STATUSES['ACCEPTED']);
        

        $short_listed_proposals = $job->proposal->where('is_shortlisted',true);
    
        $pageTitle = "Job Offers";
        return view('templates.basic.jobs.offers.all-offers',compact('pageTitle','accepted_offers','offers','pending_offers','job','short_listed_proposals'));
    }
    
    public function sendOffer(Request $request)
    {
        $request_data = $request->all();
        $rules=[
            'uploaded_files ' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'accept_privacy_policy' => 'required',
            'offer_expire_at'       => 'nullable|after_or_equal:' . Carbon::now()->format('d-m-Y'),
        ];
        $custom_messages = [

            'description.required' => 'description of work field is required',
        ];
        if ($request_data['payment_type']==ModuleOffer::PAYMENT_TYPE['HOURLY']) {
            
            $rules ['rate_per_hour' ] = 'required|numeric|min:1';
            $rules ['weekly_limit' ] = 'required|numeric|min:1';
            $rules ['contract_title' ] = 'required';
            $rules ['start_date' ] = 'nullable|after_or_equal:' . Carbon::now()->format('d-m-Y');

        } else {
            if ($request_data['fix_payment_offer_type']==ModuleOffer::Fix_Payment_Offer_Type['BY_PROJECT']) {
                $rules ['offer_ammount' ] = 'required|numeric|min:1';
            } else if ($request_data['fix_payment_offer_type'] == ModuleOffer::Fix_Payment_Offer_Type['BY_MILESTONE']) {
    
                $rules['milestone'] = 'required|array';
                $rules['milestone.*.description'] = 'required';
                $rules['milestone.*.due_date'] = 'required|date|after_or_equal:now';
                $rules['milestone.*.deposit_amount'] = 'required|min:1';
            } 
        }
        
        
        $validator = Validator::make($request_data, $rules,$custom_messages);
       

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);

        } else {
           
            DB::beginTransaction();
            try {

                $offer_expire_at=$request_data['offer_expire_at'];

                $proposal=Proposal::with('user')->with('module')->find($request_data['proposal_id']);
                $module_offer = new ModuleOffer;
                $module_offer->description_of_work = $request_data['description'];
                $module_offer->contract_title = isset($request_data['contract_title']) ? $request_data['contract_title'] : $proposal->module->title;
                $module_offer->payment_type = $request_data['payment_type'];
                $module_offer->proposal_id = $request_data['proposal_id'];
                $module_offer->offer_send_to_id=$proposal->user->id;
               
                $job = Job::find($request_data['job_id']);
                $job->moduleOffer()->save($module_offer);
                if ($request_data['payment_type']==ModuleOffer::PAYMENT_TYPE['HOURLY']) {
                    
                    $module_offer->rate_per_hour = $request_data['rate_per_hour'];
                    $module_offer->weekly_limit  = $request_data['weekly_limit'];
                    $module_offer->start_date    = $request_data['start_date'] ? $request_data['start_date'] : Carbon::now();

                }
                else{
                    $module_offer->offer_amount = $request_data['offer_ammount'];
                    if ($request_data['fix_payment_offer_type'] == ModuleOffer::Fix_Payment_Offer_Type['BY_MILESTONE']) {

                        $ModuleOfferMilestones = $request_data['milestone'];
                        $offered_amount=0;
                        foreach ($ModuleOfferMilestones as $ModuleOfferMilestone) {
                            $offered_amount+=$ModuleOfferMilestone['deposit_amount'];
                            $ModuleOfferMilestone['is_paid']=false;
                            $ModuleOfferMilestone['module_offer_id']=$module_offer->id;
                            $offer_expire_at=$ModuleOfferMilestone['due_date'];
                            ModuleOfferMilestone::create(
                                [
                                    'description' =>$ModuleOfferMilestone['description'],
                                    'module_offer_id' => $ModuleOfferMilestone['module_offer_id'],
                                    'due_date' => $ModuleOfferMilestone['due_date'],
                                    'amount'   => $ModuleOfferMilestone['deposit_amount'],
                                    'is_paid'  =>$ModuleOfferMilestone['is_paid']
    
                                ]
                            );
                        }
                        $module_offer->offer_amount = $offered_amount;
                        $module_offer->save();
    
                    }
                
                }
                
                if(isset($request_data['uploaded_files'])){
                    foreach ($request_data['uploaded_files'] as $file) 
                    {

                        $path = imagePath()['attachments']['path'];
                        $filename = uploadAttachments($file, $path);

                        $file_extension = getFileExtension($file);
                        $url = $path . '/' . $filename;
                        $uploaded_name = $file->getClientOriginalName();
                        $module_offer->attachments()->create([
    
                            'name' => $filename,
                            'uploaded_name' => $uploaded_name,
                            'url'           => $url,
                            'type' =>$file_extension,
                            'is_published' =>1
    
                        ]);
    
                     }
                }
                if($offer_expire_at)
                {
                    $module_offer->expire_at=$offer_expire_at;
                }
                else{
                    $module_offer->expire_at=Carbon::now()->addDays(config('settings.offer_expire_days'));
                }
                $module_offer->save();
                

                DB::commit();
                $notify[] = ['success', 'Offer Successfully saved!'];
                // return response()->json(["redirect" => route('buyer.offer.sent',$module_offer->id)]);
                return response()->json(["redirect" => route('buyer.payment_method_list',$module_offer->id)]);
            } catch (\Throwable $exception) {

                DB::rollback();
                Log::info("Error",[$exception->getMessage()]);
                return response()->json(['error' => $exception->getMessage()]);
                


            }
        }
    }
    
    public function offerSent($offer_id)
    {
        if(!empty($offer_id)){
            $paymentVerified = ModuleOffer::findOrFail($offer_id);
            $paymentVerified->is_payment_method_selected = 1;
            $paymentVerified->is_active = 1;
            $paymentVerified->save();
        }
        try {
            DB::beginTransaction();
            $offer=ModuleOffer::with('module.user','module.user.user_basic','module')->find($offer_id);
            $user_email = User::where('id',$offer->offer_send_to_id )->first();
            $email_template = EmailTemplate::where('is_active',1)->where('type','offer')->with('attachments')->first();     
            $data['offer'] = $offer;
            $data['email_template'] = $email_template;
            $data['offer_send_to'] = $user_email;

            Mail::to($user_email->email)->send(new SendNotificationsMail($data,ModuleOffer::$EMAIL_TEMPLATE));
            
            $job=$offer->module;
            $chat_module=$job;
            $view_offer_route=route('offer.detail',$job->uuid);
            $chat_message=ChatMessage::Create([
                'send_to_id'    => $offer->offer_send_to_id,
                'module_id'     => $chat_module->id,
                'module_type'   => 'App\Models\Job',
                'is_attachment' => false,
                'sender_id'     => Auth::user()->id,
                'role'          => "client",
                'message'       => "<b>I am sending you the  offer for </b><br>".$job->description,
                'offer_id'     =>  $offer->id,
                'is_view_offer_message' =>true
            ]);

            $chat_module->chatUsers()->updateOrCreate(
                [
                    'sender_id'=> Auth::user()->id,
                    'send_to_id' =>$offer->offer_send_to_id,
                    'proposal_uuid' => $offer->proposal->uuid
                ],
                []
            );

            event(new NewMessageEvent($chat_message, $chat_message->user,$chat_module));

            $users= array($offer->offer_send_to_id);
            $title = ModuleOffer::NOTIFICATION['OFFER_TITLE'].$job->title;
            $body = $job->description;
            $payload = $job;
            $url = ModuleOffer::NOTIFICATION['OFFER_URL'].$offer->uuid;
            $notification_type = ModuleOffer::NOTIFICATION['OFFER_TYPE'];
            $notification_data = NotificationHelper::generateNotificationData($title,$body,$payload,$url,$notification_type);
            NotificationHelper::GENERATENOTIFICATION($notification_data,$users);


            $notify[] = ['success', 'Offer sent Successfully'];
            return view('templates.basic.offer.offer_sent',compact('offer'));
        } 
        catch (\Throwable $exp) {
            DB::rollBack();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'Failled to Send Offer'];
            return back()->withNotify($notify);
        }
       
    }

    public function offerSuccessfullySubmitted(){
        return "Successfully Submitted !";
    }
    
    public function offerDetail($id)
    {
        try {
            $last_role_id=getLastLoginRoleId();
            $offer=ModuleOffer::withAll()->where('uuid',$id)->first();
            $pageTitle = "Offer Detail";
            return view('templates.basic.offer.offer_description',compact('offer','last_role_id'));
            
        } catch (\Throwable $th) {
           return redirect()->back()->withErrors(['Error' => "Failled To Fetch Offer"]);
        }
       

    }

    public function withdrawOffer($uuid){
        try {
            DB::beginTransaction();
            $module_offer=ModuleOffer::with('module')->where('uuid',$uuid)->first();

            if($module_offer->status_id!=ModuleOffer::STATUSES['PENDING']){
                $notify[] = ['error', 'Offer cannot be withdrawn'];
                return back()->withNotify($notify);

            }
            ModuleOffer::where('uuid',$uuid)->update([
                'status_id'  => ModuleOffer::STATUSES['WITHDRAW']
            ]);
            $chat_module=$module_offer->module;
            $chat_message=ChatMessage::Create([
                
                'send_to_id'    => $module_offer->offer_send_to_id,
                'module_id'     => $chat_module->id,
                'module_type'   => 'App\Models\Job',
                'is_attachment' => false,
                'sender_id'     => Auth::user()->id,
                'role'          => "client",
                'message'       => "Offer has been withdraw",
                'offer_id'     =>  $module_offer->id,
                'is_view_offer_message' =>true
            ]);
    
            event(new NewMessageEvent($chat_message, $chat_message->user,$chat_module));
            DB::commit();

            $notify[] = ['success', 'Offer has been withdrawn'];
            return back()->withNotify($notify);
        } catch (\Throwable $exp) {
            DB::rollBack();
            Log::error($exp->getMessage());
            $notify[] = ['error', 'Failled to Withdraw Offer'];
            return back()->withNotify($notify);
        }
        
    }
    
}
