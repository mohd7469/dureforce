<?php

namespace App\Observers;

use App\Models\GeneralSetting;
use App\Models\Service;
use Carbon\Carbon;

class ServiceObserver
{
    //

    public function creating($service)
    {   

        $service->user_id = auth()->id();    
        $service->status_id = Service::STATUSES['PENDING'];
        $service->rate_per_hour  = $service->rate_per_hour ?: 0;
    }

    public function updating($service)
    {
        $service->updated_at = Carbon::now();        
    }
}
