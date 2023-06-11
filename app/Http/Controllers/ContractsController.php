<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractFeedback;
use App\Models\LanguageLevel;
use App\Models\NotRecomenededReason;
use App\Models\ReasonEndContract;
use App\Models\Role;
use App\Models\Timezone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FeedbackReason;

class ContractsController extends Controller
{
    public function  index(){
        $user=Auth::user();
        $contracts=Contract::whereHas('offer',function ($query) use ($user){
            $last_role_id=getLastLoginRoleId();
            if ( $last_role_id  == Role::$Freelancer ) {
                $query->where('offer_send_to_id','=',$user->id);
            }
            else if( $last_role_id == Role::$Client ){
                $query->where('offer_send_by_id','=',$user->id);
            }
        })->orderBy('created_at','desc')->paginate(10);
        $contracts_completed=$contracts->where('status_id',Contract::STATUSES['Completed']);
        $contracts_active=$contracts->where('status_id',Contract::STATUSES['In_Progress']);
        $contracts_paused=$contracts->where('status_id',Contract::STATUSES['Terminated']);

        return view('templates.basic.buyer.contract.contract-list',compact('contracts','contracts_completed','contracts_active','contracts_paused'));
    }

    public function  show($uuid){
        $user=Auth::user();
        $contract=Contract::WithAll()->where('uuid',$uuid)->first();
        $feedback=ContractFeedback::with('contract')->where('contract_id',$contract->id)->first();
        if(empty($feedback)){
            $feedbackData='empty';
        }else{
            $feedbackData=$feedback->id;
        }

        $last_role_id = $user->last_role_activity;
        if ($last_role_id == Role::$Freelancer) {
            $reasons=FeedbackReason::where('is_active',1)->where('role_id',Role::$Freelancer)->get();
        } else {
            $reasons=FeedbackReason::where('is_active',1)->where('role_id',Role::$Client)->get();
         }
        
        $contracts=getUserContracts();
        $emptyMessage="Tasks Not Found";
        $timezones = Timezone::select('id','name')->get();
        return view('templates.basic.buyer.contract.contract_details',compact('contract','reasons', 'emptyMessage','contracts','timezones','feedbackData'));
    }

    public function  feedback($uuid){
//        $user=Auth::user();
//        $last_role_id=getLastLoginRoleId();
//
//        $contract=Contract::WithAll()->where('uuid',$uuid)->first();
//        $langLevels=LanguageLevel::where('is_active',1)->get();
//        $reasons=ReasonEndContract::where('is_active',1)->where('role_id',$last_role_id)->get();
//        $recomendReason=NotRecomenededReason::where('is_active',1)->where('role_id',$last_role_id)->get();
//
//        return view('templates.basic.buyer.contract.contract_feedback',compact('contract', 'langLevels','reasons','recomendReason'));
    }

    public function  feedbacknew($uuid){
        $user=Auth::user();
        $last_role_id=getLastLoginRoleId();
        $contract=Contract::WithAll()->where('uuid',$uuid)->first();
        $user_id=$contract->offer->offer_send_by_id;
        
        $userData=User::WithAll()->where('id',$user_id)->first();
        $userName=$userData->first_name." ".$userData->last_name;
        return view('templates.basic.user.contract_feedback',compact('contract', 'userName'));
    }

}
