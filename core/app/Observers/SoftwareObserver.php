<?php

namespace App\Observers;

use App\Models\GeneralSetting;
use Carbon\Carbon;

class SoftwareObserver
{
    //
    public function creating($software)
    {   
        $general = GeneralSetting::first();

        $software->user_id = auth()->id();    
        $software->status = $general->approval_post == 1 ? 1 : 0;
        $software->amount = $software->amount ?: 0;
        $software->updated_at = Carbon::now();   
    }

    public function updating($software)
    {
        $software->updated_at = Carbon::now();        
        
    }
}
