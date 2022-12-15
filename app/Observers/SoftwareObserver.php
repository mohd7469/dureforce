<?php

namespace App\Observers;

use App\Models\GeneralSetting;
use App\Models\Software\Software;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SoftwareObserver
{
    //
    public function creating($software)
    {   
        //$general = GeneralSetting::first();

        $software->user_id = auth()->id();    
        $software->status_id = Software::STATUSES['DRAFT'];
        $software->uuid= Str::uuid()->toString();
        $software->updated_at = Carbon::now();   
    }

    public function updating($software)
    {
        $software->updated_at = Carbon::now();        
        
    }
}
