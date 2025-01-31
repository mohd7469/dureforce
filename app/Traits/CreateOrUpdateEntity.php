<?php 

namespace App\Traits;

use App\Models\AdminNotification;
use App\Models\Attribute;
use App\Models\BannerLogo;
use App\Models\DeliveryMode;
use App\Models\ExtraService;
use App\Models\ExtraSoftware;
use App\Models\Module;
use App\Models\ModuleBanner;
use App\Models\OptionalImage;
use App\Models\Service;
use App\Models\ServiceAttribute;
use App\Models\ServiceFee;
use App\Models\ServiceProjectStep;
use App\Models\ServiceStep;
use App\Models\Software\Software;
use App\Models\Software\SoftwareDefaultStep;
use App\Models\Software\SoftwareStep;
use App\Models\SoftwareAttribute;
use App\Models\SoftwareProvidingStep;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

trait CreateOrUpdateEntity {

    public function saveOverviewbackup($request, $model, $modelId, $type = Attribute::SERVICE) : bool
    {
         DB::transaction(function () use ($request, $model, $modelId, $type) {
            $model->status_id = Service::STATUSES['PENDING'];
            $model->fill($request->except(['_token']))->save();

            $attributes = collect($request->get('attrs'))->map(function ($attrId) use ($model, $type) {
                if($type == Attribute::SERVICE) {
                    return new ServiceAttribute([
                        'service_id' => $model->id,
                        'attribute_id' => $attrId
                    ]);
                } else {
                    return new SoftwareAttribute([
                        'software_id' => $model->id,
                        'attribute_id' => $attrId
                    ]);
                }
            })->all();

            $detail = Attribute::SERVICE ? $this->getDetails($model->serviceDetail) : $this->getDetails($model->softwareDetail);

            if(! empty($modelId)) {
                if($type == Attribute::SERVICE) {
                    $model->featuresService()->detach();
                    $model->serviceDetail()->delete();
                    $model->serviceAttributes()->delete();
                } else {
                    $model->featuresSoftware()->detach();
                    $model->softwareDetail()->delete();
                    $model->softwareAttributes()->delete();
                }
            }

            if($type == Attribute::SERVICE) {
                $model->featuresService()->attach($request->features);
                $model->serviceAttributes()->saveMany($attributes);
    
                $model->serviceDetail()->create([
                    'entity_fields' => decodeOrEncodeFields($request->entity_field, false),
                    'client_requirements' => $detail['requirements'],
                    'max_no_projects'     => $detail['max_no_projects'],
                    'copyright_notice'    => $detail['copyright_notice'],
                    'privacy_notice'      => $detail['privacy_notice']
                ]);
            } else {
                $model->featuresSoftware()->attach($request->features);
                $model->softwareAttributes()->saveMany($attributes);
    
                $model->softwareDetail()->create([
                    'entity_fields' => decodeOrEncodeFields($request->entity_field, false),
                    'client_requirements' => $detail['requirements'],
                    'max_no_projects'     => $detail['max_no_projects'],
                    'copyright_notice'    => $detail['copyright_notice'],
                    'privacy_notice'      => $detail['privacy_notice']
                ]);
            }

        });

        return true;
    }
    public function saveOverview($request, $model, $modelId, $type = Attribute::SERVICE) : bool
    {

         DB::transaction(function () use ($request, $model, $modelId, $type) {

            $model->fill($request->all())->save();
            
            if(! empty($modelId)) {
                
                $model->features()->detach();
                if($type == Attribute::SERVICE){
                    $model->skills()->detach();}
                $model->tags()->detach();
            }
            
            $pattern = '/#\w+/';
            $matches = [];
            $selected_tags=$request->tag;
            preg_match_all($pattern, $request->description, $matches);
            
           



            if (!empty($matches)) {
                $matches = array_merge(...$matches);
                $modifiedMatches = [];

                foreach ($matches as $match) {
                    $modifiedMatch = str_replace('#', '', $match);
                    $modifiedMatches[] = $modifiedMatch;
                }

                $all_tags = array_merge($modifiedMatches, $selected_tags ?? []);
            } else {
                $all_tags = $selected_tags ?? [];
            }

            $tags=collect($all_tags)->map(function ($tag)  {
                $tag=Tag::updateOrCreate(['name' => $tag],['slug' => $tag,'is_active' => true]);
                return $tag->id;
            });

            $model->tags()->attach($tags);
            
            if($type == Attribute::SERVICE){

                $model->skills()->attach($request->skills);
               
            }

            $model->features()->sync($request->features);
            

        });
        
        $sub_category_deliverables=json_decode($request->sub_category_deliverable_ids,true);
        $model->deliverable()->sync($sub_category_deliverables);

        if($type == Attribute::SOFTWARE){
            $this->updateStatus($request,$model);
        }
        else{
            if($model->status_id == $model::STATUSES['APPROVED']){

                $model->status_id = $model::STATUSES['PENDING'];
                $model->save();
            }
        }

        return true;
    }

