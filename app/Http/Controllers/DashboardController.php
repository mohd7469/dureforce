<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Job;
use App\Models\Role;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    
    public function home()
    {
        $user = Auth::user();
        $pageTitle = "Dashboard";
        $emptyMessage = "No data found";
        $transactions = Transaction::where('user_id', $user->id)->orderBy('id', 'DESC')->limit(5)->get();
 
        if( getLastLoginRoleId() == Role::$Freelancer )
        {
            $services = Service::where('user_id', $user->id)->with('category')->latest('id')->paginate(getPaginate());
            // $totalService = Service::where('user_id', $user->id)->count();
            // $totalSoftware = Software::where('user_id', $user->id)->count();
            // $totalServiceBooking = Booking::whereHas('service', function ($q) use ($user) {
            //     $q->where('user_id', $user->id);
            // })->where('status', '!=', '0')->whereNotNull('service_id')->count();
            // $totalSoftwareBooking = Booking::whereHas('software', function ($q) use ($user) {
            //     $q->where('user_id', $user->id);
            // })->where('status', '!=', '0')->whereNotNull('software_id')->count();
            // $withdrawAmount = Withdrawal::where('user_id', Auth::id())->where('status', '!=', 0)->sum('amount');
            // return view($this->activeTemplate . 'user.seller.dashboard', compact('pageTitle', 'transactions', 'emptyMessage', 'withdrawAmount', 'totalService', 'totalSoftware', 'totalServiceBooking', 'totalSoftwareBooking'));
            return view('templates.basic.user.seller.seller_dashboard', compact('pageTitle', 'transactions', 'emptyMessage','services'));

            
        }    
        elseif ( getLastLoginRoleId() == Role::$Client ) 
        {
            $totaltransactions = Transaction::where('user_id', $user->id)->count();
            $totalJob = Job::where('user_id', $user->id)->count();
            $serviceBookings = Booking::where('user_id', $user->id)->where('status', '!=', 0)->whereNotNull('service_id')->count();
            $softwarePurchases = Booking::where('user_id', $user->id)->where('status', '!=', 0)->whereNotNull('software_id')->count();
            $hireEmploys = Booking::where('user_id', $user->id)->where('status', '!=', 0)->whereNotNull('job_biding_id')->count();
            return view($this->activeTemplate . 'user.buyer.dashboard', compact('pageTitle', 'emptyMessage', 'transactions', 'totaltransactions', 'totalJob', 'serviceBookings', 'softwarePurchases', 'hireEmploys'));
        }
        else
        {
            return null;
        }
        
    }
}
