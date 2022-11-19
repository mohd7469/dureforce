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
        $offers = $job::with('moduleOffer')->where('uuid',$job_uuid)->first();
        $short_listed_proposals = $job->proposal->where('is_shortlisted',true);
    
        $pageTitle = "Job Offers";
        return view('templates.basic.jobs.offers.all-offers',compact('pageTitle','offers','job','short_listed_proposals'));
    }
    public function sendOffer(Request $request)
    {
        $request_data = $request->all();
        $rules=[
            'uploaded_files ' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'accept_privacy_policy' => 'required',
        ];

        if ($request_data['fix_payment_offer_type']==ModuleOffer::Fix_Payment_Offer_Type['BY_PROJECT']) {
            $rules ['offer_ammount' ] = 'required|numeric|min:1';
        } else if ($request_data['fix_payment_offer_type'] == ModuleOffer::Fix_Payment_Offer_Type['BY_MILESTONE']) {

            $rules['milestone'] = 'required|array';
            $rules['milestone.*.description'] = 'required';
            $rules['milestone.*.due_date'] = 'required|date|after_or_equal:now';
            $rules['milestone.*.deposit_amount'] = 'required|min:1';
        } 
        $validator = Validator::make($request_data, $rules);
       

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);

        } else {
           
            DB::beginTransaction();
            try {
                $module_offer = new ModuleOffer;
                $module_offer->offer_amount = $request_data['offer_ammount'];
                $module_offer->description_of_work = $request_data['description'];
                $module_offer->contract_title = $request_data['contract_title'];
                $module_offer->payment_type = ModuleOffer::PAYMENT_TYPE['FIXED'];
                $module_offer->proposal_id = $request_data['proposal_id'];


                $job = Job::find($request_data['job_id']);
                $job->moduleOffer()->save($module_offer);

                if ($request_data['fix_payment_offer_type'] == ModuleOffer::Fix_Payment_Offer_Type['BY_MILESTONE']) {

                    $ModuleOfferMilestones = $request_data['milestone'];
                    $offered_amount=0;
                    foreach ($ModuleOfferMilestones as $ModuleOfferMilestone) {
                        $offered_amount+=$ModuleOfferMilestone['deposit_amount'];
                        $ModuleOfferMilestone['is_paid']=false;
                        $ModuleOfferMilestone['module_offer_id']=$module_offer->id;

                        ModuleOfferMilestone::create($ModuleOfferMilestone);
                    }
                    $module_offer->offer_amount = $offered_amount;
                    $module_offer->save();

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

                DB::commit();
                $notify[] = ['success', 'Offer Successfully saved!'];
                return response()->json(["redirect" => route('buyer.offer.success.alert')]);
            } catch (\Throwable $exception) {

                DB::rollback();
                return response()->json(['error' => $exception->getMessage()]);
                $notify[] = ['errors', 'Failled To Send Offer .'];
                return back()->withNotify($notify);


            }
        }
    }
    public function offerSent()
    {
        return view('templates.basic.offer.offer_sent');
    }

    public function offerSuccessfullySubmitted(){
        return "Successfully Submitted !";
    }
}