    public function isManualTitle($tile){
        $module=SoftwareDefaultStep::where('title',$tile)->first();
        if($module)
        {
            return false;
        }
        return true;
    }
    public function savePricing($request, $model, $type = Attribute::SERVICE) : bool
    {
        DB::transaction(function () use ($request, $model, $type) {
            
            if($type == Attribute::SERVICE){
                $model->update([
                    'rate_per_hour'         => $request->price,
                    'estimated_delivery_time' => $request->delivery_time
                ]);
            }
            else{
                $model->update([
                    'price'         => $request->price,
                    'estimated_lead_time' => $request->delivery_time
                ]);
            }
           

            $model->deliverable()->sync($request->deliverables);
           
            if($type == Attribute::SERVICE) {
              $model->serviceSteps()->delete();
              $model->addOns()->delete();
              if(!empty($request->service_add_ons)) {
                    foreach ($request->service_add_ons as $key => $value) {
                       if(isset($value['title']) || isset($value['rate_per_hour'])|| isset($value['estimated_delivery_time'])){
                            $model->addOns()->create($value);
                        }
                    }
                }

            } else {
              $model->softwareSteps()->delete();
              $model->modules()->delete();
             
                $modules=[];
                foreach ($request->get('module_title') as $key => $value) 
                {
                    if(isset($value) || isset($request->get('module_description')[$key]) || isset($request->get('module_price')[$key]) || isset($request->get('module_delivery')[$key]) ){
                        $modules[] = new SoftwareStep([
                            'name' => $value,
                            'is_manual_title' => $this->isManualTitle($value),
                            'description' => $request->get('module_description')[$key],
                            'start_price' => $request->get('module_price')[$key],
                            'estimated_lead_time' => $request->get('module_delivery')[$key],
                        ]);
                    }
                    
                }
                if(count($modules) > 0){
                    $model->modules()->saveMany($modules);
                }
                

            }

            if (!empty($request->steps)) {
                $steps = [];
                foreach ($request->get('steps') as $key => $value) {

                    if(isset($value) || isset($request->get('description')[$key])){

                        if($type == Attribute::SERVICE) {
                        
                            $steps[] = new ServiceProjectStep([
                                'name' => $value,
                                'description' => $request->get('description')[$key]
                            ]);
                        } else {
                            $steps[] = new SoftwareProvidingStep([
                                'name' => $value,
                                'description' => $request->get('description')[$key]
                            ]);
                        }
                    }
                    
                }
                if($type == Attribute::SERVICE) {
                    $model->serviceSteps()->delete();
                    if(count($steps) > 0 ){
                        $model->serviceSteps()->saveMany($steps);

                    }
                } else {
                    $model->softwareSteps()->delete();
                    if(count($steps) > 0 ){
                        $model->softwareSteps()->saveMany($steps);

                    }

                    
                }
            }

        });
        $this->updateStatus($request,$model);

        return true;
    }

