<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractsController extends Controller
{
    public function  index(){
        $user=Auth::user();
        $contracts=Contract::wherehas('offer',function ($query) use ($user){
            $last_role_id=getLastLoginRoleId();
            if ( $last_role_id  == Role::$Freelancer ) {
                $query->where('offer_send_to_id','=',$user->id);
            }
            else if( $last_role_id == Role::$Client ){
                $query->where('offer_send_by_id','=',$user->id);
            }
        })->get();

        $contracts_completed=$contracts->where('status_id',Contract::STATUSES['Completed']);
        $contracts_active=$contracts->where('status_id',Contract::STATUSES['In_Progress']);
        $contracts_paused=$contracts->where('status_id',Contract::STATUSES['Terminated']);

        return view('templates.basic.buyer.contract.contract-list',compact('contracts','contracts_completed','contracts_active','contracts_paused'));
    }

    public function  show($uuid){
        $user=Auth::user();
        $contract=Contract::WithAll()->where('uuid',$uuid)->first();
        return view('templates.basic.buyer.contract.contract_details',compact('contract'));
    }
}
