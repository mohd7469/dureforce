<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\ModuleOffer;
class OfferController extends Controller
{
    public function jobOffers($job_uuid)
    {
       

        $job=Job::withAll()->where('uuid',$job_uuid)->first();
        
        $offers = $job::with('moduleOffer')->first();
      
        $short_listed_proposals = $job->proposal->where('is_shortlisted',true);
        
        
        $pageTitle = "Job Offers";
        return view('templates.basic.jobs.offers.all-offers',compact('pageTitle','offers','job','short_listed_proposals'));
    }
}