    public function uploadBanner($model,$file,$banner_type){
        try {
            $banner=null;
            $path = imagePath()['attachments']['path'];
    
            // $model->banner()->delete();
            $filename = uploadAttachments($file, $path);
            $file_extension = getFileExtension($file);
            $url = $path . '/' . $filename;
            $uploaded_name = $file->getClientOriginalName();
            $banner=$model->banner()->create([
                'banner_type' => $banner_type,
                'name' => $filename,
                'uploaded_name' => $uploaded_name,
                'url'           => $url,
                'type' =>$file_extension,
                'default_lead_image_id' => null    
            ]);
            return $banner;
        } catch (\Throwable $th) {
            Log::error(["Error In Uploading Banner: ". $th->getMessage()]);
            throw $th;
        }
        
        
    }
    public function deleteBannerLogos($model){
        $model->load('banner');
        if($model->banner){
            BannerLogo::where('module_banner_id',$model->banner->id)->delete();

        }

    }
    public function saveBanner($request, $model, $type = Attribute::SERVICE, $imageStorePath = 'service', $optionalImageStorePath="") : bool 
    {   
        if(($request->type)) {
            DB::beginTransaction();

            try {
                $this->deleteBannerLogos($model);
                if($request->type == ModuleBanner::$Static){
                    if($request->hasFile('image')){
                        $model->banner()->delete();
                        $banner=$this->uploadBanner($model,$request->image,$request->type);
                        $banner->save();

                    }
                }
                elseif($request->type == ModuleBanner::$Dynamic)
                {
                    
                    if($request->has('dynamic_banner_image') || $request->has('default_lead_image_id')){
                        
                        if($model->banner){
                            
                            $model->banner()->delete();
                            $model->save();
                        }

                        if($request->has('dynamic_banner_image')){
                            $banner=$this->uploadBanner($model,$request->dynamic_banner_image,$request->type);
                        }
                        else{
                            $banner=$model->banner()->create(
                            [
                                'default_lead_image_id' => $request->default_lead_image_id,
                                'banner_type' => $request->type,
                            ]);
                        }
                        $banner->lead_image_type=$request->lead_image_type;
                        $banner->banner_background_id   = $request->banner_background_id;
                        $banner->banner_heading  =  $request->banner_heading;
                        $banner->banner_introduction = $request->banner_introduction;
                        $banner->save();

                    }
                    elseif($model->banner){
                        $model->banner()->update([
                            'banner_background_id' => $request->banner_background_id,
                            'banner_heading'  => $request->banner_heading,
                            'banner_introduction' => $request->banner_introduction
                        ]);
                        
                    }
                    else{

                    }
                    $model->save();
                    $model->load('banner');
                    if($request->has('technology_logos')){
                        if($model->technologyLogos)
                            $model->technologyLogos()->delete();
                        addTechnologyLogos($model,$request->technology_logos);
                    }
                   
                }
                else
                {
                    
                    $model->banner()->delete();
                    $model->banner()->create([
                        'banner_type' => $request->type ,
                        'video_url'   => $request->video_url,
                        'lead_image_type' => null
                    ]);

                }
                
                $this->updateStatus($request,$model);
                DB::commit();

                $service_fee_percentage=getSystemServiceFee();
                $user_percentage=(100-$service_fee_percentage)/100;
                $service_fee_percentage=$service_fee_percentage/100;

                if (!$model->defaultProposal) {

                    $deliver_mode=DeliveryMode::where('slug','Weekly-slug')->exists() ? DeliveryMode::where('slug','Weekly-slug')->first()->id : null;

                    if($type == Attribute::SERVICE) {

                        $proposal=[
                            "hourly_bid_rate" => $model->rate_per_hour,
                            "amount_receive" => ($model->rate_per_hour * $user_percentage),
                            "start_hour_limit" => config('settings.service_weekly_hours_start_limit'),
                            "end_hour_limit" => config('settings.service_weekly_hours_end_limit'),
                            "delivery_mode_id" => $deliver_mode,
                            "cover_letter" => $model->description,
                            "uploaded_files" => json_encode([],true),
                        ];
        
                    }
                    else if($type == Attribute::SOFTWARE) {
                        
                        
                        $proposal=  [  "project_start_date" => null,
                                        "project_end_date" =>   null,
                                        "milestones" => [
                                            [
                                                "description" => null,
                                                "start_date" => null,
                                                "end_date" => null,
                                                "amount" => null,
                                            ]
                                        ],
                                        "fixed_bid_amount" => $model->fixed_bid_amount,
                                        "amount_receive" => ($model->rate_per_hour * $user_percentage),
                                        "delivery_mode_id" => $deliver_mode,
                                        "cover_letter" => $model->description,
                                        "action" => "continue",
                                        "uploaded_files" => "[]"
                                    ];
        
                    }
                    else{

                    }

                    $this->saveProposal($proposal,$model,$type);

                }

            } catch (\Exception $exp) {
                DB::rollBack();
                Log::error([$exp->getMessage()]);
                return false;
            }
        }

        return true;
    }
    public function saveProposal($request, $model, $type = Attribute::SERVICE): bool
    {
        DB::beginTransaction();
        try {
            if( $model->defaultProposal)
            {
                $model->defaultProposal()->delete();
            }
            
            $model_default_proposal=$model->defaultProposal()->create($request);
            $model_default_proposal->user_id=auth()->user()->id;
            $model_default_proposal->service_fees_id= ServiceFee::find(Module::$Job)->id;
            $model_default_proposal->save();
            if (isset($request['uploaded_files']) ) {
        

                $prposal_attachments=json_decode($request['uploaded_files'],true);

                if(count($prposal_attachments)>0)
                    $model_default_proposal->attachments()->createMany($prposal_attachments);
            }

            DB::commit();

            $this->updateStatus($request,$model);

            return true;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::error(["Error In Saving Proposal: ". $th->getMessage()]);
            return false;
            //throw $th;
        }
       
    }
    public function saveRequirements($request, $model, $type = Attribute::SERVICE): bool
    {
        DB::transaction(function () use ($request, $model, $type) {
           
            $model->update([
                'requirement_for_client' => $request->client_requirements,
                'is_requirement_for_client_added' => true
            ]);
           
        });
        $this->updateStatus($request,$model);

        return true;

    }
    
