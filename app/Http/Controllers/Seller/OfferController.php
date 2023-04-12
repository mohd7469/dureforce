<?php

namespace App\Http\Controllers\Seller;

use App\Events\NewMessageEvent;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Contract;
use App\Models\ModuleOffer;
use BeyondCode\QueryDetector\Outputs\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;

class OfferController extends Controller
{
    
    private function createContract($module_offer){
        try {

            $module_offer->contract()->create([
                'start_date' => Carbon::now(),
                'end_date' => $module_offer->expire_at,
                'status_id'  =>  Contract::STATUSES['In_Progress'],
                'contract_total_amount' => $module_offer->offer_amount,
            ]);
           
        }catch (\Throwable $th) {
            FacadesLog::error($th->getMessage());
           
        }
    }

    public function acceptOffer($uuid){
        try{
            DB::beginTransaction();
            $module_offer=ModuleOffer::with('module')->where('uuid',$uuid)->first();
            if($module_offer->status_id!=ModuleOffer::STATUSES['PENDING']){
                $notify[] = ['error', 'Offer cannot be accepted'];
                return back()->withNotify($notify);

            }
            ModuleOffer::where('uuid',$uuid)->update([
                'status_id'  => ModuleOffer::STATUSES['ACCEPTED']
            ]);
            
            $chat_module=$module_offer->module;
            $chat_message=ChatMessage::Create([
                'send_to_id'    => $module_offer->offer_send_by_id,
                'module_id'     => $chat_module->id,
                'module_type'   => 'App\Models\Job',
                'is_attachment' => false,
                'sender_id'     => Auth::user()->id,
                'role'          => "freelancer",
                'message'       => "I have accepted your offer",
                'offer_id'     =>  $module_offer->id,
                'is_view_offer_message' =>true
            ]);

            event(new NewMessageEvent($chat_message, $chat_message->user,$chat_module));
            $this->createContract($module_offer);
            DB::commit();

            $users= array($module_offer->offer_send_to_id);
            $title = Contract::NOTIFICATION['CONTRACT_TITLE'].$chat_module->title." started";
            $body = $chat_module->description;
            $payload = $chat_module;
            $url = Contract::NOTIFICATION['CONTRACT_URL'].$module_offer->contract->uuid;
            $notification_type = Contract::NOTIFICATION['CONTRACT_TYPE'];
            $notification_data = NotificationHelper::generateNotificationData($title,$body,$payload,$url,$notification_type);
            NotificationHelper::GENERATENOTIFICATION($notification_data,$users);
            $notify[] = ['success', 'Offer has been accepted'];
            return back()->withNotify($notify);
        }
        catch (\Throwable $exp) {
            DB::rollBack();
            FacadesLog::error($exp->getMessage());
            $notify[] = ['error', 'Failed to Accept Offer'];
            return back()->withNotify($notify);
        }
    }

    public function rejectOffer($uuid){
        try{
            
            DB::beginTransaction();
            $module_offer=ModuleOffer::with('module')->where('uuid',$uuid)->first();
            if($module_offer->status_id!=ModuleOffer::STATUSES['PENDING']){
                $notify[] = ['error', "Offer can't be rejected"];
                return back()->withNotify($notify);

            }

            ModuleOffer::where('uuid',$uuid)->update([
                'status_id'  => ModuleOffer::STATUSES['REJECTED']
            ]);
            $chat_module=$module_offer->module;
            $chat_message=ChatMessage::Create([

                'send_to_id'    => $module_offer->offer_send_by_id,
                'module_id'     => $chat_module->id,
                'module_type'   => 'App\Models\Job',
                'is_attachment' => false,
                'sender_id'     => Auth::user()->id,
                'role'          => "freelancer",
                'message'       => "Offer Rejected",
                'offer_id'     =>  $module_offer->id,
                'is_view_offer_message' =>true
            ]);

            event(new NewMessageEvent($chat_message, $chat_message->user,$chat_module));
            DB::commit();
            $notify[] = ['success', 'Offer has been rejected'];
            return back()->withNotify($notify);

        }
        catch (\Throwable $exp) {
            DB::rollBack();
            FacadesLog::error($exp->getMessage());
            $notify[] = ['error', 'Failled to Reject Offer'];
            return back()->withNotify($notify);
        }
    }

}
