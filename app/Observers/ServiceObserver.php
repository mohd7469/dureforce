<?php

namespace App\Observers;

use App\Models\GeneralSetting;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ServiceObserver
{
    //

    public function creating($service)
    {   

        $service->user_id = auth()->id();    
        $service->status_id = Service::STATUSES['DRAFT'];
        $service->uuid= Str::uuid()->toString();
        $service->rate_per_hour  = $service->rate_per_hour ?: 0;
        
    }

    public function updating($service)
    {
        $service->updated_at = Carbon::now();
    }
    public function deleting($service)
    {   
       
    }
}