    public function updateStatus($request, $model){
        if($request->action == 'save_project'){
            $model->status_id=$model::STATUSES['DRAFT'];
        }
        else{
            if($model->is_terms_accepted)
                $model->status_id  = $model::STATUSES['PENDING'];

        }
        $model->save();

    }
    public function saveReview($request, $model, $type = Attribute::SERVICE, $notificationText = 'Service', $notificationUrl = 'service'): bool
    {
        DB::transaction(function () use ($request, $model, $notificationText, $notificationUrl, $type) {

            $model->update([
                'number_of_simultaneous_projects' => $request->max_no_projects,
                'is_terms_accepted' => $request->copyright_notice == "on" ? true : false,
                'is_privacy_accepted' => $request->privacy_notice == "on" ? true : false,
                'is_requirement_for_client_added' => true

            ]);
            $this->updateStatus($request,$model);
  
         
            $adminNotification = new AdminNotification();
            $adminNotification->user_id = auth()->id();
            $adminNotification->title = "{$notificationText} Create {$model->title}";
            $adminNotification->click_url = urlPath("admin.{$notificationUrl}.details", $model->id);
            $adminNotification->save();
            
        });

        return true;
    }

    private function optionalImageStore($request, $optionalImage, $serviceId, $path = 'optionalService')
    {
        foreach ($optionalImage as $index => $optional) {
            $optionals = new OptionalImage();
            $optionals->service_id = $serviceId;
            $path = imagePath()[$path]['path'];
            $size = imagePath()[$path]['size'];
            if ($request->hasFile('optional_image')) {
                $file = $optional;
                try {
                    $filename = uploadImage($file, $path, $size);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Image could not be uploaded.'];
                    return back()->withNotify($notify);
                }
                $optionals->image = $filename;
                $optionals->caption = $request->get("optional_image_text")[$index];
            }
            $optionals->save();
        }
    }
    

    private function getDetails($model) : array
    {
        return [
            'requirements'      => $model->client_requirements ?? '',
            'max_no_projects'   => $model->max_no_projects ?? '',
            'copyright_notice'  => $model->copyright_notice ?? '',
            'privacy_notice'    => $model->privacy_notice ?? ''
        ];
    }
}