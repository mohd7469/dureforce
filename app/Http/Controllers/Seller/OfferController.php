<?php

namespace App\Http\Controllers\Seller;

use App\Events\NewMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ModuleOffer;
use BeyondCode\QueryDetector\Outputs\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;

class OfferController extends Controller
{
    public function acceptOffer($uuid){
        try{
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
            $notify[] = ['success', 'Offer has been accepted'];
            return back()->withNotify($notify);
        }
        catch (\Throwable $exp) {
            FacadesLog::error($exp->getMessage());
            $notify[] = ['error', 'Failled to Accept Offer'];
            return back()->withNotify($notify);
        }
    }

    public function rejectOffer($uuid){
        try{
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
            $notify[] = ['success', 'Offer has been rejected'];
            return back()->withNotify($notify);

        }
        catch (\Throwable $exp) {
            FacadesLog::error($exp->getMessage());
            $notify[] = ['error', 'Failled to Reject Offer'];
            return back()->withNotify($notify);
        }
    }

}
