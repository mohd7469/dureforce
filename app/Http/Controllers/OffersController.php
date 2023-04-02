<?php

namespace App\Http\Controllers;

use App\Models\ModuleOffer;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    public function  index(){
        $user=Auth::user();
        $last_role_id=getLastLoginRoleId();
        if ( $last_role_id  == Role::$Freelancer ) {
            $offers=ModuleOffer::with('module')->where('offer_send_to_id','=',$user->id)->where('is_active',1)->orderBy('id', 'DESC')->paginate(getPaginate());
            $total = count($offers);
        }
        else if( $last_role_id == Role::$Client ){
            $offers=ModuleOffer::with('module')->where('offer_send_by_id','=',$user->id)->where('is_active',1)->orderBy('id', 'DESC')->paginate(getPaginate());
            $total = count($offers);
        }
        return view('templates.basic.offer.offer_listing',compact('offers','last_role_id','total'));
    }
}
