<?php 

namespace App\Traits;

use App\Models\AdminNotification;
use App\Models\Attribute;
use App\Models\EntityLogo;
use App\Models\ExtraService;
use App\Models\ExtraSoftware;
use App\Models\OptionalImage;
use App\Models\Service;
use App\Models\ServiceAttribute;
use App\Models\ServiceStep;
use App\Models\Software;
use App\Models\SoftwareAttribute;
use App\Models\SoftwareStep;
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
            $model->status_id = Service::STATUSES['PENDING'];
            dd($request->all());

            $model->fill($request->except(['_token','skills','tag']))->save();
            

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

    public function savePricing($request, $model, $type = Attribute::SERVICE) : bool
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


    public function saveBanner($request, $model, $type = Attribute::SERVICE, $imageStorePath = 'service', $optionalImageStorePath="") : bool 
    {   
        $imagePath=imagePath();
        $path =$imagePath [$imageStorePath]['path'];
        $size = $imagePath[$imageStorePath]['size'];
        $filename = '';
        $filenameLeadImage = '';

        // @todo fix this 
        if(! empty($request->type)) {
            $file = $request->selected_image == "1" ? "dure_banner_2.jpeg" : "dure_banner_1.jpeg";
            try {
                $filename = $file;
            } catch (\Exception $exp) {
                return false;
            }
        }

        
        if ($request->hasFile('image')) {
            $file = $request->image;
            try {
                $filename = uploadImage($file, $path, $size);
            } catch (\Exception $exp) {
              error($exp);
              return false;
            }
        }

        if($request->hasFile('lead_image')) {
            $file = $request->lead_image;
            try {
                $filenameLeadImage = uploadImage($file, $path, $size);
            } catch (\Exception $e) {
                error($e);
                return false;
            }
        }

        DB::transaction(function () use ($request, $filename, $model, $optionalImageStorePath, $type, $filenameLeadImage) {
  

            if($type == Attribute::SERVICE) {
                $model->update([
                    'banner_detail' => !empty($request->type) ? $request->banner_detail : '',
                    'banner_heading' => !empty($request->type)? $request->banner_heading : '',
                    'lead_image'     => $filenameLeadImage ?: $model->lead_image,
                    'status'         => Service::PENDING,
                    'technology_logos' => decodeOrEncodeFields($request->technology_logos, false),
                    'image' => $filename ?: $model->image
                ]);

                $logos = [];
                $model->logos()->delete();
                collect($request->logo_id)->map(function($item) use(&$logos) {
                    $logos[] = new EntityLogo([
                        'type'    => 'SERVICE',
                        'logo_id' => $item
                    ]);
                });
                $model->logos()->saveMany($logos);

            } else {
                $model->update([
                    'banner_detail' => !empty($request->type) ? $request->banner_detail : '',
                    'banner_heading' => !empty($request->type) ? $request->banner_heading : '',
                    'lead_image'     => $filenameLeadImage ?: $model->lead_image,
                    'image' => $filename ?: $model->image,
                    'status'         => Service::PENDING,
                    'technology_logos' => decodeOrEncodeFields($request->technology_logos, false),
                    'demo_url' => $request->demo_url,
                ]);
            }
             
            if ($request->optional_image) {
                $optionalImage = array_filter($request->optional_image);
                $this->optionalImageStore($request, $optionalImage, $model->id, $optionalImageStorePath);
            }
        });

        return true;
    }
    
    public function saveRequirements($request, $model, $type = Attribute::SERVICE): bool
    {
        DB::transaction(function () use ($request, $model, $type) {
            $model->status = Service::PENDING;
            $model->update();
            if($type == Attribute::SERVICE) {
                $model->serviceDetail()->update([
                    'client_requirements' => $request->client_requirements
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
                $model->serviceDetail()->update([
                    'max_no_projects' => $request->max_no_projects,
                    'copyright_notice' => $request->copyright_notice == "on" ? true : false,
                    'privacy_notice' => $request->privacy_notice == "on" ? true : false
                ]);
    
                $model->update([
                    'creation_status' => Service::SERIVCE_CREATION_COMPLETED,
                    'status'          => Service::PENDING
                ]);
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