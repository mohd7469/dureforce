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
        $general = GeneralSetting::first();

        $service->user_id = auth()->id();    
        $service->status = $general->approval_post == 1 ? 1 : 0;
        $service->price  = $service->price ?: 0;
        $service->updated_at = Carbon::now();        
    }

    public function updating($service)
    {
        $service->updated_at = Carbon::now();        
    }
}
