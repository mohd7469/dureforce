<?php 

namespace App\Traits;

use App\Models\AdminNotification;
use App\Models\Attribute;
use App\Models\EntityLogo;
use App\Models\ExtraService;
use App\Models\ExtraSoftware;
use App\Models\ModuleBanner;
use App\Models\OptionalImage;
use App\Models\Service;
use App\Models\ServiceAttribute;
use App\Models\ServiceProjectStep;
use App\Models\ServiceStep;
use App\Models\Software;
use App\Models\SoftwareAttribute;
use App\Models\SoftwareStep;
use App\Models\Tag;
use DB;
use Illuminate\Database\Eloquent\Model;
use Razorpay\Api\Entity;

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
            // dd($request->all());

            $model->fill($request->all())->save();
            
            if(! empty($modelId)) {
                
                $model->features()->detach();
                $model->skills()->detach();
                $model->tags()->detach();
            }
            
            if($type == Attribute::SERVICE) {
                
                $tags=collect($request->tag)->map(function ($tag)  {
                    $tag=Tag::updateOrCreate(['name' => $tag],['slug' => $tag]);
                    return $tag->id;
                });

                $model->tags()->attach($tags);
                $model->skills()->attach($request->skills);
                $model->features()->attach($request->features);

                // $model->serviceDetail()->create([
                //     'entity_fields' => decodeOrEncodeFields($request->entity_field, false),
                //     'client_requirements' => $detail['requirements'],
                //     'max_no_projects'     => $detail['max_no_projects'],
                //     'copyright_notice'    => $detail['copyright_notice'],
                //     'privacy_notice'      => $detail['privacy_notice']
                // ]);
            } else {
                
            }


        });

        return true;
    }


    public function savePricingBackup($request, $model, $type = Attribute::SERVICE) : bool
    {

        DB::transaction(function () use ($request, $model, $type) {

            $model->status = Service::PENDING;

            if($type == Attribute::SERVICE) {
                $model->update([
                    'price'         => $request->price,
                    'status'        => Service::PENDING,
                    'deliverables'  => !empty($request->deliverables) ? decodeOrEncodeFields($request->deliverables, false) : null,
                    'delivery_time' => $request->delivery_time
                ]);
            } else {
                $model->update([
                    'amount'         => $request->amount,
                    'status'        => Service::PENDING,
                    'deliverables'  => !empty($request->deliverables) ? decodeOrEncodeFields($request->deliverables, false) : null,
                    'delivery_time' => $request->delivery_time
                ]);
            }

            if($type == Attribute::SERVICE) {
              $model->serviceSteps()->delete();
              $model->extraService()->delete();
            } else {
              $model->softwareSteps()->delete();
              $model->extraSoftware()->delete();
            }

            if (!empty($request->steps)) {
                $steps = [];
                foreach ($request->get('steps') as $key => $value) {
                    if($type == Attribute::SERVICE) {
                        $steps[] = new ServiceStep([
                            'name' => $value,
                            'description' => $request->get('description')[$key]
                        ]);
                    } else {
                        $steps[] = new SoftwareStep([
                            'name' => $value,
                            'description' => $request->get('description')[$key]
                        ]);
                    }
                }
                if($type == Attribute::SERVICE) {
                    $model->serviceSteps()->saveMany($steps);
                } else {
                    $model->softwareSteps()->saveMany($steps);
                }
            }

            if (!empty($request->extra_title)) {
                $extraService = [];
                foreach ($request->get('extra_title') as $key => $value) {
                    
                    if($type == Attribute::SERVICE) {
                        $extraService[] = new ExtraService([
                            'title' => $request->extra_title[$key] ?? '',
                            'price' => $request->add_on_price[$key] ?? 0,
                            'delivery' => $request->add_on_delivery[$key] ?? ''
                        ]);
                    } else {
                        $extraService[] = new ExtraSoftware([
                            'title' => $request->extra_title[$key] ?? '',
                            'price' => $request->add_on_price[$key] ?? 0,
                            'delivery' => $request->add_on_delivery[$key] ?? ''
                        ]);
                    }

                }

            
                
                if($type == Attribute::SERVICE) {
                    $model->extraService()->saveMany($extraService);
                } else {
                    $model->extraSoftware()->saveMany($extraService);
                }
            }

        });
        return true;
    }

    public function savePricing($request, $model, $type = Attribute::SERVICE) : bool
    {
        DB::transaction(function () use ($request, $model, $type) {
            
            if($type == Attribute::SERVICE) {
                $model->update([
                    'rate_per_hour'         => $request->price,
                    'estimated_delivery_time' => $request->delivery_time
                ]);
            } else {
                $model->update([
                    'amount'         => $request->amount,
                    'status'        => Service::PENDING,
                    'deliverables'  => !empty($request->deliverables) ? decodeOrEncodeFields($request->deliverables, false) : null,
                    'delivery_time' => $request->delivery_time
                ]);
            }

            if($type == Attribute::SERVICE) {
              $model->serviceSteps()->delete();
              $model->addOns()->delete();
              $model->deliverable()->sync($request->deliverables);

            } else {
              $model->softwareSteps()->delete();
              $model->extraSoftware()->delete();

            }

            if (!empty($request->steps)) {
                $steps = [];
                foreach ($request->get('steps') as $key => $value) {
                    if($type == Attribute::SERVICE) {
                        $steps[] = new ServiceProjectStep([
                            'name' => $value,
                            'description' => $request->get('description')[$key]
                        ]);
                    } else {
                        $steps[] = new SoftwareStep([
                            'name' => $value,
                            'description' => $request->get('description')[$key]
                        ]);
                    }
                }
                if($type == Attribute::SERVICE) {
                    $model->serviceSteps()->saveMany($steps);
                } else {
                    $model->softwareSteps()->saveMany($steps);
                }
            }

            if (!empty($request->service_add_ons)) {
                $model->addOns()->createMany($request->service_add_ons);
            }

        });
        return true;
    }

    public function uploadBanner($model,$file,$banner_type){
        $banner=null;
        $path = imagePath()['attachments']['path'];

        $model->banner()->delete();
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
        ]);
        return $banner;
        
    }
    
    public function saveBanner($request, $model, $type = Attribute::SERVICE, $imageStorePath = 'service', $optionalImageStorePath="") : bool 
    {   
        if(($request->type)) {
            try {

                if($request->type == ModuleBanner::$Static){
                    if($request->hasFile('image')){
                        $model->banner()->delete();
                        $banner=$this->uploadBanner($model,$request->image,$request->type);
                        $banner->save();

                    }
                }
                elseif($request->type == ModuleBanner::$Dynamic)
                {

                    if($request->hasFile('dynamic_banner_image')){
                        $model->banner()->delete();
                        $banner=$this->uploadBanner($model,$request->dynamic_banner_image,$request->type);
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

                    if($request->has('technology_logos')){
                        if($model->technologyLogos)
                            $model->technologyLogos()->delete();
                        addTechnologyLogos($model,$request->technology_logos);
                    }
                   
                }
                else
                {
                    // $model->banner->video_url='';
                }

            } catch (\Exception $exp) {
                return false;
            }
        }

        return true;
    }
    
    public function saveRequirements($request, $model, $type = Attribute::SERVICE): bool
    {
        DB::transaction(function () use ($request, $model, $type) {
            if($type == Attribute::SERVICE) {
                $model->update([
                    'requirement_for_client' => $request->client_requirements
                ]);
            } else {
                $model->softwareDetail()->update([
                    'client_requirements' => $request->client_requirements
                ]);
            }
          
        });
        return true;
    }

    public function saveReview($request, $model, $type = Attribute::SERVICE, $notificationText = 'Service', $notificationUrl = 'service'): bool
    {
        DB::transaction(function () use ($request, $model, $notificationText, $notificationUrl, $type) {

            if($type == Attribute::SERVICE) {
                $model->update([
                    'number_of_simultaneous_projects' => $request->max_no_projects,
                    'is_terms_accepted' => $request->copyright_notice == "on" ? true : false,
                    'is_privacy_accepted' => $request->privacy_notice == "on" ? true : false,
                    'status_id'          => Service::STATUSES['PENDING']
                ]);
                $model->save();

            } else {
                $model->softwareDetail()->update([
                    'max_no_projects' => $request->max_no_projects,
                    'copyright_notice' => $request->copyright_notice == "on" ? true : false,
                    'privacy_notice' => $request->privacy_notice == "on" ? true : false
                ]);
    
                $model->update([
                    'creation_status' => Service::SERIVCE_CREATION_COMPLETED
                ]);
            }
         

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