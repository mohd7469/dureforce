<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\ModuleOffer;
use App\Models\ModuleOfferMilestone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public function sendOffer(Request $request)
    {
        $request_data = $request->all();
        $job = Job::findOrFail($request->job_id);

        $rules=[
            'uploaded_files ' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'accept_privacy_policy' => 'required',
        ];

        if ($request->offer_send_type=='by_project') {
            $rules ['offer_ammount' ]= 'required|numeric|min:1';
        } else if ($request->offer_send_type == 'by_milestone') {

            $rules['milestone'] = 'required|array';
            $rules['milestone.*.description'] = 'required';
            $rules['milestone.*.due_date'] = 'required|date|after_or_equal:now';
            $rules['milestone.*.desposit_amount'] = 'required';
        } 
        $validator = Validator::make($request_data, $rules);
       

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);

        } else {
            try {
                DB::beginTransaction();
                $module_offer = new ModuleOffer;
                $module_offer->offer_amount = $request->offer_ammount;
                $module_offer->description_of_work = $request->description;
                $module_offer->contract_title = $request->contract_title;
                $module_offer->start_date = $request->start_date;
                $module_offer->rate_per_hour = $request->rate_per_hour;

                $job = Job::find($request->job_id);
                $job->moduleOffer()->save($module_offer);

                if (($request->milestone)) {

                    $ModuleOfferMilestones = $request->milestone;
                    foreach ($ModuleOfferMilestones as $ModuleOfferMilestone) {
                        ModuleOfferMilestone::updateOrCreate([
                            'module_offer_id' => $module_offer->id,
                        ], [
                            'due_date' => $ModuleOfferMilestone['due_date'],
                            'is_paid' => false,
                            'amount' => $ModuleOfferMilestone['desposit_amout'],
                            'description' => $ModuleOfferMilestone['descr'],

                        ]);
                    }
                }


                DB::commit();
                $notify[] = ['success', 'Offer Successfully saved!'];
                // return redirect()->back()->withNotify($notify);
                //return redirect()->route('buyer.job.all.offers')->withNotify($notify);
                return redirect('buyer/all-offer/' . $job->uuid)->withNotify($notify);


            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Profile .'];
                return back()->withNotify($notify);


            }
        }
    }
}
